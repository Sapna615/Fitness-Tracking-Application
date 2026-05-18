<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutPlan;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;

use App\Services\PlanGeneratorService;

class WorkoutController extends Controller
{
    public function index(PlanGeneratorService $planService)
    {
        $user = Auth::user();
        $workoutPlans = WorkoutPlan::where('user_id', $user->id)
            ->with('workout')
            ->get()
            ->groupBy('day');

        // Auto-generate plan if none exists but profile is set
        if ($workoutPlans->isEmpty() && $user->profile) {
            $planService->generateForUser($user);
            
            $workoutPlans = WorkoutPlan::where('user_id', $user->id)
                ->with('workout')
                ->get()
                ->groupBy('day');
        }

        return view('workouts.index', compact('workoutPlans'));
    }

    public function library()
    {
        $exercises = Exercise::all()->groupBy('muscle_group');
        return view('workouts.library', compact('exercises'));
    }
}
