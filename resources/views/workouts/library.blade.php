@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-primary text-white py-5 mb-5 rounded-4">
    <div class="container text-center">
        <h1 class="fw-black display-4 mb-3">EXERCISE KNOWLEDGE BASE</h1>
        <p class="lead mb-4">Master your form with our professional video tutorials and expert guidance</p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white bg-opacity-10 rounded-4 p-4">
                    <div class="row text-center">
                        <div class="col-3">
                            <h3 class="fw-black">50+</h3>
                            <small>EXERCISES</small>
                        </div>
                        <div class="col-3">
                            <h3 class="fw-black">8</h3>
                            <small>MUSCLE GROUPS</small>
                        </div>
                        <div class="col-3">
                            <h3 class="fw-black">10+</h3>
                            <small>VIDEOS</small>
                        </div>
                        <div class="col-3">
                            <h3 class="fw-black">PRO</h3>
                            <small>LEVEL</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Tutorial -->
<div class="row g-4 mb-5">
    <div class="col-md-12">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-dark text-white">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="p-5">
                        <div class="badge bg-warning text-dark mb-3">FEATURED TUTORIAL</div>
                        <h2 class="fw-black mb-3">Complete Upper Body Workout</h2>
                        <p class="mb-4">Join our certified trainer for a comprehensive upper body session targeting chest, back, shoulders, and arms. Perfect for intermediate to advanced fitness levels.</p>
                        <div class="d-flex gap-3 mb-4">
                            <span class="badge bg-light text-dark"><i class="fas fa-clock me-1"></i>45 Minutes</span>
                            <span class="badge bg-light text-dark"><i class="fas fa-fire me-1"></i>High Intensity</span>
                            <span class="badge bg-light text-dark"><i class="fas fa-dumbbell me-1"></i>Equipment Needed</span>
                        </div>
                        <a href="https://www.youtube.com/watch?v=g_tea8ZNk5A" target="_blank" class="btn btn-warning text-dark rounded-pill px-5 py-3 fw-bold shadow">
                            <i class="fas fa-play me-2"></i>Watch Full Workout
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9 h-100">
                        <iframe class="embed-responsive-item w-100 h-100" src="https://www.youtube.com/embed/g_tea8ZNk5A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Exercise Categories -->
<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 hover-lift">
            <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                <i class="fas fa-dumbbell fs-2 text-primary"></i>
            </div>
            <h5 class="fw-bold">CHEST</h5>
            <p class="text-muted small">Build powerful pecs with bench presses, flyes, and push-ups</p>
            <span class="badge bg-primary rounded-pill">8 Exercises</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 hover-lift">
            <div class="bg-danger bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                <i class="fas fa-running fs-2 text-danger"></i>
            </div>
            <h5 class="fw-bold">LEGS</h5>
            <p class="text-muted small">Strong legs foundation with squats, lunges, and deadlifts</p>
            <span class="badge bg-danger rounded-pill">10 Exercises</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 hover-lift">
            <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                <i class="fas fa-circle-notch fs-2 text-success"></i>
            </div>
            <h5 class="fw-bold">CORE</h5>
            <p class="text-muted small">Rock-solid core with planks, crunches, and rotations</p>
            <span class="badge bg-success rounded-pill">12 Exercises</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 hover-lift">
            <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                <i class="fas fa-arrows-alt-v fs-2 text-info"></i>
            </div>
            <h5 class="fw-bold">BACK</h5>
            <p class="text-muted small">Strong back with pull-ups, rows, and deadlifts</p>
            <span class="badge bg-info rounded-pill">9 Exercises</span>
        </div>
    </div>
</div>

