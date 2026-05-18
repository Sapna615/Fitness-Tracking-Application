<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\WorkoutPlan;
use App\Models\UserStreak;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            return redirect()->route('fitness-profile.create');
        }

        // 1. BMI Calculation
        $bmi = round($profile->weight / (($profile->height / 100) ** 2), 1);
        $bmiStatus = $this->getBmiStatus($bmi);

        // 2. BMR & Calorie Target (Mifflin-St Jeor)
        $bmr = (10 * $profile->weight) + (6.25 * $profile->height) - (5 * $profile->age);
        $bmr += ($profile->gender == 'Male') ? 5 : -161;
        
        $activityMultipliers = [
            'sedentary' => 1.2,
            'lightly_active' => 1.375,
            'moderately_active' => 1.55,
            'very_active' => 1.725
        ];
        $tdee = round($bmr * ($activityMultipliers[$profile->activity_level] ?? 1.2));

        // 3. Streak Logic
        $streak = UserStreak::firstOrCreate(['user_id' => $user->id]);
        $this->updateStreak($streak);

        // Check for achievements
        $this->checkAchievements($user, $streak);

        // 4. Progress Logic
        $today = now()->format('l');
        $dailyWorkout = WorkoutPlan::where('user_id', $user->id)
            ->where('day', $today)
            ->with('workout')
            ->get();

        $progressData = Progress::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->take(10)
            ->get();

        // 5. Goal Progress (Mock Logic for demo)
        $progressPercentage = rand(30, 85); // Simplified for now

        return view('dashboard', compact(
            'user', 'profile', 'dailyWorkout', 'progressData', 
            'bmi', 'bmiStatus', 'tdee', 'streak', 'progressPercentage'
        ));
    }

    private function getBmiStatus($bmi) {
        if ($bmi < 18.5) return 'Underweight';
        if ($bmi < 25) return 'Normal weight';
        if ($bmi < 30) return 'Overweight';
        return 'Obese';
    }

    private function updateStreak($streak) {
        $today = now()->toDateString();
        $yesterday = now()->subDay()->toDateString();

        if ($streak->last_activity_date == $today) {
            return;
        }

        if ($streak->last_activity_date == $yesterday) {
            $streak->streak_count += 1;
        } else {
            $streak->streak_count = 1;
        }

        $streak->last_activity_date = $today;
        $streak->save();
    }

    public function recalculate(Request $request)
    {
        $request->validate([
            'height' => 'required|numeric|min:100|max:250',
            'weight' => 'required|numeric|min:30|max:300',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if ($profile) {
            $profile->height = $request->height;
            $profile->weight = $request->weight;
            $profile->save();
        }

        return redirect()->route('dashboard')->with('success', 'Stats recalculated successfully!');
    }

    private function checkAchievements($user, $streak)
    {
        $achievementsToAward = [];

        // Achievement 1: First Step (If streak > 0)
        if ($streak->streak_count >= 1) {
            $achievementsToAward[] = 'First Step';
        }

        // Achievement 2: Streak Master (If streak >= 7)
        if ($streak->streak_count >= 7) {
            $achievementsToAward[] = 'Streak Master';
        }

        // Achievement 3: Dedicated (If total workouts completed > 10)
        $completedWorkouts = Progress::where('user_id', $user->id)->count();
        if ($completedWorkouts >= 10) {
            $achievementsToAward[] = 'Dedicated';
        }

        // Award achievements
        foreach ($achievementsToAward as $title) {
            $achievement = Achievement::where('title', $title)->first();
            if (!$achievement) {
                $icons = ['First Step' => '🚀', 'Streak Master' => '🔥', 'Dedicated' => '💪'];
                $achievement = Achievement::create([
                    'title' => $title,
                    'icon' => $icons[$title] ?? '⭐',
                    'description' => 'You earned this achievement!'
                ]);
            }
            if ($achievement) {
                // Check if user already has it
                if (!$user->achievements->contains($achievement->id)) {
                    $user->achievements()->attach($achievement->id);
                }
            }
        }
    }
}
