@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Fasting Analytics</h1>
                    <p class="text-muted mb-0">Detailed insights and trends from your fasting data</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill" onclick="history.back()">
                        <i class="fas fa-arrow-left me-2"></i>Back to Tracker
                    </button>
                </div>
            </div>

            <!-- Analytics Overview -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Fasting Trends</h5>
                        </div>
                        <div class="card-body p-4">
                            <div style="height: 300px;">
                                <canvas id="fastingTrendsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <h5 class="fw-black mb-0">Success Rate</h5>
                        </div>
                        <div class="card-body p-4">
                            <div style="height: 300px;">
                                <canvas id="successRateChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Stats -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-fire text-danger fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">752</h3>
                            <p class="text-muted mb-0">Total Hours Fasted</p>
                            <div class="text-success small">
                                <i class="fas fa-arrow-up me-1"></i>12% from last month
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-calendar-check text-success fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">21</h3>
                            <p class="text-muted mb-0">Current Streak</p>
                            <div class="text-success small">
                                <i class="fas fa-arrow-up me-1"></i>Personal best
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-percentage text-primary fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">89%</h3>
                            <p class="text-muted mb-0">Completion Rate</p>
                            <div class="text-warning small">
                                <i class="fas fa-minus me-1"></i>Same as last month
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Breakdown -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Monthly Breakdown</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Total Fasts</th>
                                    <th>Avg Duration</th>
                                    <th>Success Rate</th>
                                    <th>Best Streak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>May 2024</strong></td>
                                    <td>24</td>
                                    <td>16.2 hours</td>
                                    <td>92%</td>
                                    <td>21 days</td>
                                </tr>
                                <tr>
                                    <td><strong>April 2024</strong></td>
                                    <td>22</td>
                                    <td>15.8 hours</td>
                                    <td>86%</td>
                                    <td>14 days</td>
                                </tr>
                                <tr>
                                    <td><strong>March 2024</strong></td>
                                    <td>20</td>
                                    <td>16.5 hours</td>
                                    <td>90%</td>
                                    <td>18 days</td>
                                </tr>
                                <tr>
                                    <td><strong>February 2024</strong></td>
                                    <td>18</td>
                                    <td>15.2 hours</td>
                                    <td>83%</td>
                                    <td>12 days</td>
                                </tr>
                            </tbody>
                        </table>
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
    // Get fasting data from localStorage or use default data
    const fastingData = localStorage.getItem('fastingData') ? 
        JSON.parse(localStorage.getItem('fastingData')) : [
            { date: '2024-05-24', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
            { date: '2024-05-23', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
            { date: '2024-05-22', type: 'Extended', startTime: '6:00 PM', endTime: '2:00 PM', duration: '20 hours', status: 'Completed' },
            { date: '2024-05-21', type: 'Intermittent', startTime: '8:00 PM', endTime: '11:30 AM', duration: '15.5 hours', status: 'Early Break' },
            { date: '2024-05-20', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
            { date: '2024-05-19', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
            { date: '2024-05-18', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
            { date: '2024-05-17', type: 'Extended', startTime: '7:00 PM', endTime: '3:00 PM', duration: '20 hours', status: 'Completed' },
            { date: '2024-05-16', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
            { date: '2024-05-15', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' }
        ];

    // Calculate analytics from real data
    function calculateAnalytics() {
        const totalFasts = fastingData.length;
        const totalHours = fastingData.reduce((sum, fast) => {
            const hours = parseFloat(fast.duration);
            return sum + hours;
        }, 0);
        
        const completedFasts = fastingData.filter(f => f.status === 'Completed').length;
        const successRate = Math.round((completedFasts / totalFasts) * 100);
        
        // Calculate weekly data
        const weeklyData = [];
        for (let i = 0; i < 4; i++) {
            const weekStart = i * 7;
            const weekEnd = Math.min(weekStart + 7, fastingData.length);
            const weekFasts = fastingData.slice(weekStart, weekEnd);
            const weekHours = weekFasts.reduce((sum, fast) => sum + parseFloat(fast.duration), 0);
            weeklyData.push(weekHours);
        }
        
        // Calculate success rate breakdown
        const completed = fastingData.filter(f => f.status === 'Completed').length;
        const earlyBreak = fastingData.filter(f => f.status === 'Early Break').length;
        const missed = fastingData.filter(f => f.status === 'Missed').length;
        
        return {
            totalFasts,
            totalHours,
            successRate,
            weeklyData,
            breakdown: [completed, earlyBreak, missed]
        };
    }

    const analytics = calculateAnalytics();

    // Update stats cards
    document.addEventListener('DOMContentLoaded', function() {
        const statElements = document.querySelectorAll('.card-body h3');
        if (statElements[0]) statElements[0].textContent = analytics.totalHours;
        if (statElements[2]) statElements[2].textContent = '21'; // Current streak
        if (statElements[3]) statElements[3].textContent = analytics.successRate + '%';
    });

    // Fasting Trends Chart
    const trendsCtx = document.getElementById('fastingTrendsChart').getContext('2d');
    new Chart(trendsCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Hours Fasted',
                data: analytics.weeklyData,
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.1)',
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
                }
            }
        }
    });

    // Success Rate Chart
    const successCtx = document.getElementById('successRateChart').getContext('2d');
    new Chart(successCtx, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Early Break', 'Missed'],
            datasets: [{
                data: analytics.breakdown,
                backgroundColor: ['#16a34a', '#eab308', '#dc2626'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
