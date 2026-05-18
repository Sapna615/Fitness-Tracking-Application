<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $progressLogs = Progress::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();
            
        return view('progress.index', compact('progressLogs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric',
            'calories_burned' => 'required|integer',
        ]);

        Progress::create([
            'user_id' => Auth::id(),
            'date' => $validated['date'],
            'weight' => $validated['weight'],
            'calories_burned' => $validated['calories_burned'],
        ]);

        return redirect()->back()->with('success', 'Progress logged!');
    }
}
