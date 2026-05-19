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

        // Assign the day-specific workouts that were created by FitnessDataSeeder
        $this->assignDayWorkouts($user, $profile->fitness_goal);

        // Generate diet plan based on fitness goal
        if ($profile->fitness_goal === 'weight_loss') {
            $this->createWeightLossDiet($user);
        } else if ($profile->fitness_goal === 'muscle_gain') {
            $this->createMuscleGainDiet($user);
        } else {
            $this->createMaintenanceDiet($user);
        }
    }

    private function assignDayWorkouts(User $user, $fitnessGoal)
    {
        // Map of day => workout title (matching FitnessDataSeeder)
        $dayWorkoutMap = [
            'Monday' => ['title' => 'Chest & Triceps Workout', 'sets' => 4, 'reps' => 10],
            'Tuesday' => ['title' => 'Leg Day Training', 'sets' => 4, 'reps' => 12],
            'Wednesday' => ['title' => 'Yoga & Core Stability', 'sets' => 3, 'reps' => 30],
            'Thursday' => ['title' => 'Back & Biceps Workout', 'sets' => 4, 'reps' => 10],
            'Friday' => ['title' => 'HIIT Cardio Session', 'sets' => 5, 'reps' => 40],
            'Saturday' => ['title' => 'Shoulders & Abs', 'sets' => 4, 'reps' => 12],
        ];

        // Adjust sets/reps based on fitness goal
        $modifier = match ($fitnessGoal) {
            'weight_loss' => ['sets_mod' => 0, 'reps_mod' => 5],      // Higher reps for fat burn
            'muscle_gain' => ['sets_mod' => 1, 'reps_mod' => -2],     // More sets, fewer reps for strength
            default => ['sets_mod' => 0, 'reps_mod' => 0],            // Maintenance: use defaults
        };

        foreach ($dayWorkoutMap as $day => $data) {
            $workout = Workout::where('title', $data['title'])->first();

            if ($workout) {
                WorkoutPlan::create([
                    'user_id' => $user->id,
                    'workout_id' => $workout->id,
                    'day' => $day,
                    'sets' => max(1, $data['sets'] + $modifier['sets_mod']),
                    'reps' => max(1, $data['reps'] + $modifier['reps_mod']),
                ]);
            }
        }
    }

    private function createWeightLossDiet(User $user)
    {
        $this->createMeal($user, 'Breakfast', 'Green Smoothie & Boiled Egg', 350);
        $this->createMeal($user, 'Lunch', 'Quinoa with Roasted Veggies', 500);
        $this->createMeal($user, 'Snack', 'Apple & Handful of Almonds', 200);
        $this->createMeal($user, 'Dinner', 'Grilled Fish with Asparagus', 450);
    }

    private function createMuscleGainDiet(User $user)
    {
        $this->createMeal($user, 'Breakfast', 'Oatmeal with Peanut Butter & Whey', 600);
        $this->createMeal($user, 'Lunch', 'Lean Beef with Sweet Potato & Broccoli', 850);
        $this->createMeal($user, 'Snack', 'Greek Yogurt with Honey & Granola', 400);
        $this->createMeal($user, 'Dinner', 'Chicken Breast with Pasta & Pesto', 750);
    }

    private function createMaintenanceDiet(User $user)
    {
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
