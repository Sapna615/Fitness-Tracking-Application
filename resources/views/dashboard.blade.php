@extends('layouts.app')

@section('content')
<div class="row g-4">
    <!-- Welcome & Goal Progress -->
    <div class="col-12">
        <div class="card bg-primary text-white p-4 border-0 shadow-lg overflow-hidden position-relative">
            <div class="position-absolute top-0 end-0 p-4 opacity-25 display-1 fw-black italic">🎯</div>
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-black mb-1">Welcome back, {{ $user->name }}! 🔥</h2>
                    <p class="mb-4 opacity-75 fs-5">You're making great progress towards your <strong>{{ str_replace('_', ' ', ucfirst($profile->fitness_goal)) }}</strong> goal.</p>
                    
                    <div class="mb-2 d-flex justify-content-between align-items-end">
                        <span class="fw-bold uppercase tracking-wider small">Goal Progress</span>
                        <span class="fw-black fs-4">{{ $progressPercentage }}%</span>
                    </div>
                    <div class="progress rounded-pill bg-white/20" style="height: 12px;">
                        <div class="progress-bar bg-info shadow-sm" style="width: {{ $progressPercentage }}%"></div>
                    </div>
                    <p class="mt-3 mb-0 small italic opacity-75">"Consistency is the key to transformation. Keep pushing!"</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="col-md-3">
        <div class="card text-center p-4 border-0 shadow-sm h-100">
            <h1 class="display-5 fw-black text-primary mb-1">{{ $streak->streak_count }}</h1>
            <p class="text-muted small fw-bold uppercase tracking-widest mb-0">🔥 Day Streak</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-4 border-0 shadow-sm h-100">
            <h1 class="display-5 fw-black text-info mb-1">{{ $bmi }}</h1>
            <p class="text-muted small fw-bold uppercase tracking-widest mb-0">⚖️ BMI: {{ $bmiStatus }}</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-4 border-0 shadow-sm h-100">
            <h1 class="display-5 fw-black text-warning mb-1">{{ $tdee }}</h1>
            <p class="text-muted small fw-bold uppercase tracking-widest mb-0">🔥 Daily Calorie Target</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-4 border-0 shadow-sm h-100">
            <h1 class="display-5 fw-black text-success mb-1">{{ $user->achievements->count() }}</h1>
            <p class="text-muted small fw-bold uppercase tracking-widest mb-0">🏆 Achievements</p>
        </div>
    </div>

    <!-- Achievements Section -->
    <div class="col-12 mt-4">
        <div class="d-flex gap-2 overflow-auto pb-2" style="scrollbar-width: none;">
            @foreach($user->achievements as $ach)
                <div class="bg-white border rounded-pill px-4 py-2 d-flex align-items-center flex-shrink-0 shadow-sm">
                    <span class="fs-4 me-2">{{ $ach->icon }}</span>
                    <span class="fw-bold small">{{ $ach->title }}</span>
                </div>
            @endforeach
            @if($user->achievements->count() == 0)
                <p class="text-muted small italic mb-0">No achievements yet. Start training to unlock rewards!</p>
            @endif
        </div>
    </div>

    <!-- Today's Workout -->
    <div class="col-md-7">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-black mb-0 italic">TODAY'S WORKOUT</h4>
                    <span class="badge bg-light text-dark rounded-pill px-3 py-2 fw-bold border">{{ now()->format('l, M d') }}</span>
                </div>
                @forelse($dailyWorkout as $item)
                    <div class="d-flex align-items-center p-4 mb-3 bg-light rounded-4 border hover-shadow transition">
                        <div class="bg-primary text-white rounded-circle p-3 me-4 shadow-sm">
                            <h5 class="mb-0">💪</h5>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1 text-dark">{{ $item->workout->title }}</h5>
                            <p class="small text-muted mb-0">
                            @if(in_array($item->workout->title, ['Active Recovery', 'Cardio & Core']))
                                {{ $item->reps }} Min • {{ $item->workout->title == 'Active Recovery' ? 'Low' : 'Medium' }} Intensity • {{ $item->workout->difficulty_level }}
                            @else
                                {{ $item->sets }} sets x {{ $item->reps }} reps • {{ $item->workout->difficulty_level }}
                            @endif
                        </p>
                        </div>
                        <div class="form-check fs-4">
                            <input class="form-check-input rounded-circle border-primary" type="checkbox">
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <h1 class="mb-3">🛌</h1>
                        <h5 class="fw-bold text-muted">Recovery Day!</h5>
                        <p class="text-muted small">Your muscles grow when you rest. Enjoy your break!</p>
                    </div>
                @endforelse
                <a href="{{ route('workouts.index') }}" class="btn btn-link text-primary fw-bold p-0 text-decoration-none mt-3">View Full Schedule &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="col-md-5">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-4 text-center">
                <h4 class="fw-black mb-4 italic text-start">FITNESS CALCULATOR</h4>
                <div class="bg-dark text-white p-4 rounded-4 mb-4">
                    <p class="small opacity-50 uppercase tracking-widest fw-bold">Current BMI</p>
                    <h1 class="display-3 fw-black mb-0 text-info">{{ $bmi }}</h1>
                    <p class="badge bg-info-subtle text-info mt-2 px-3 py-2 rounded-pill fw-bold">{{ $bmiStatus }}</p>
                </div>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-4 border">
                            <p class="small text-muted mb-1 fw-bold uppercase">Height</p>
                            <h5 class="fw-black mb-0">{{ $profile->height }} cm</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-light rounded-4 border">
                            <p class="small text-muted mb-1 fw-bold uppercase">Weight</p>
                            <h5 class="fw-black mb-0">{{ $profile->weight }} kg</h5>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-dark w-100 mt-4 py-3 rounded-4 fw-bold" data-bs-toggle="modal" data-bs-target="#recalculateModal">Recalculate Stats</button>
            </div>
        </div>
    </div>

    <!-- Weight Chart -->
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h4 class="fw-black mb-0 italic">WEIGHT PROGRESSION</h4>
                    <a href="{{ route('progress.index') }}" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Log Today's Weight</a>
                </div>
                <div style="height: 400px;">
                    <canvas id="weightChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recalculate Modal -->
