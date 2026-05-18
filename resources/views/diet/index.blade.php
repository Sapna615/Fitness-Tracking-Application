@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Left Sidebar -->
        <div class="col-lg-2 col-md-3 bg-light border-end">
            <div class="p-4">
                <!-- Calories Remaining Card -->


                
                <div class="bg-gradient-primary text-white rounded-4 p-4 mb-4 shadow-lg">
                    <div class="text-center">
                        <h6 class="text-white-75 small mb-2">CALORIES REMAINING</h6>
                        <h2 class="fw-black mb-0">{{ $caloriesRemaining }}</h2>
                        <p class="small mb-0">kcal</p>
                        <div class="mt-3 pt-3 border-top border-white-25">
                            <small>{{ $dailyCalories }} / {{ $targetCalories }} kcal</small>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="mb-4">
                    <h6 class="text-muted small fw-bold uppercase mb-3">Menu</h6>
                    <div class="list-group">
                        <a href="{{ route('diet.overview') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.overview') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2">
                            <i class="fas fa-chart-pie me-2"></i>Diet Overview
                        </a>
                        <a href="{{ route('diet.meal-plan') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.meal-plan') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2 hover-lift">
                            <i class="fas fa-utensils me-2"></i>Meal Plan
                        </a>
                        <a href="{{ route('diet.recipes') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.recipes') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2 hover-lift">
                            <i class="fas fa-book me-2"></i>Recipes
                        </a>
                        <a href="{{ route('diet.grocery-list') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.grocery-list') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2 hover-lift">
                            <i class="fas fa-shopping-cart me-2"></i>Grocery List
                        </a>

                        <a href="{{ route('diet.supplements') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.supplements') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2 hover-lift">
                            <i class="fas fa-pills me-2"></i>Supplements
                        </a>
                        <a href="{{ route('diet.history') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.history') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2 hover-lift">
                            <i class="fas fa-history me-2"></i>Diet History
                        </a>
                        <a href="{{ route('diet.settings') }}" class="list-group-item list-group-item-action border-0 {{ request()->routeIs('diet.settings') ? 'active bg-primary text-white' : 'bg-white' }} rounded-3 mb-2 hover-lift">
                            <i class="fas fa-cog me-2"></i>Settings
                        </a>
                    </div>
                </div>

                <!-- Go Premium Ad -->
                <div class="bg-gradient-warning text-dark rounded-4 p-4 text-center shadow-lg">
                    <i class="fas fa-crown fs-3 mb-2"></i>
                    <h6 class="fw-bold mb-2">Go Premium</h6>
                    <p class="small mb-3">Unlock custom meal plans and insights</p>
                    <a href="{{ route('diet.premium') }}" class="btn btn-dark btn-sm rounded-pill px-3 py-1 fw-bold">Upgrade Now</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-7 col-md-9">
            <div class="p-4">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="fw-black mb-1">Diet Plan</h1>
                        <p class="text-muted mb-0">Eat right, feel amazing. Your diet is your power.</p>
                    </div>
                    <div>
                        <input type="date" class="form-control rounded-pill px-4 py-2 text-primary border-primary fw-bold bg-white" id="dietDatePicker" value="{{ $date }}" onchange="window.location.href='?date='+this.value">
                    </div>
                </div>

                <!-- Daily Summary Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="text-muted small fw-bold">Daily Calories</h6>
                                    <i class="fas fa-fire text-warning"></i>
                                </div>
                                <h4 class="fw-black mb-1">{{ $dailyCalories }} / {{ $targetCalories }} kcal</h4>
                                <div class="progress rounded-pill" style="height: 6px;">
                                    <div class="progress-bar bg-warning" style="width: {{ $targetCalories > 0 ? ($dailyCalories / $targetCalories) * 100 : 0 }}%"></div>
                                </div>
                                <small class="text-muted">{{ $targetCalories > 0 ? round(($dailyCalories / $targetCalories) * 100) : 0 }}% of goal</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="text-muted small fw-bold">Macros</h6>
                                    <i class="fas fa-chart-pie text-info"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted d-block">Carbs</small>
                                        <span class="fw-bold">{{ $macros['carbs']['percentage'] }}%</span>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Protein</small>
                                        <span class="fw-bold">{{ $macros['protein']['percentage'] }}%</span>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Fats</small>
                                        <span class="fw-bold">{{ $macros['fats']['percentage'] }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="text-muted small fw-bold">Goal (Fat Loss)</h6>
                                    <i class="fas fa-bullseye text-success"></i>
                                </div>
                                <h4 class="fw-black mb-1">{{ $goalProgress['current'] }} kg / {{ $goalProgress['target'] }}kg</h4>
                                <div class="progress rounded-pill" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: {{ $goalProgress['percentage'] }}%"></div>
                                </div>
                                <small class="text-muted">{{ $goalProgress['percentage'] }}%</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Meal Plan -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-link text-muted p-0 me-3">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <div>
                                    <h5 class="fw-black mb-0" id="selectedDateDisplay">Today, {{ \Carbon\Carbon::parse($date)->format('M d') }}</h5>
                                    <small class="text-muted" id="selectedDayDisplay">{{ \Carbon\Carbon::parse($date)->format('l') }}</small>
                                </div>
                                <button class="btn btn-link text-muted p-0 ms-3">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <button type="button" class="btn btn-primary rounded-pill px-4 py-2 btn-sm" data-bs-toggle="modal" data-bs-target="#addCustomMealModal">
                                <i class="fas fa-plus me-2"></i>Add Custom Meal
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @foreach($todaysMeals as $meal)
                        <div class="d-flex align-items-center p-3 mb-3 bg-light rounded-4 hover-lift">
                            <div class="me-3">
                                <div class="bg-white rounded-circle p-2 text-center">
                                    @if($meal['completed'])
                                        <img src="https://picsum.photos/seed/motivational1/40/40.jpg" alt="Motivational Quote" class="rounded-circle" style="width: 32px; height: 32px; object-fit: cover;">
                                    @else
                                        <i class="fas fa-clock text-muted"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <h6 class="fw-bold mb-1">{{ $meal['name'] }}</h6>
                                        <small class="text-muted">{{ $meal['description'] }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-{{ $meal['tag_color'] }}-bg-opacity-10 rounded-pill px-3 py-1 fw-bold small">{{ $meal['tag'] }}</span>
                                        <h6 class="fw-bold text-primary mb-0 mt-2">{{ $meal['calories'] }} kcal</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="col-lg-3 bg-light border-start">
            <div class="p-4">
                <!-- Nutrition Summary -->
                <div class="bg-white rounded-4 p-4 mb-4 shadow-sm">
                    <h6 class="fw-bold mb-3">Nutrition Summary</h6>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">Calories</small>
                            <small class="fw-bold">{{ $dailyCalories }} / {{ $targetCalories }} kcal</small>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: {{ ($dailyCalories / $targetCalories) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">Protein</small>
                            <small class="fw-bold">{{ $macros['protein']['current'] }} / {{ $macros['protein']['target'] }} g</small>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: {{ ($macros['protein']['current'] / $macros['protein']['target']) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">Carbs</small>
                            <small class="fw-bold">{{ $macros['carbs']['current'] }} / {{ $macros['carbs']['target'] }} g</small>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: {{ ($macros['carbs']['current'] / $macros['carbs']['target']) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">Fats</small>
                            <small class="fw-bold">{{ $macros['fats']['current'] }} / {{ $macros['fats']['target'] }} g</small>
                        </div>
                        <div class="progress rounded-pill" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: {{ ($macros['fats']['current'] / $macros['fats']['target']) * 100 }}%"></div>
                        </div>
                    </div>
                    <a href="{{ route('diet.nutrition-report') }}" class="btn btn-link text-primary fw-bold text-decoration-none p-0">View Full Nutrition Report →</a>
                </div>

                <!-- Weekly Progress -->
                <div class="bg-white rounded-4 p-4 mb-4 shadow-sm">
                    <h6 class="fw-bold mb-3">Weekly Progress</h6>
                    <div style="height: 150px;">
                        <canvas id="weeklyProgressChart"></canvas>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">Average Adherence</small>
                            <span class="badge bg-success rounded-pill px-3 py-1">{{ $averageAdherence }}%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Meals Planned</small>
                            <span class="text-success"><i class="fas fa-check-circle me-1"></i>{{ $mealsCompleted }} / {{ $mealsPlanned }}</span>
                        </div>
                    </div>
                </div>

                <!-- Healthy Tip -->
                <div class="bg-gradient-info text-white rounded-4 p-4 mb-4 shadow-lg">
                    <i class="fas fa-lightbulb fs-3 mb-2"></i>
                    <h6 class="fw-bold mb-2">Healthy Tip</h6>
                    <p class="small mb-0">Consistent healthy eating is 80% of your results. Keep going! Stay hydrated and focus on whole foods.</p>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Add Custom Meal Modal -->
<div class="modal fade" id="addCustomMealModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0 mt-2">
                <h5 class="fw-black modal-title">Add Custom Meal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('diet.add-custom-meal') }}" method="POST">
                @csrf
                <input type="hidden" name="date" value="{{ $date }}">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Time</label>
                        <input type="time" class="form-control rounded-pill" name="time" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Meal Name</label>
                        <input type="text" class="form-control rounded-pill" name="name" required placeholder="e.g. Protein Shake">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Description (Optional)</label>
                        <input type="text" class="form-control rounded-pill" name="description" placeholder="e.g. Whey protein, milk, banana">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-3 mb-3">
                            <label class="form-label text-muted small fw-bold">Calories</label>
                            <input type="number" class="form-control rounded-pill" name="calories" required placeholder="kcal">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label text-muted small fw-bold">Carbs (g)</label>
                            <input type="number" class="form-control rounded-pill" name="carbs" placeholder="g">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label text-muted small fw-bold">Protein (g)</label>
                            <input type="number" class="form-control rounded-pill" name="protein" placeholder="g">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label text-muted small fw-bold">Fat (g)</label>
                            <input type="number" class="form-control rounded-pill" name="fat" placeholder="g">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Tag</label>
                        <select class="form-select rounded-pill" name="tag" required>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                            <option value="Snack">Snack</option>
                            <option value="Supplement">Supplement</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 px-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Save Meal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
.bg-gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.bg-gradient-warning { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
.bg-gradient-info { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
.hover-lift { transition: all 0.3s ease; }
.hover-lift:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }

/* Fixed opacity classes */
.bg-success-bg-opacity-10 { background-color: rgba(25, 135, 84, 0.1) !important; color: #198754; }
.bg-warning-bg-opacity-10 { background-color: rgba(255, 193, 7, 0.1) !important; color: #ffc107; }
.bg-primary-bg-opacity-10 { background-color: rgba(13, 110, 253, 0.1) !important; color: #0d6efd; }
.bg-info-bg-opacity-10 { background-color: rgba(13, 202, 240, 0.1) !important; color: #0dcaf0; }
.bg-danger-bg-opacity-10 { background-color: rgba(220, 53, 69, 0.1) !important; color: #dc3545; }

/* Additional fixes */
.text-white-75 { color: rgba(255, 255, 255, 0.75) !important; }
.border-white-25 { border-color: rgba(255, 255, 255, 0.25) !important; }
.uppercase { text-transform: uppercase; }

/* Responsive fixes */
@media (max-width: 768px) {
    .col-lg-2 { display: none; }
    .col-lg-3 { display: none; }
    .col-lg-7 { flex: 0 0 100%; max-width: 100%; }
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('weeklyProgressChart').getContext('2d');
    const weeklyData = @json($weeklyProgress);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(weeklyData),
            datasets: [{
                label: 'Adherence %',
                data: Object.values(weeklyData),
                borderColor: '#4facfe',
                backgroundColor: 'rgba(79, 172, 254, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#4facfe',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { 
                    beginAtZero: false,
                    min: 60,
                    max: 100,
                    grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
                    ticks: { font: { size: 10 } }
                },
                x: { 
                    grid: { display: false },
                    ticks: { font: { size: 10 } }
                }
            },
            plugins: { 
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e3a8a',
                    titleFont: { size: 12 },
                    bodyFont: { size: 11 },
                    padding: 10,
                    displayColors: false
                }
            }
        }
    });
</script>
@endsection
