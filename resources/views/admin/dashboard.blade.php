@extends('layouts.app')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <h2 class="fw-black italic mb-4">ADMIN COMMAND CENTER</h2>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 bg-dark text-white rounded-4">
            <h1 class="display-4 fw-black">{{ $stats['total_users'] }}</h1>
            <p class="text-info small fw-bold uppercase tracking-widest mb-0">Total Athletes</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 bg-primary text-white rounded-4">
            <h1 class="display-4 fw-black">{{ $stats['total_exercises'] }}</h1>
            <p class="text-white opacity-75 small fw-bold uppercase tracking-widest mb-0">Exercises in Library</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 bg-info text-white rounded-4">
            <h1 class="display-4 fw-black">{{ $stats['new_users_today'] }}</h1>
            <p class="text-white opacity-75 small fw-bold uppercase tracking-widest mb-0">New Signups Today</p>
        </div>
    </div>

    <div class="col-12 mt-5">
        <div class="d-flex gap-3">
            <a href="{{ route('admin.users') }}" class="btn btn-dark px-5 py-3 fw-bold rounded-4">Manage Users</a>
            <a href="{{ route('admin.exercises') }}" class="btn btn-outline-dark px-5 py-3 fw-bold rounded-4">Manage Library</a>
        </div>
    </div>
</div>
@endsection
