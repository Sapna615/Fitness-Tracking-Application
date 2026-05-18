<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workout;
use App\Models\Exercise;

class FitnessDataSeeder extends Seeder
{
    public function run()
    {
        // Workouts
        $w1 = Workout::create(['title' => 'Full Body Cardio', 'description' => 'High intensity cardio to burn fat.', 'difficulty_level' => 'Beginner']);
        $w2 = Workout::create(['title' => 'Upper Body Strength', 'description' => 'Focus on chest, back, and arms.', 'difficulty_level' => 'Intermediate']);
        $w3 = Workout::create(['title' => 'Leg Day', 'description' => 'Squats and lunges for lower body.', 'difficulty_level' => 'Intermediate']);

        // Exercises
        Exercise::create(['name' => 'Push Ups', 'muscle_group' => 'Chest', 'instructions' => 'Keep your back straight and lower your body until your chest almost touches the floor.']);
        Exercise::create(['name' => 'Squats', 'muscle_group' => 'Legs', 'instructions' => 'Stand with feet shoulder-width apart, lower your hips until your thighs are parallel to the floor.']);
        Exercise::create(['name' => 'Plank', 'muscle_group' => 'Core', 'instructions' => 'Hold a push-up position but with your weight on your forearms. Keep your body in a straight line.']);
        Exercise::create(['name' => 'Deadlift', 'muscle_group' => 'Back', 'instructions' => 'Lift a loaded barbell or bar from the ground to the level of the hips, then lower it back to the ground.']);
    }
}