<div class="modal fade" id="recalculateModal" tabindex="-1" aria-labelledby="recalculateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-black italic" id="recalculateModalLabel">UPDATE YOUR STATS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.recalculate') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <p class="text-muted small mb-4">Update your height and weight to recalculate your BMI and daily caloric target.</p>
                    <div class="mb-3">
                        <label for="heightInput" class="form-label fw-bold text-muted uppercase tracking-widest small">Height (cm)</label>
                        <input type="number" class="form-control form-control-lg rounded-3" id="heightInput" name="height" value="{{ $profile->height }}" required min="100" max="250">
                    </div>
                    <div class="mb-4">
                        <label for="weightInput" class="form-label fw-bold text-muted uppercase tracking-widest small">Weight (kg)</label>
                        <input type="number" class="form-control form-control-lg rounded-3" id="weightInput" name="weight" value="{{ $profile->weight }}" required min="30" max="300" step="0.1">
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark rounded-pill px-4 fw-bold">Recalculate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .bg-white\/20 { background-color: rgba(255,255,255,0.2); }
    .hover-shadow:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.05); transform: translateY(-2px); }
    .transition { transition: all 0.3s ease; }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('weightChart').getContext('2d');
    const labels = {!! json_encode($progressData->pluck('date')->map(fn($d) => date('M d', strtotime($d)))) !!};
    const weights = {!! json_encode($progressData->pluck('weight')) !!};

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Weight (kg)',
                data: weights,
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                borderWidth: 4,
                fill: true,
                tension: 0.4,
                pointRadius: 6,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#2563eb',
                pointBorderWidth: 3,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { 
                    beginAtZero: false, 
                    grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
                    ticks: { font: { weight: 'bold' } }
                },
                x: { 
                    grid: { display: false },
                    ticks: { font: { weight: 'bold' } }
                }
            },
            plugins: { 
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e3a8a',
                    titleFont: { size: 16, weight: 'bold' },
                    bodyFont: { size: 14 },
                    padding: 15,
                    displayColors: false
                }
            }
        }
    });
</script>
@endsection
