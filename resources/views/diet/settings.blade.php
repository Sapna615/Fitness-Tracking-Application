@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Diet Settings</h1>
                    <p class="text-muted mb-0">Customize your nutrition preferences</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-undo me-2"></i>Reset to Default
                    </button>
                    <button class="btn btn-primary rounded-pill">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>

            <!-- Nutrition Goals -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">
                        <i class="fas fa-bullseye text-primary me-2"></i>Nutrition Goals
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Daily Calorie Target</label>
                                <div class="input-group">
                                    <input type="number" class="form-control rounded-pill" value="2000" min="1200" max="5000">
                                    <span class="input-group-text">kcal</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Protein Goal (g)</label>
                                <input type="number" class="form-control rounded-pill" value="150" min="50" max="300">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Carbs Goal (g)</label>
                                <input type="number" class="form-control rounded-pill" value="225" min="100" max="400">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Fats Goal (g)</label>
                                <input type="number" class="form-control rounded-pill" value="67" min="30" max="150">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Fiber Goal (g)</label>
                                <input type="number" class="form-control rounded-pill" value="30" min="15" max="60">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Water Goal (L)</label>
                                <input type="number" class="form-control rounded-pill" value="2.5" min="1" max="5" step="0.1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dietary Preferences -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">
                        <i class="fas fa-utensils text-success me-2"></i>Dietary Preferences
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Diet Type</label>
                                <select class="form-select rounded-pill">
                                    <option>Balanced</option>
                                    <option>High Protein</option>
                                    <option>Low Carb</option>
                                    <option>Keto</option>
                                    <option>Vegan</option>
                                    <option>Mediterranean</option>
                                    <option>Paleo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Food Allergies</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="nuts">
                                        <label class="form-check-label">Nuts</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="dairy">
                                        <label class="form-check-label">Dairy</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="gluten">
                                        <label class="form-check-label">Gluten</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="soy">
                                        <label class="form-check-label">Soy</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="eggs">
                                        <label class="form-check-label">Eggs</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Meal Timing</label>
                                <select class="form-select rounded-pill">
                                    <option>3 Main Meals</option>
                                    <option>5 Small Meals</option>
                                    <option>Intermittent Fasting</option>
                                    <option>Time Restricted</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Preferred Cuisine</label>
                                <select class="form-select rounded-pill">
                                    <option>Mixed</option>
                                    <option>Italian</option>
                                    <option>Asian</option>
                                    <option>Mediterranean</option>
                                    <option>Mexican</option>
                                    <option>Indian</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">
                        <i class="fas fa-bell text-warning me-2"></i>Notifications
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Meal Reminders</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Water Reminders</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Progress Updates</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Weekly Reports</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Reminder Time</label>
                                <input type="time" class="form-control rounded-pill" value="08:00">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Reminder Frequency</label>
                                <select class="form-select rounded-pill">
                                    <option>Daily</option>
                                    <option>Every 2 Hours</option>
                                    <option>Every 3 Hours</option>
                                    <option>Every 4 Hours</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data & Privacy -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">
                        <i class="fas fa-shield-alt text-info me-2"></i>Data & Privacy
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Share Progress Publicly</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">Connect with Health Apps</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Auto-sync with Wearables</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <button class="btn btn-outline-danger w-100 rounded-pill">
                                    <i class="fas fa-trash me-2"></i>Delete All Data
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <button class="btn btn-outline-primary w-100 rounded-pill">
                                    <i class="fas fa-download me-2"></i>Export All Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="text-center mt-5">
                <button class="btn btn-success rounded-pill px-5 py-3">
                    <i class="fas fa-save me-2"></i>Save All Settings
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
.form-check-input:checked + .form-check-label::before {
    background-color: #0d6efd;
    border-color: #0d6efd;
}
</style>
@endsection
