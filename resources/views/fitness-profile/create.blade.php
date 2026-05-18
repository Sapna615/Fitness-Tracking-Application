@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-4">
            <h3 class="fw-bold mb-4 text-center">Setup Your Fitness Profile</h3>
            <form action="{{ route('fitness-profile.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted small uppercase tracking-wider">Age</label>
                        <input type="number" name="age" class="form-control rounded-3" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted small uppercase tracking-wider">Gender</label>
                        <select name="gender" class="form-select rounded-3">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted small uppercase tracking-wider">Weight (kg)</label>
                        <input type="number" name="weight" step="0.1" class="form-control rounded-3" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-semibold text-muted small uppercase tracking-wider">Height (cm)</label>
                        <input type="number" name="height" step="0.1" class="form-control rounded-3" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted small uppercase tracking-wider">Fitness Goal</label>
                        <select name="fitness_goal" class="form-select rounded-3">
                            <option value="weight_loss">Weight Loss</option>
                            <option value="muscle_gain">Muscle Gain</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold text-muted small uppercase tracking-wider">Activity Level</label>
                        <select name="activity_level" class="form-select rounded-3">
                            <option value="sedentary">Sedentary (Little exercise)</option>
                            <option value="lightly_active">Lightly Active (1-3 days)</option>
                            <option value="moderately_active">Moderately Active (3-5 days)</option>
                            <option value="very_active">Very Active (6-7 days)</option>
                        </select>
                    </div>
                    <div class="col-12 pt-3">
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-3 shadow-sm">Generate My Fitness Plan &rarr;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
