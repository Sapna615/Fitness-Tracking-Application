@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-gradient-primary text-white p-4 rounded-4 shadow-lg">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="fw-black mb-2 display-5">Workout Calendar</h1>
                        <p class="mb-0 opacity-90">Your weekly transformation schedule</p>
                    </div>
                    <a href="{{ route('workouts.library') }}" class="btn btn-light text-primary rounded-pill px-4 py-3 fw-bold shadow hover-lift">
                        <i class="fas fa-dumbbell me-2"></i>Explore Exercises
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Workout Cards -->
    <div class="row g-4">
        @php
            $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $dayColors = [
                'Monday' => ['bg' => 'bg-gradient-primary', 'icon' => '💪'],
                'Tuesday' => ['bg' => 'bg-gradient-danger', 'icon' => '🦵'],
                'Wednesday' => ['bg' => 'bg-gradient-success', 'icon' => '🧘'],
                'Thursday' => ['bg' => 'bg-gradient-primary', 'icon' => '💪'],
                'Friday' => ['bg' => 'bg-gradient-danger', 'icon' => '🦵'],
                'Saturday' => ['bg' => 'bg-gradient-warning', 'icon' => '🏃'],
                'Sunday' => ['bg' => 'bg-gradient-secondary', 'icon' => '🛌']
            ];
        @endphp

        @foreach($weekDays as $day)
            <div class="col-lg col-md-6">
                <div class="card border-0 shadow-lg rounded-4 h-100 overflow-hidden hover-lift {{ $day == now()->format('l') ? 'border-4 border-warning shadow-xl scale-105 bg-warning bg-opacity-10' : '' }}" id="day-{{ strtolower($day) }}">
                    <!-- Card Header -->
                    <div class="card-header {{ $dayColors[$day]['bg'] }} p-3 border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-white">
                                <h5 class="fw-bold mb-0">{{ strtoupper($day) }}</h5>
                                <small class="opacity-75">{{ $day == now()->format('l') ? 'TODAY' : date('M d', strtotime('next ' . $day)) }}</small>
                            </div>
                            <div class="bg-white bg-opacity-25 rounded-circle p-2">
                                <span class="fs-4">{{ $dayColors[$day]['icon'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        @if(isset($workoutPlans[$day]) || (isset($workoutPlans) && method_exists($workoutPlans, 'has') && $workoutPlans->has($day)))
                            @php 
                                $dayPlans = isset($workoutPlans[$day]) ? $workoutPlans[$day] : $workoutPlans->get($day);
                            @endphp
                            @foreach($dayPlans as $plan)
                                <div class="mb-3">
                                    <h6 class="fw-bold mb-2 text-dark">
                                        @if(str_contains($plan->workout->title, 'Chest') || str_contains($plan->workout->title, 'Biceps') || str_contains($plan->workout->title, 'Shoulder'))
                                            <i class="fas fa-dumbbell text-primary me-2"></i>
                                        @elseif(str_contains($plan->workout->title, 'Leg'))
                                            <i class="fas fa-running text-danger me-2"></i>
                                        @elseif(str_contains($plan->workout->title, 'Yoga'))
                                            <i class="fas fa-spa text-success me-2"></i>
                                        @elseif(str_contains($plan->workout->title, 'Cardio') || str_contains($plan->workout->title, 'HIIT'))
                                            <i class="fas fa-heartbeat text-warning me-2"></i>
                                        @else
                                            <i class="fas fa-dumbbell text-primary me-2"></i>
                                        @endif
                                        {{ $plan->workout->title }}
                                    </h6>
                                    <p class="small text-muted mb-3">{{ $plan->workout->description }}</p>
                                    
                                    @if($plan->workout->exercises && count($plan->workout->exercises) > 0)
                                        <div class="mb-3 p-2 bg-light rounded-3">
                                            <div class="small fw-bold text-muted mb-1"><i class="fas fa-dumbbell me-1"></i>Exercises ({{ count($plan->workout->exercises) }}):</div>
                                            <div class="d-flex flex-column gap-1">
                                                @foreach($plan->workout->exercises as $exercise)
                                                    <span class="small text-dark d-flex align-items-center" style="font-size: 0.8rem;">
                                                        <i class="fas fa-check-circle text-success me-1 opacity-75"></i>
                                                        {{ $exercise->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        @if($plan->workout->title == 'Yoga & Core Stability')
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-redo me-1"></i>{{ $plan->sets }} Sets
                                            </span>
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-clock me-1"></i>{{ $plan->reps }} Seconds
                                            </span>
                                        @elseif($plan->workout->title == 'HIIT Cardio Session')
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-redo me-1"></i>{{ $plan->sets }} Rounds
                                            </span>
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-clock me-1"></i>{{ $plan->reps }} Seconds
                                            </span>
                                        @elseif(in_array($plan->workout->title, ['Active Recovery', 'Cardio & Core']))
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-clock me-1"></i>{{ $plan->reps }} Min
                                            </span>
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-fire me-1"></i>{{ $plan->workout->title == 'Active Recovery' ? 'Low' : 'Medium' }} Intensity
                                            </span>
                                        @else
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-redo me-1"></i>{{ $plan->sets }} Sets
                                            </span>
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                <i class="fas fa-bullseye me-1"></i>{{ $plan->reps }} Reps
                                            </span>
                                        @endif
                                    </div>

                                    @if($day == now()->format('l'))
                                        <button class="btn btn-primary rounded-pill px-4 py-2 w-100 fw-bold start-workout-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#workoutModal-{{ $plan->id }}"
                                                data-plan-id="{{ $plan->id }}">
                                            <i class="fas fa-play me-2"></i>Start Workout
                                        </button>
                                    @else
                                        <button class="btn btn-outline-secondary rounded-pill px-4 py-2 w-100 fw-bold" onclick="this.innerHTML='<i class=\'fas fa-check me-2\'></i>Done'; this.classList.remove('btn-outline-secondary'); this.classList.add('btn-success');">
                                            <i class="fas fa-check me-2"></i>Mark as Done
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-4">
                                <div class="bg-light rounded-circle p-3 d-inline-block mb-3">
                                    <span class="fs-2">{{ $dayColors[$day]['icon'] }}</span>
                                </div>
                                <h6 class="fw-bold text-muted mb-2">Rest Day</h6>
                                <p class="small text-muted mb-3">Recovery is essential for growth</p>
                                <div class="bg-light rounded-pill px-3 py-2 d-inline-block">
                                    <small class="text-muted">
                                        <i class="fas fa-bed me-1"></i>Take it easy
                                    </small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@foreach($workoutPlans as $day => $plans)
    @foreach($plans as $plan)
        <!-- Workout Modal -->
        <div class="modal fade" id="workoutModal-{{ $plan->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header bg-dark text-white border-0 p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle p-3 me-3">
                                <i class="fas fa-running fs-4"></i>
                            </div>
                            <div>
                                <h5 class="modal-title fw-black italic mb-0">{{ strtoupper($plan->workout->title) }}</h5>
                                <p class="small mb-0 opacity-75">LIVE SESSION • {{ strtoupper($day) }}</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 text-center">
                        <div class="mb-5">
                            <h1 class="display-1 fw-black mb-0 timer-display" id="timer-{{ $plan->id }}">00:00</h1>
                            <p class="text-muted uppercase tracking-widest fw-bold">Elapsed Time</p>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-6">
                                <div class="p-4 bg-light rounded-4 border-2 border-dashed border-primary border-opacity-25">
                                    <h2 class="fw-black mb-0">{{ $plan->sets }}</h2>
                                    <p class="text-muted small uppercase mb-0">{{ $plan->workout->title == 'HIIT Cardio Session' ? 'Target Rounds' : 'Target Sets' }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-4 bg-light rounded-4 border-2 border-dashed border-primary border-opacity-25">
                                    <h2 class="fw-black mb-0">{{ $plan->reps }}</h2>
                                    <p class="text-muted small uppercase mb-0">
                                        @if(in_array($plan->workout->title, ['Yoga & Core Stability', 'HIIT Cardio Session']))
                                            Seconds
                                        @elseif(in_array($plan->workout->title, ['Active Recovery', 'Cardio & Core']))
                                            Minutes
                                        @else
                                            Reps
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Exercises list in Modal -->
                        @if($plan->workout->exercises && count($plan->workout->exercises) > 0)
                            <div class="mb-5 text-start">
                                <h5 class="fw-bold mb-3 text-dark"><i class="fas fa-list me-2 text-primary"></i>Today's Exercises</h5>
                                <div class="list-group rounded-4 shadow-sm mb-4">
                                    @foreach($plan->workout->exercises as $exercise)
                                        <div class="list-group-item d-flex justify-content-between align-items-center p-3 border-light bg-light bg-opacity-50 hover-bg-light transition">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                                    <i class="fas fa-check font-sm"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-0 text-dark">{{ $exercise->name }}</h6>
                                                    <span class="badge bg-secondary bg-opacity-10 text-secondary font-xs tracking-wider text-uppercase" style="font-size: 0.7rem; padding: 0.25em 0.6em;">{{ $exercise->muscle_group }}</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold shadow-sm hover-lift" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#exerciseModal-{{ $exercise->id }}"
                                                    data-bs-dismiss="modal">
                                                <i class="fas fa-eye me-1"></i>View Guide
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="d-flex gap-3">
                            <button class="btn btn-outline-dark btn-lg rounded-pill px-5 fw-bold flex-grow-1" id="pause-{{ $plan->id }}" onclick="toggleTimer('{{ $plan->id }}')">
                                <i class="fas fa-pause me-2"></i>Pause
                            </button>
                            <button class="btn btn-primary btn-lg rounded-pill px-5 fw-bold flex-grow-1" onclick="finishWorkout('{{ $plan->id }}')">
                                <i class="fas fa-check-circle me-2"></i>Finish Workout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exercise Guidance Modals -->
        @if($plan->workout->exercises)
            @foreach($plan->workout->exercises as $exercise)
                <div class="modal fade" id="exerciseModal-{{ $exercise->id }}" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                            <div class="modal-header bg-dark text-white border-0 p-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-dumbbell text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="modal-title fw-black italic mb-0">{{ strtoupper($exercise->name) }}</h5>
                                        <p class="small mb-0 opacity-75">FORM & TECHNIQUE GUIDE • {{ strtoupper($exercise->muscle_group) }}</p>
                                    </div>
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-toggle="modal" data-bs-target="#workoutModal-{{ $plan->id }}" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-5">
                                <!-- Video embed -->
                                @if($exercise->video_url)
                                    @php
                                        // Extract youtube video ID from URL
                                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $exercise->video_url, $matches);
                                        $youtubeId = $matches[1] ?? 'g_tea8ZNk5A';
                                    @endphp
                                    <div class="embed-responsive embed-responsive-16by9 rounded-4 overflow-hidden mb-4 shadow">
                                        <iframe class="embed-responsive-item w-100" style="aspect-ratio: 16/9;" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                @endif

                                <div class="text-start mb-4 p-4 bg-light rounded-4 border-start border-4 border-primary">
                                    <h6 class="fw-bold text-dark mb-2"><i class="fas fa-align-left me-2 text-primary"></i>Perfect Form Instructions</h6>
                                    <p class="text-muted mb-0" style="line-height: 1.6; font-size: 0.95rem;">{{ $exercise->instructions }}</p>
                                </div>

                                <div>
                                    <button type="button" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold w-100 shadow hover-lift" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#workoutModal-{{ $plan->id }}"
                                            data-bs-dismiss="modal">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Live Session
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach
@endforeach

<style>
.fw-black { font-weight: 900; }
.bg-gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.bg-gradient-danger { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
.bg-gradient-success { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
.bg-gradient-warning { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
.bg-gradient-secondary { background: linear-gradient(135deg, #a8caba 0%, #5d4157 100%); }
.hover-lift { transition: all 0.3s ease; }
.hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
.scale-105 { transform: scale(1.05); }
.border-3 { border-width: 3px !important; }
.shadow-xl { box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important; }
.border-4 { border-width: 4px !important; }
.hover-bg-light:hover { background-color: rgba(0, 0, 0, 0.05) !important; }
.transition { transition: all 0.2s ease-in-out; }
.font-sm { font-size: 0.875rem !important; }
.font-xs { font-size: 0.75rem !important; }
.tracking-wider { letter-spacing: 0.05em; }
</style>

@section('scripts')
<script>
    // Timer Logic
    let intervals = {};
    let seconds = {};

    function toggleTimer(id) {
        const btn = document.getElementById('pause-' + id);
        if (intervals[id]) {
            clearInterval(intervals[id]);
            intervals[id] = null;
            btn.innerHTML = '<i class="fas fa-play me-2"></i>Resume';
            btn.classList.remove('btn-outline-dark');
            btn.classList.add('btn-dark');
        } else {
            startTimer(id);
            btn.innerHTML = '<i class="fas fa-pause me-2"></i>Pause';
            btn.classList.remove('btn-dark');
            btn.classList.add('btn-outline-dark');
        }
    }

    function startTimer(id) {
        if (!seconds[id]) seconds[id] = 0;
        intervals[id] = setInterval(() => {
            seconds[id]++;
            const mins = Math.floor(seconds[id] / 60).toString().padStart(2, '0');
            const secs = (seconds[id] % 60).toString().padStart(2, '0');
            document.getElementById('timer-' + id).textContent = `${mins}:${secs}`;
        }, 1000);
    }

    function finishWorkout(id) {
        clearInterval(intervals[id]);
        
        // Success animation/feedback
        const modalEl = document.getElementById('workoutModal-' + id);
        const modal = bootstrap.Modal.getInstance(modalEl);
        
        const body = modalEl.querySelector('.modal-body');
        const originalContent = body.innerHTML;
        
        body.innerHTML = `
            <div class="text-center py-5">
                <div class="display-1 mb-4">🏆</div>
                <h2 class="fw-black mb-2">WORKOUT COMPLETE!</h2>
                <p class="text-muted">You crushed it. Great job staying consistent!</p>
                <div class="mt-4">
                    <button class="btn btn-primary rounded-pill px-5 fw-bold" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        `;

        // Update the main page button
        const startBtn = document.querySelector(`.start-workout-btn[data-plan-id="${id}"]`);
        if (startBtn) {
            startBtn.innerHTML = '<i class="fas fa-check-circle me-2"></i>Completed ✅';
            startBtn.classList.remove('btn-primary');
            startBtn.classList.add('btn-success');
            startBtn.disabled = true;
        }

        // Reset for next time if they close and reopen (though it's disabled now)
        setTimeout(() => {
            // body.innerHTML = originalContent;
        }, 1000);
    }

    // Initialize timer when modal opens
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('shown.bs.modal', function () {
            const id = this.id.split('-')[1];
            if (!intervals[id]) startTimer(id);
        });
    });
</script>
@endsection
@endsection
