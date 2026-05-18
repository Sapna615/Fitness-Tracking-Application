<?php

namespace App\Services;

use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutPlan;
use App\Models\DietPlan;

class PlanGeneratorService
{
    public function generateForUser(User $user)
    {
        $profile = $user->profile;
        if (!$profile) return;

        $user->workoutPlans()->delete();
        $user->dietPlans()->delete();

        if ($profile->fitness_goal === 'weight_loss') {
            $this->generateWeightLossPlan($user);
        } else if ($profile->fitness_goal === 'muscle_gain') {
            $this->generateMuscleGainPlan($user);
        } else {
            $this->generateMaintenancePlan($user);
        }
    }

    private function generateWeightLossPlan(User $user)
    {
        $workouts = Workout::where('difficulty_level', 'Beginner')->limit(3)->get();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        if ($workouts->isNotEmpty()) {
            foreach ($days as $index => $day) {
                if (isset($workouts[$index % count($workouts)])) {
                    WorkoutPlan::create([
                        'user_id' => $user->id,
                        'workout_id' => $workouts[$index % count($workouts)]->id,
                        'day' => $day,
                        'sets' => 4,
                        'reps' => 20
                    ]);
                }
            }
        }

        $this->createMeal($user, 'Breakfast', 'Green Smoothie & Boiled Egg', 350);
        $this->createMeal($user, 'Lunch', 'Quinoa with Roasted Veggies', 500);
        $this->createMeal($user, 'Snack', 'Apple & Handful of Almonds', 200);
        $this->createMeal($user, 'Dinner', 'Grilled Fish with Asparagus', 450);
    }

    private function generateMuscleGainPlan(User $user)
    {
        $workouts = Workout::where('difficulty_level', 'Intermediate')->limit(3)->get();
        $days = ['Monday', 'Tuesday', 'Thursday', 'Friday', 'Saturday'];

        if ($workouts->isNotEmpty()) {
            foreach ($days as $index => $day) {
                if (isset($workouts[$index % count($workouts)])) {
                    WorkoutPlan::create([
                        'user_id' => $user->id,
                        'workout_id' => $workouts[$index % count($workouts)]->id,
                        'day' => $day,
                        'sets' => 4,
                        'reps' => 10
                    ]);
                }
            }
        }

        $this->createMeal($user, 'Breakfast', 'Oatmeal with Peanut Butter & Whey', 600);
        $this->createMeal($user, 'Lunch', 'Lean Beef with Sweet Potato & Broccoli', 850);
        $this->createMeal($user, 'Snack', 'Greek Yogurt with Honey & Granola', 400);
        $this->createMeal($user, 'Dinner', 'Chicken Breast with Pasta & Pesto', 750);
    }

    private function generateMaintenancePlan(User $user)
    {
        $workouts = Workout::where('difficulty_level', 'Beginner')->limit(3)->get();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        if ($workouts->isNotEmpty()) {
            foreach ($days as $index => $day) {
                if (isset($workouts[$index % count($workouts)])) {
                    WorkoutPlan::create([
                        'user_id' => $user->id,
                        'workout_id' => $workouts[$index % count($workouts)]->id,
                        'day' => $day,
                        'sets' => 3,
                        'reps' => 12
                    ]);
                }
            }
        }

        $this->createMeal($user, 'Breakfast', 'Whole Grain Toast with Avocado', 450);
        $this->createMeal($user, 'Lunch', 'Turkey & Cheese Wrap', 600);
        $this->createMeal($user, 'Snack', 'Banana', 100);
        $this->createMeal($user, 'Dinner', 'Mixed Bean Chili with Brown Rice', 550);
    }

    private function createMeal($user, $type, $food, $cal)
    {
        DietPlan::create([
            'user_id' => $user->id,
            'meal_type' => $type,
            'food_item' => $food,
            'calories' => $cal
        ]);
    }
}
