<?php

use App\Models\User;
use App\Models\DietPlan;
use Carbon\Carbon;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = User::all();
if ($users->isEmpty()) {
    echo "No users found.\n";
    exit;
}

$date = Carbon::today()->toDateString();

$meals = [
    [
        'time' => '08:30 AM',
        'name' => 'Oats with Fruits & Nuts',
        'description' => 'Oats, Milk, Banana, Almonds, Berries',
        'tag' => 'Breakfast',
        'tag_color' => 'success',
        'calories' => 420,
        'carbs' => 60,
        'protein' => 15,
        'fat' => 10,
        'completed' => true
    ],
    [
        'time' => '01:30 PM',
        'name' => 'Grilled Chicken with Quinoa',
        'description' => 'Chicken, Quinoa, Veggies, Olive Oil',
        'tag' => 'Lunch',
        'tag_color' => 'primary',
        'calories' => 520,
        'carbs' => 45,
        'protein' => 40,
        'fat' => 15,
        'completed' => true
    ],
    [
        'time' => '05:00 PM',
        'name' => 'Greek Yogurt with Berries',
        'description' => 'Greek Yogurt, Mixed Berries',
        'tag' => 'Snack',
        'tag_color' => 'info',
        'calories' => 200,
        'carbs' => 15,
        'protein' => 20,
        'fat' => 5,
        'completed' => true
    ],
    [
        'time' => '08:00 PM',
        'name' => 'Salmon with Steamed Veggies',
        'description' => 'Salmon, Broccoli, Carrots, Olive Oil',
        'tag' => 'Dinner',
        'tag_color' => 'danger',
        'calories' => 450,
        'carbs' => 10,
        'protein' => 35,
        'fat' => 15,
        'completed' => false
    ]
];

foreach ($users as $user) {
    // Delete existing meals for today to avoid duplicates
    DietPlan::where('user_id', $user->id)->where('date', $date)->delete();

    foreach ($meals as $mealData) {
        DietPlan::create(array_merge($mealData, [
            'user_id' => $user->id,
            'date' => $date,
            'meal_type' => $mealData['tag'],
            'food_item' => $mealData['name']
        ]));
    }
    echo "Sample meals added for user: {$user->email} on date: {$date}\n";
}
