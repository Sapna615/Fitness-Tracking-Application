<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exercise;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_exercises' => Exercise::count(),
            'new_users_today' => User::whereDate('created_at', now())->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::with('profile')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function exercises()
    {
        $exercises = Exercise::orderBy('muscle_group')->get();
        return view('admin.exercises', compact('exercises'));
    }
}
