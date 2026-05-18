<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FitnessProfileController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\ProgressController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/recalculate', [DashboardController::class, 'recalculate'])->name('dashboard.recalculate');
    Route::post('/chat/send', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send');
    
    // Fitness Profile
    Route::get('/fitness-profile/create', [FitnessProfileController::class, 'create'])->name('fitness-profile.create');
    Route::post('/fitness-profile', [FitnessProfileController::class, 'store'])->name('fitness-profile.store');
    Route::get('/fitness-profile/edit', [FitnessProfileController::class, 'edit'])->name('fitness-profile.edit');

    // Workouts
    Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/workouts/library', [WorkoutController::class, 'library'])->name('workouts.library');

    // Diet
    Route::get('/diet', [DietController::class, 'index'])->name('diet.index');
    Route::get('/diet/overview', [DietController::class, 'overview'])->name('diet.overview');
    Route::get('/diet/meal-plan', [DietController::class, 'mealPlan'])->name('diet.meal-plan');
    Route::get('/diet/recipes', [DietController::class, 'recipes'])->name('diet.recipes');
    Route::get('/diet/grocery-list', [DietController::class, 'groceryList'])->name('diet.grocery-list');
    Route::get('/diet/supplements', [DietController::class, 'supplements'])->name('diet.supplements');
    Route::get('/diet/fasting-tracker', [DietController::class, 'fastingTracker'])->name('diet.fasting-tracker');
    Route::get('/diet/history', [DietController::class, 'history'])->name('diet.history');
    Route::get('/diet/settings', [DietController::class, 'settings'])->name('diet.settings');
    Route::get('/diet/premium', [DietController::class, 'premium'])->name('diet.premium');
    Route::get('/diet/nutrition-report', [DietController::class, 'nutritionReport'])->name('diet.nutrition-report');
    Route::get('/diet/recipe/{id}', [DietController::class, 'recipeDetails'])->name('diet.recipe.details');
    Route::get('/diet/fasting-history', [DietController::class, 'fastingHistory'])->name('diet.fasting-history');
    Route::get('/diet/fasting-analytics', [DietController::class, 'fastingAnalytics'])->name('diet.fasting-analytics');
    Route::get('/diet/fasting-settings', [DietController::class, 'fastingSettings'])->name('diet.fasting-settings');
    Route::post('/diet/add-custom-meal', [DietController::class, 'addCustomMeal'])->name('diet.add-custom-meal');

    // Progress
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::post('/progress', [ProgressController::class, 'store'])->name('progress.store');

    // User Profile (Breeze default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Routes
Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/exercises', [App\Http\Controllers\AdminController::class, 'exercises'])->name('admin.exercises');
});

// Contact Routes
Route::middleware('auth')->group(function () {
    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
});