<!-- Exercise Videos Grid -->
@foreach([
    'CHEST' => [
        ['name' => 'Bench Press', 'video' => 'https://www.youtube.com/watch?v=rT7DgCr-3pg&t=4s', 'embed' => 'rT7DgCr-3pg', 'difficulty' => 'Intermediate', 'duration' => '8 min'],
        ['name' => 'Push-ups', 'video' => 'https://www.youtube.com/watch?v=IODxDxX7oi4', 'embed' => 'IODxDxX7oi4', 'difficulty' => 'Beginner', 'duration' => '6 min'],
        ['name' => 'Incline Dumbbell Press', 'video' => 'https://www.youtube.com/watch?v=8iPEnn-ltC8', 'embed' => '8iPEnn-ltC8', 'difficulty' => 'Intermediate', 'duration' => '10 min']
    ],
    'LEGS' => [
        ['name' => 'Squats', 'video' => 'https://www.youtube.com/watch?v=xuf1czJv-XI', 'embed' => 'xuf1czJv-XI', 'difficulty' => 'Beginner', 'duration' => '7 min'],
        ['name' => 'Lunges', 'video' => 'https://www.youtube.com/watch?v=MxfTNXSFiYI', 'embed' => 'MxfTNXSFiYI', 'difficulty' => 'Beginner', 'duration' => '8 min'],
        ['name' => 'Deadlifts', 'video' => 'https://www.youtube.com/watch?v=op9kVnSso6Q', 'embed' => 'op9kVnSso6Q', 'difficulty' => 'Advanced', 'duration' => '12 min']
    ],
    'CORE' => [
        ['name' => 'Plank', 'video' => 'https://www.youtube.com/watch?v=ASdvN_XEl_c', 'embed' => 'ASdvN_XEl_c', 'difficulty' => 'Beginner', 'duration' => '5 min'],
        ['name' => 'Crunches', 'video' => 'https://www.youtube.com/watch?v=0t4t3IpiEao', 'embed' => '0t4t3IpiEao', 'difficulty' => 'Beginner', 'duration' => '6 min'],
        ['name' => 'Russian Twists', 'video' => 'https://www.youtube.com/watch?v=DJQGX2J4IVw', 'embed' => 'DJQGX2J4IVw', 'difficulty' => 'Intermediate', 'duration' => '8 min']
    ],
    'BACK' => [
        ['name' => 'Pull-ups', 'video' => 'https://www.youtube.com/watch?v=eGo4IYlbE5g', 'embed' => 'eGo4IYlbE5g', 'difficulty' => 'Advanced', 'duration' => '9 min'],
        ['name' => 'Bent Over Rows', 'video' => 'https://www.youtube.com/watch?v=Cds8s4aaHXo', 'embed' => 'Cds8s4aaHXo', 'difficulty' => 'Intermediate', 'duration' => '8 min'],
        ['name' => 'Lat Pulldowns', 'video' => 'https://www.youtube.com/watch?v=AOpi-p0cJkc', 'embed' => 'AOpi-p0cJkc', 'difficulty' => 'Intermediate', 'duration' => '10 min']
    ]
] as $muscleGroup => $exercises)
    <div class="mb-5">
        <div class="mb-4">
            <h3 class="fw-black text-uppercase tracking-wider">
                <span class="badge bg-dark text-white me-2">{{ $muscleGroup }}</span>
                Exercise Library
            </h3>
        </div>
        
        <div class="row g-4">
            @foreach($exercises as $exercise)
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden hover-lift h-100">
                        <div class="position-relative">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item w-100" src="https://www.youtube.com/embed/{{ $exercise['embed'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-white text-dark shadow">{{ $exercise['difficulty'] }}</span>
                            </div>
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-dark text-white shadow">
                                    <i class="fas fa-clock me-1"></i>{{ $exercise['duration'] }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2">{{ $exercise['name'] }}</h5>
                            <p class="text-muted small mb-3">Perfect form and technique guide for maximum results and injury prevention.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <span class="badge bg-light text-dark"><i class="fas fa-fire"></i></span>
                                    <span class="badge bg-light text-dark"><i class="fas fa-dumbbell"></i></span>
                                    <span class="badge bg-light text-dark"><i class="fas fa-chart-line"></i></span>
                                </div>
                                <a href="{{ $exercise['video'] }}" target="_blank" class="btn btn-dark rounded-pill btn-sm">
                                    <i class="fas fa-play me-1"></i>Watch
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach

<!-- Tips Section -->
<div class="bg-light rounded-4 p-5 mt-5">
    <h3 class="fw-black mb-4 text-center">PRO TIPS FOR PERFECT FORM</h3>
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <div class="bg-white rounded-4 p-4 shadow-sm">
                <i class="fas fa-eye fs-1 text-primary mb-3"></i>
                <h5 class="fw-bold">Watch First</h5>
                <p class="text-muted small">Always watch the complete video before attempting any exercise</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="bg-white rounded-4 p-4 shadow-sm">
                <i class="fas fa-redo fs-1 text-success mb-3"></i>
                <h5 class="fw-bold">Start Light</h5>
                <p class="text-muted small">Begin with lighter weights to master the form first</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="bg-white rounded-4 p-4 shadow-sm">
                <i class="fas fa-heartbeat fs-1 text-danger mb-3"></i>
                <h5 class="fw-bold">Listen to Body</h5>
                <p class="text-muted small">Stop immediately if you feel pain or discomfort</p>
            </div>
        </div>
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    .hover-scale { transition: all 0.3s ease; }
    .hover-scale:hover { transform: scale(1.02); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .hover-lift { transition: all 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .bg-gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .embed-responsive { position: relative; display: block; width: 100%; padding: 0; }
    .embed-responsive::before { content: ""; display: block; padding-top: 56.25%; }
    .embed-responsive embed, .embed-responsive iframe, .embed-responsive object, .embed-responsive video { position: absolute; top: 0; bottom: 0; left: 0; width: 100%; height: 100%; border: 0; }
    .filter-hidden { display: none; }
</style>

@endsection
