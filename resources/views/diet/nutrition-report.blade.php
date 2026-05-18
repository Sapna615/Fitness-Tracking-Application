@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Nutrition Report</h1>
                    <p class="text-muted mb-0">Detailed analysis of your nutritional intake</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary rounded-pill">
                        <i class="fas fa-download me-2"></i>Download Report
                    </button>
                    <button class="btn btn-primary rounded-pill">
                        <i class="fas fa-share me-2"></i>Share
                    </button>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-fire text-warning fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">11,760</h3>
                            <p class="text-muted mb-0">Weekly Calories</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-bullseye text-success fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">84%</h3>
                            <p class="text-muted mb-0">Goal Adherence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line text-info fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">-1.2 kg</h3>
                            <p class="text-muted mb-0">Weight Change</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-trophy text-primary fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">21</h3>
                            <p class="text-muted mb-0">Day Streak</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Nutrition Breakdown -->
            <div class="row g-4 mb-5">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Weekly Nutrition Breakdown</h5>
                        </div>
                        <div class="card-body p-4">
                            <div style="height: 300px;">
                                <canvas id="nutritionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Macronutrients</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Protein</span>
                                    <span class="fw-bold">882g</span>
                                </div>
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: 88%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Carbs</span>
                                    <span class="fw-bold">1323g</span>
                                </div>
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 92%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Fats</span>
                                    <span class="fw-bold">329g</span>
                                </div>
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 75%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Fiber</span>
                                    <span class="fw-bold">98g</span>
                                </div>
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-info" style="width: 110%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daily Breakdown Table -->
            <div class="card border-0 shadow-sm rounded-4 mb-5">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Daily Breakdown</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                    <th>Carbs</th>
                                    <th>Fats</th>
                                    <th>Water (L)</th>
                                    <th>Adherence</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Monday</strong></td>
                                    <td>1,680</td>
                                    <td>126g</td>
                                    <td>189g</td>
                                    <td>47g</td>
                                    <td>2.5</td>
                                    <td>84%</td>
                                    <td><span class="badge bg-success rounded-pill">Excellent</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tuesday</strong></td>
                                    <td>1,720</td>
                                    <td>128g</td>
                                    <td>195g</td>
                                    <td>48g</td>
                                    <td>2.2</td>
                                    <td>86%</td>
                                    <td><span class="badge bg-success rounded-pill">Excellent</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Wednesday</strong></td>
                                    <td>1,650</td>
                                    <td>124g</td>
                                    <td>182g</td>
                                    <td>46g</td>
                                    <td>2.8</td>
                                    <td>82%</td>
                                    <td><span class="badge bg-success rounded-pill">Good</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Thursday</strong></td>
                                    <td>1,750</td>
                                    <td>130g</td>
                                    <td>198g</td>
                                    <td>49g</td>
                                    <td>2.1</td>
                                    <td>88%</td>
                                    <td><span class="badge bg-success rounded-pill">Excellent</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Friday</strong></td>
                                    <td>1,680</td>
                                    <td>126g</td>
                                    <td>189g</td>
                                    <td>47g</td>
                                    <td>1.8</td>
                                    <td>84%</td>
                                    <td><span class="badge bg-success rounded-pill">Good</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Saturday</strong></td>
                                    <td>1,700</td>
                                    <td>127g</td>
                                    <td>192g</td>
                                    <td>48g</td>
                                    <td>2.3</td>
                                    <td>85%</td>
                                    <td><span class="badge bg-success rounded-pill">Good</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Sunday</strong></td>
                                    <td>1,580</td>
                                    <td>121g</td>
                                    <td>178g</td>
                                    <td>44g</td>
                                    <td>2.0</td>
                                    <td>79%</td>
                                    <td><span class="badge bg-warning rounded-pill">Fair</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Insights & Recommendations -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Key Insights</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <h6 class="fw-bold text-success mb-2"><i class="fas fa-check-circle me-2"></i>Protein Intake</h6>
                                <p class="text-muted mb-0">Your protein intake is excellent at 126g/day, supporting muscle recovery and growth.</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="fw-bold text-warning mb-2"><i class="fas fa-exclamation-triangle me-2"></i>Hydration</h6>
                                <p class="text-muted mb-0">Water intake could be improved. Aim for 2.5L daily for optimal performance.</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="fw-bold text-info mb-2"><i class="fas fa-info-circle me-2"></i>Calorie Consistency</h6>
                                <p class="text-muted mb-0">Great consistency! Your daily calories vary by only 7% from target.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Recommendations</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <h6 class="fw-bold text-primary mb-2"><i class="fas fa-lightbulb me-2"></i>Next Week Focus</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">Increase water intake to 2.5L daily</li>
                                    <li class="mb-2">Add more fiber-rich vegetables</li>
                                    <li class="mb-2">Consider post-workout protein shake</li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <h6 class="fw-bold text-success mb-2"><i class="fas fa-trophy me-2"></i>Meal Suggestions</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">Try salmon twice weekly for omega-3</li>
                                    <li class="mb-2">Add quinoa for complete protein</li>
                                    <li class="mb-2">Include more leafy greens</li>
                                </ul>
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
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('nutritionChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [
                {
                    label: 'Protein (g)',
                    data: [126, 128, 124, 130, 126, 127, 121],
                    backgroundColor: 'rgba(13, 110, 253, 0.8)',
                    borderColor: 'rgba(13, 110, 253, 1)',
                    borderWidth: 2
                },
                {
                    label: 'Carbs (g)',
                    data: [189, 195, 182, 198, 189, 192, 178],
                    backgroundColor: 'rgba(25, 135, 84, 0.8)',
                    borderColor: 'rgba(25, 135, 84, 1)',
                    borderWidth: 2
                },
                {
                    label: 'Fats (g)',
                    data: [47, 48, 46, 49, 47, 48, 44],
                    backgroundColor: 'rgba(255, 193, 7, 0.8)',
                    borderColor: 'rgba(255, 193, 7, 1)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
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
