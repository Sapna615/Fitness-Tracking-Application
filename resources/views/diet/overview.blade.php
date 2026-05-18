@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Diet Overview</h1>
                    <p class="text-muted mb-0">Complete nutrition dashboard and insights</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary rounded-pill" onclick="exportOverviewReport()">
                        <i class="fas fa-download me-2"></i>Export Report
                    </button>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-fire text-danger fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">1,680</h3>
                            <p class="text-muted mb-0">Avg Daily Calories</p>
                            <div class="text-warning small">
                                <i class="fas fa-arrow-down me-1"></i>5% from last week
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-trophy text-success fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">28</h3>
                            <p class="text-muted mb-0">Day Streak</p>
                            <div class="text-success small">
                                <i class="fas fa-arrow-up me-1"></i>Best this month
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-bullseye text-primary fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">84%</h3>
                            <p class="text-muted mb-0">Goal Adherence</p>
                            <div class="text-info small">
                                <i class="fas fa-minus me-1"></i>2% from target
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-weight text-warning fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">-2.4 kg</h3>
                            <p class="text-muted mb-0">Weight Change</p>
                            <div class="text-success small">
                                <i class="fas fa-arrow-down me-1"></i>On track
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nutrition Trends -->
            <div class="row g-4 mb-5">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Nutrition Trends</h5>
                        </div>
                        <div class="card-body p-4">
                            <div style="height: 300px;">
                                <canvas id="nutritionTrendsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Meals -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-black mb-0">Recent Meals</h5>
                        <a href="{{ route('diet.meal-plan') }}" class="btn btn-primary rounded-pill btn-sm">
                            <i class="fas fa-calendar me-2"></i>View Meal Plan
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-circle p-3 me-3">
                                    <i class="fas fa-utensils text-primary fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Breakfast</h6>
                                    <p class="text-muted mb-0">Oats with Fruits & Nuts</p>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-success rounded-pill">High-Fiber</span>
                                        <span class="text-muted">420 kcal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-circle p-3 me-3">
                                    <i class="fas fa-drumstick-bite text-warning fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Lunch</h6>
                                    <p class="text-muted mb-0">Grilled Chicken Salad</p>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-primary rounded-pill">High-Protein</span>
                                        <span class="text-muted">380 kcal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-circle p-3 me-3">
                                    <i class="fas fa-drumstick-bite text-danger fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Dinner</h6>
                                    <p class="text-muted mb-0">Salmon with Vegetables</p>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-info rounded-pill">Omega-3</span>
                                        <span class="text-muted">450 kcal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-circle p-3 me-3">
                                    <i class="fas fa-apple-alt text-success fs-1"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Snack</h6>
                                    <p class="text-muted mb-0">Greek Yogurt & Berries</p>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-warning rounded-pill">Low-Carb</span>
                                        <span class="text-muted">180 kcal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
</style>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Export Overview Report
    function exportOverviewReport() {
        const overviewData = {
            dateRange: 'Last 30 Days',
            avgCalories: 1680,
            avgProtein: 126,
            avgCarbs: 189,
            avgFats: 47,
            totalWeightChange: -2.4,
            dayStreak: 28,
            goalAdherence: 84,
            generatedAt: new Date().toISOString()
        };
        
        const dataStr = JSON.stringify(overviewData, null, 2);
        const dataBlob = new Blob([dataStr], {type: 'application/json'});
        const url = URL.createObjectURL(dataBlob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'diet-overview-report.json';
        link.click();
        
        alert('Diet overview report exported successfully!');
        console.log('Exporting overview data:', overviewData);
    }
    
    // Nutrition Trends Chart
    const ctx = document.getElementById('nutritionTrendsChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Calories',
                data: [1650, 1720, 1680, 1750, 1620, 1800, 1700],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }, {
                label: 'Protein',
                data: [120, 135, 125, 140, 110, 150, 130],
                borderColor: '#16a34a',
                backgroundColor: 'rgba(22, 163, 74, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: false,
                    grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                tooltip: {
                    backgroundColor: '#1e3a8a',
                    titleFont: { size: 14 },
                    bodyFont: { size: 12 },
                    padding: 12
                }
            }
        }
    });
</script>
@endsection
