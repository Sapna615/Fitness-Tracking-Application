<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DietController extends Controller
{
    /**
     * Display the diet plan page.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        $date = $request->input('date', date('Y-m-d'));
        $profile = $user->profile;

        if (!$profile) {
            return redirect()->route('fitness-profile.create')->with('info', 'Please complete your fitness profile first.');
        }

        // 1. Calculate Target Calories (TDEE)
        $bmr = (10 * $profile->weight) + (6.25 * $profile->height) - (5 * $profile->age);
        $bmr += ($profile->gender == 'Male') ? 5 : -161;
        
        $activityMultipliers = [
            'sedentary' => 1.2,
            'lightly_active' => 1.375,
            'moderately_active' => 1.55,
            'very_active' => 1.725
        ];
        $targetCalories = round($bmr * ($activityMultipliers[$profile->activity_level] ?? 1.2));

        // Adjust based on goal
        if ($profile->fitness_goal === 'Weight Loss' || $profile->fitness_goal === 'Fat Loss') {
            $targetCalories -= 500;
        } elseif ($profile->fitness_goal === 'Muscle Gain') {
            $targetCalories += 300;
        }

        // 2. Fetch logged meals for the date
        $todaysMeals = $user->dietPlans()
            ->where('date', $date)
            ->orderBy('time', 'asc')
            ->get()
            ->toArray();

        // 3. Calculate daily totals
        $dailyCalories = array_sum(array_map(fn($m) => (int)($m['calories'] ?? 0), $todaysMeals));
        $caloriesRemaining = $targetCalories - $dailyCalories;
        
        $currentCarbs = array_sum(array_column($todaysMeals, 'carbs'));
        $currentProtein = array_sum(array_column($todaysMeals, 'protein'));
        $currentFats = array_sum(array_column($todaysMeals, 'fat'));

        // Target macros (Standard 45/30/25 split)
        $targetCarbs = round(($targetCalories * 0.45) / 4);
        $targetProtein = round(($targetCalories * 0.30) / 4);
        $targetFats = round(($targetCalories * 0.25) / 9);

        $macros = [
            'carbs' => [
                'percentage' => $targetCalories > 0 ? round(($currentCarbs * 4 / $targetCalories) * 100) : 0, 
                'current' => $currentCarbs, 
                'target' => $targetCarbs
            ],
            'protein' => [
                'percentage' => $targetCalories > 0 ? round(($currentProtein * 4 / $targetCalories) * 100) : 0, 
                'current' => $currentProtein, 
                'target' => $targetProtein
            ],
            'fats' => [
                'percentage' => $targetCalories > 0 ? round(($currentFats * 9 / $targetCalories) * 100) : 0, 
                'current' => $currentFats, 
                'target' => $targetFats
            ]
        ];

        // 4. Goal Progress
        $initialWeight = \App\Models\Progress::where('user_id', $user->id)->orderBy('date', 'asc')->first()?->weight ?? $profile->weight;
        $currentWeight = \App\Models\Progress::where('user_id', $user->id)->orderBy('date', 'desc')->first()?->weight ?? $profile->weight;
        $weightChange = round($currentWeight - $initialWeight, 1);
        
        // Mock target for progress bar (usually users want to lose 5-10kg)
        $targetWeightLoss = -5; 
        $progressPercentage = $weightChange < 0 ? min(100, round(($weightChange / $targetWeightLoss) * 100)) : 0;

        $goalProgress = [
            'current' => $weightChange,
            'target' => $targetWeightLoss,
            'percentage' => $progressPercentage
        ];

        // 5. Weekly progress (last 7 days adherence)
        $weeklyProgress = [];
        for ($i = 6; $i >= 0; $i--) {
            $dayDate = date('Y-m-d', strtotime("-$i days"));
            $dayName = date('l', strtotime($dayDate));
            $dayCals = \App\Models\DietPlan::where('user_id', $user->id)->where('date', $dayDate)->sum('calories');
            $adherence = $targetCalories > 0 ? min(100, round(($dayCals / $targetCalories) * 100)) : 0;
            $weeklyProgress[$dayName] = $adherence;
        }

        $averageAdherence = count($weeklyProgress) > 0 ? round(array_sum($weeklyProgress) / count($weeklyProgress)) : 0;
        $mealsPlanned = count($todaysMeals);
        $mealsCompleted = count(array_filter($todaysMeals, fn($m) => ($m['completed'] ?? true)));

        return view('diet.index', compact(
            'dailyCalories', 'targetCalories', 'caloriesRemaining',
            'macros', 'goalProgress', 'todaysMeals', 'weeklyProgress',
            'averageAdherence', 'mealsPlanned', 'mealsCompleted', 'date'
        ));
    }

    public function overview(): View
    {
        return view('diet.overview');
    }

    public function mealPlan(): View
    {
        return view('diet.meal-plan');
    }

    public function recipes(): View
    {
        return view('diet.recipes');
    }

    public function groceryList(): View
    {
        return view('diet.grocery-list');
    }



    public function supplements(): View
    {
        return view('diet.supplements');
    }

    public function fastingTracker(): View
    {
        return view('diet.fasting-tracker');
    }

    public function history(): View
    {
        $user = Auth::user();
        $profile = $user->profile;
        $targetCalories = 2000; // Default

        if ($profile) {
            $bmr = (10 * $profile->weight) + (6.25 * $profile->height) - (5 * $profile->age);
            $bmr += ($profile->gender == 'Male') ? 5 : -161;
            $activityMultipliers = [
                'sedentary' => 1.2,
                'lightly_active' => 1.375,
                'moderately_active' => 1.55,
                'very_active' => 1.725
            ];
            $targetCalories = round($bmr * ($activityMultipliers[$profile->activity_level] ?? 1.2));
            
            if ($profile->fitness_goal === 'Weight Loss' || $profile->fitness_goal === 'Fat Loss') {
                $targetCalories -= 500;
            } elseif ($profile->fitness_goal === 'Muscle Gain') {
                $targetCalories += 300;
            }
        }

        // Fetch last 30 days of meals (History usually shows past + today)
        $historyData = $user->dietPlans()
            ->where('date', '<=', date('Y-m-d'))
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('date');

        $formattedHistory = [];
        foreach ($historyData as $date => $meals) {
            $calories = $meals->sum('calories');
            $formattedHistory[] = [
                'date' => date('M d, Y', strtotime($date)),
                'raw_date' => $date,
                'meals' => $meals->pluck('tag')->unique()->toArray(),
                'calories' => $calories,
                'protein' => $meals->sum('protein'),
                'carbs' => $meals->sum('carbs'),
                'fats' => $meals->sum('fat'),
                'water' => 2.5, // Mock water as it's not in the model yet
                'adherence' => $targetCalories > 0 ? min(100, round(($calories / $targetCalories) * 100)) : 0
            ];
        }

        // Summary stats
        $totalCalories = array_sum(array_column($formattedHistory, 'calories'));
        $dailyAverage = count($formattedHistory) > 0 ? round($totalCalories / count($formattedHistory)) : 0;
        
        // Weight change
        $initialWeight = \App\Models\Progress::where('user_id', $user->id)->orderBy('date', 'asc')->first()?->weight ?? ($profile?->weight ?? 0);
        $currentWeight = \App\Models\Progress::where('user_id', $user->id)->orderBy('date', 'desc')->first()?->weight ?? ($profile?->weight ?? 0);
        $weightChange = round($currentWeight - $initialWeight, 1);

        return view('diet.history', compact('formattedHistory', 'totalCalories', 'dailyAverage', 'weightChange', 'targetCalories'));
    }

    public function settings(): View
    {
        return view('diet.settings');
    }

    public function premium(): View
    {
        return view('diet.premium');
    }

    public function nutritionReport(): View
    {
        return view('diet.nutrition-report');
    }

    /**
     * Add custom meal to diet plan.
     */
    public function addCustomMeal(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'required|integer',
            'carbs' => 'nullable|integer',
            'protein' => 'nullable|integer',
            'fat' => 'nullable|integer',
            'tag' => 'required|string',
            'time' => 'required|string',
            'date' => 'required|date'
        ]);

        $date = $request->input('date');
        
        \App\Models\DietPlan::create([
            'user_id' => Auth::id(),
            'date' => $date,
            'time' => date('g:i A', strtotime($request->input('time'))),
            'meal_type' => $request->input('tag'), // Using tag as meal type for now
            'food_item' => $request->input('name'),
            'name' => $request->input('name'), // If name is needed
            'description' => $request->input('description') ?? 'Custom Meal',
            'tag' => $request->input('tag'),
            'tag_color' => 'success',
            'calories' => $request->input('calories'),
            'carbs' => $request->input('carbs') ?? 0,
            'protein' => $request->input('protein') ?? 0,
            'fat' => $request->input('fat') ?? 0,
            'completed' => true
        ]);

        return redirect()->route('diet.index', ['date' => $date])->with('success', 'Custom meal added successfully!');
    }

    /**
     * Show recipe details.
     */
    public function recipeDetails($id): View
    {
        return view('diet.recipe-details', compact('id'));
    }

    public function fastingHistory(): View
    {
        return view('diet.fasting-history');
    }

    public function fastingAnalytics(): View
    {
        return view('diet.fasting-analytics');
    }

    public function fastingSettings(): View
    {
        return view('diet.fasting-settings');
    }
}
