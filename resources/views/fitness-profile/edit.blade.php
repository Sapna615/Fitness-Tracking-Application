@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-4 rounded-5 border-0 bg-white">
            <h3 class="fw-bold mb-4 text-center">Update Fitness Profile</h3>
            <form action="{{ route('fitness-profile.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold uppercase">Age</label>
                        <input type="number" name="age" class="form-control rounded-3" value="{{ $profile->age }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold uppercase">Gender</label>
                        <select name="gender" class="form-select rounded-3">
                            <option value="Male" {{ $profile->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $profile->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $profile->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold uppercase">Weight (kg)</label>
                        <input type="number" name="weight" step="0.1" class="form-control rounded-3" value="{{ $profile->weight }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold uppercase">Height (cm)</label>
                        <input type="number" name="height" step="0.1" class="form-control rounded-3" value="{{ $profile->height }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted small fw-bold uppercase">Goal</label>
                        <select name="fitness_goal" class="form-select rounded-3">
                            <option value="weight_loss" {{ $profile->fitness_goal == 'weight_loss' ? 'selected' : '' }}>Weight Loss</option>
                            <option value="muscle_gain" {{ $profile->fitness_goal == 'muscle_gain' ? 'selected' : '' }}>Muscle Gain</option>
                            <option value="maintenance" {{ $profile->fitness_goal == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-muted small fw-bold uppercase">Activity</label>
                        <select name="activity_level" class="form-select rounded-3">
                            <option value="sedentary" {{ $profile->activity_level == 'sedentary' ? 'selected' : '' }}>Sedentary (Little exercise)</option>
                            <option value="lightly_active" {{ $profile->activity_level == 'lightly_active' ? 'selected' : '' }}>Lightly Active</option>
                            <option value="moderately_active" {{ $profile->activity_level == 'moderately_active' ? 'selected' : '' }}>Moderately Active</option>
                            <option value="very_active" {{ $profile->activity_level == 'very_active' ? 'selected' : '' }}>Very Active</option>
                        </select>
                    </div>
                    <div class="col-12 pt-4">
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-3 shadow-sm rounded-4">Update & Recalculate Plan &rarr;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
