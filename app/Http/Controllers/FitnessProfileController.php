<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Services\PlanGeneratorService;
use Illuminate\Support\Facades\Auth;

class FitnessProfileController extends Controller
{
    public function create()
    {
        return view('fitness-profile.create');
    }

    public function store(Request $request, PlanGeneratorService $planService)
    {
        $validated = $request->validate([
            'age' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required|string',
            'fitness_goal' => 'required|string',
            'activity_level' => 'required|string',
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            $validated
        );

        $planService->generateForUser(Auth::user());

        return redirect()->route('dashboard')->with('success', 'Profile updated and plans generated!');
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('fitness-profile.edit', compact('profile'));
    }
}
