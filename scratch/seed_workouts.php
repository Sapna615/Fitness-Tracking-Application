<?php

use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutPlan;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = User::all();
if ($users->isEmpty()) {
    echo "No users found.\n";
    exit;
}

// Clear existing Workouts and WorkoutPlans
WorkoutPlan::truncate();
Workout::truncate();

// Create the new workouts
$workoutsData = [
    'Monday' => [
        'title' => 'Chest & Triceps Workout',
        'description' => 'Bench press, pushups, tricep dips',
        'difficulty_level' => 'Intermediate',
        'sets' => 4,
        'reps' => 10
    ],
    'Tuesday' => [
        'title' => 'Leg Day Training',
        'description' => 'Squats, lunges, calf raises',
        'difficulty_level' => 'Intermediate',
        'sets' => 4,
        'reps' => 12
    ],
    'Wednesday' => [
        'title' => 'Yoga & Core Stability',
        'description' => 'Stretching, planks, breathing exercises',
        'difficulty_level' => 'Beginner',
        'sets' => 3,
        'reps' => 30 // Seconds
    ],
    'Thursday' => [
        'title' => 'Back & Biceps Workout',
        'description' => 'Pull-ups, rows, bicep curls',
        'difficulty_level' => 'Intermediate',
        'sets' => 4,
        'reps' => 10
    ],
    'Friday' => [
        'title' => 'HIIT Cardio Session',
        'description' => 'Jump rope, burpees, mountain climbers',
        'difficulty_level' => 'Advanced',
        'sets' => 5, // Rounds
        'reps' => 40 // Seconds
    ],
    'Saturday' => [
        'title' => 'Shoulders & Abs',
        'description' => 'Shoulder press, lateral raises, crunches',
        'difficulty_level' => 'Intermediate',
        'sets' => 4,
        'reps' => 12
    ]
];

$createdWorkouts = [];
foreach ($workoutsData as $day => $data) {
    $workout = Workout::create([
        'title' => $data['title'],
        'description' => $data['description'],
        'difficulty_level' => $data['difficulty_level']
    ]);
    $createdWorkouts[$day] = $workout;
}

foreach ($users as $user) {
    foreach ($workoutsData as $day => $data) {
        WorkoutPlan::create([
            'user_id' => $user->id,
            'workout_id' => $createdWorkouts[$day]->id,
            'day' => $day,
            'sets' => $data['sets'],
            'reps' => $data['reps']
        ]);
    }
    echo "Workout plans successfully seeded for user: {$user->email}\n";
}
