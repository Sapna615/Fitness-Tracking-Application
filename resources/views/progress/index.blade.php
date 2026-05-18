@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">Your Progress</h1>
        <p class="lead text-muted">Track your fitness journey and celebrate your achievements</p>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="text-center p-4 bg-light rounded-4">
                <div class="mb-3">
                    <i class="fas fa-fire text-danger fs-1"></i>
                </div>
                <h2 class="fw-bold">2,847</h2>
                <p class="text-muted mb-0">Calories Burned This Week</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center p-4 bg-light rounded-4">
                <div class="mb-3">
                    <i class="fas fa-weight text-success fs-1"></i>
                </div>
                <h2 class="fw-bold">71.2 kg</h2>
                <p class="text-muted mb-0">Current Weight</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center p-4 bg-light rounded-4">
                <div class="mb-3">
                    <i class="fas fa-dumbbell text-primary fs-1"></i>
                </div>
                <h2 class="fw-bold">18</h2>
                <p class="text-muted mb-0">Workouts This Month</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center p-4 bg-light rounded-4">
                <div class="mb-3">
                    <i class="fas fa-trophy text-warning fs-1"></i>
                </div>
                <h2 class="fw-bold">7</h2>
                <p class="text-muted mb-0">Day Streak</p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-lg-5 d-flex flex-column gap-4">
            <!-- Activity Logger -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Log Activity</h4>
                    
                    <form id="activityForm">
                        <div class="mb-3">
                            <label class="form-label">What did you do?</label>
                            <select id="activityType" class="form-select form-select-lg" onchange="updateCalories()">
                                <option value="">Choose activity...</option>
                                <option value="running">🏃 Running</option>
                                <option value="cycling">🚴 Cycling</option>
                                <option value="swimming">🏊 Swimming</option>
                                <option value="gym">🏋️ Gym Workout</option>
                                <option value="yoga">🧘 Yoga</option>
                                <option value="walking">🚶 Walking</option>
                                <option value="hiit">💪 HIIT</option>
                                <option value="sports">⚽ Sports</option>
                            </select>
                        </div>
                        
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label">Duration (min)</label>
                                <input type="number" id="duration" class="form-control form-control-lg" 
                                       min="1" value="30" onchange="updateCalories()">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Weight (kg)</label>
                                <input type="number" id="bodyWeight" class="form-control form-control-lg" 
                                       step="0.1" value="70" onchange="updateCalories()">
                            </div>
                        </div>
                        
                        <div class="bg-primary bg-opacity-10 rounded-3 p-3 mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Calories burned:</span>
                                <span class="fs-4 fw-bold text-primary" id="estimatedCalories">0 kcal</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                            <i class="fas fa-plus me-2"></i>Log Activity
                        </button>
                    </form>
                </div>
            </div>

            <!-- Weight Progress -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Weight Progress</h4>
                    
                    <!-- Weight Input Form -->
                    <div class="mb-4">
                        <form action="{{ route('progress.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="date" value="{{ now()->toDateString() }}">
                            <input type="hidden" name="calories_burned" value="0">
                            <div class="row g-2">
                                <div class="col-8">
                                    <input type="number" name="weight" id="weightInput" class="form-control form-control-sm" 
                                           placeholder="Enter weight (kg)" step="0.1" min="30" max="200" required>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                        <i class="fas fa-plus me-1"></i>Log
                                    </button>
                                </div>
                            </div>
                        </form>
                        <small class="text-muted">Log your weight to track progress</small>
                    </div>
                    
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2" id="weightLabels">
                            <span class="text-muted">Starting: <span id="startingWeight">75</span>kg</span>
                            <span class="text-muted">Goal: <span id="goalWeight">70</span>kg</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" id="weightProgressBar" style="width: 0%"></div>
                        </div>
                        <div class="text-center mt-2">
                            <small class="text-muted" id="weightProgressText">Current: --kg (0kg lost)</small>
                        </div>
                    </div>
                    
                    <!-- Weight Chart -->
                    <div class="d-flex justify-content-between align-items-end" id="weightChart" style="height: 150px;">
                        <!-- Chart will be populated dynamically -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-7 d-flex flex-column gap-4">
            <!-- Recent Activities -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">Recent Activities</h4>
                        <!-- <button class="btn btn-sm btn-outline-secondary rounded-pill">
                            <i class="fas fa-filter me-1"></i>Filter
                        </button> -->
                    </div>
                    
                    <div id="activitiesList" class="space-y-3">
                        <!-- Today -->
                        <div class="border-start border-4 border-primary ps-3 py-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold">🏃 Running</div>
                                    <div class="text-muted small">Today, 7:00 AM</div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary">385 kcal</div>
                                    <div class="text-muted small">35 min</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-start border-4 border-success ps-3 py-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold">🏋️ Gym Workout</div>
                                    <div class="text-muted small">Yesterday, 6:30 PM</div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-success">420 kcal</div>
                                    <div class="text-muted small">45 min</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-start border-4 border-info ps-3 py-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold">🧘 Yoga</div>
                                    <div class="text-muted small">2 days ago, 7:00 AM</div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-info">180 kcal</div>
                                    <div class="text-muted small">60 min</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-start border-4 border-warning ps-3 py-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold">🚴 Cycling</div>
                                    <div class="text-muted small">3 days ago, 5:30 PM</div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-warning">520 kcal</div>
                                    <div class="text-muted small">40 min</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weekly Activity -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Weekly Activity</h4>
                    
                    <div class="mb-4">
                        <div class="row g-3 text-center">
                            <div class="col-4">
                                <div class="fw-bold text-primary">5</div>
                                <div class="text-muted small">Workouts</div>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-success">2,847</div>
                                <div class="text-muted small">Calories</div>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold text-info">4.5h</div>
                                <div class="text-muted small">Duration</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Activity breakdown -->
                    <div class="space-y-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>🏃 Running</span>
                            <div class="d-flex align-items-center">
                                <div class="progress me-2" style="width: 100px; height: 6px;">
                                    <div class="progress-bar bg-primary" style="width: 40%"></div>
                                </div>
                                <small class="text-muted">40%</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>🏋️ Gym</span>
                            <div class="d-flex align-items-center">
                                <div class="progress me-2" style="width: 100px; height: 6px;">
                                    <div class="progress-bar bg-success" style="width: 30%"></div>
                                </div>
                                <small class="text-muted">30%</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>🧘 Yoga</span>
                            <div class="d-flex align-items-center">
                                <div class="progress me-2" style="width: 100px; height: 6px;">
                                    <div class="progress-bar bg-info" style="width: 20%"></div>
                                </div>
                                <small class="text-muted">20%</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>🚴 Other</span>
                            <div class="d-flex align-items-center">
                                <div class="progress me-2" style="width: 100px; height: 6px;">
                                    <div class="progress-bar bg-warning" style="width: 10%"></div>
                                </div>
                                <small class="text-muted">10%</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.space-y-3 > * + * {
    margin-top: 1rem;
}
.space-y-2 > * + * {
    margin-top: 0.5rem;
}
</style>

@section('scripts')
<script>
    // Calorie calculation
    const metValues = {
        'running': 11.0,
        'cycling': 8.0,
        'swimming': 10.0,
        'gym': 6.0,
        'yoga': 3.0,
        'walking': 3.5,
        'hiit': 12.0,
        'sports': 7.0
    };

    // Initialize data from localStorage
    function initializeData() {
        if (!localStorage.getItem('fitnessActivities')) {
            localStorage.setItem('fitnessActivities', JSON.stringify([]));
        }
        if (!localStorage.getItem('fitnessWeight')) {
            localStorage.setItem('fitnessWeight', JSON.stringify({
                starting: 75,
                current: 71.2,
                goal: 70,
                history: [
                    { week: 1, weight: 75 },
                    { week: 2, weight: 74.2 },
                    { week: 3, weight: 73.5 },
                    { week: 4, weight: 72.8 },
                    { week: 5, weight: 71.2 }
                ]
            }));
        }
    }

    function updateCalories() {
        const activityType = document.getElementById('activityType').value;
        const duration = parseFloat(document.getElementById('duration').value) || 0;
        const bodyWeight = parseFloat(document.getElementById('bodyWeight').value) || 70;
        
        let calories = 0;
        if (activityType && metValues[activityType]) {
            calories = Math.round(metValues[activityType] * bodyWeight * (duration / 60));
        }
        
        document.getElementById('estimatedCalories').textContent = calories + ' kcal';
    }

    function saveActivity(activity) {
        const activities = JSON.parse(localStorage.getItem('fitnessActivities') || '[]');
        activities.unshift(activity);
        localStorage.setItem('fitnessActivities', JSON.stringify(activities));
    }

    function loadActivities() {
        const activities = JSON.parse(localStorage.getItem('fitnessActivities') || '[]');
        const activitiesList = document.getElementById('activitiesList');
        
        // Clear existing activities except the default ones
        const defaultActivities = activitiesList.children.length;
        for (let i = activitiesList.children.length - 1; i >= 4; i--) {
            activitiesList.removeChild(activitiesList.children[i]);
        }
        
        // Add saved activities
        activities.forEach(activity => {
            const activityDiv = document.createElement('div');
            activityDiv.className = `border-start border-4 border-${activity.color} ps-3 py-2`;
            activityDiv.innerHTML = `
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-semibold">${activity.icon} ${activity.name}</div>
                        <div class="text-muted small">${activity.time}</div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-${activity.color}">${activity.calories}</div>
                        <div class="text-muted small">${activity.duration} min</div>
                    </div>
                </div>
            `;
            activitiesList.insertBefore(activityDiv, activitiesList.children[4]);
        });
    }

    function updateWeeklyStats() {
        const activities = JSON.parse(localStorage.getItem('fitnessActivities') || '[]');
        const oneWeekAgo = new Date();
        oneWeekAgo.setDate(oneWeekAgo.getDate() - 7);
        
        const weekActivities = activities.filter(activity => {
            const activityDate = new Date(activity.timestamp);
            return activityDate >= oneWeekAgo;
        });
        
        const totalCalories = weekActivities.reduce((sum, activity) => {
            return sum + parseInt(activity.calories);
        }, 0);
        
        const totalDuration = weekActivities.reduce((sum, activity) => {
            return sum + parseInt(activity.duration);
        }, 0);
        
        // Update weekly stats display
        const weeklyStats = document.querySelector('.col-md-6:nth-child(2) .row');
        if (weeklyStats) {
            weeklyStats.innerHTML = `
                <div class="col-4">
                    <div class="fw-bold text-primary">${weekActivities.length}</div>
                    <div class="text-muted small">Workouts</div>
                </div>
                <div class="col-4">
                    <div class="fw-bold text-success">${totalCalories.toLocaleString()}</div>
                    <div class="text-muted small">Calories</div>
                </div>
                <div class="col-4">
                    <div class="fw-bold text-info">${(totalDuration / 60).toFixed(1)}h</div>
                    <div class="text-muted small">Duration</div>
                </div>
            `;
        }
        
        // Update activity breakdown
        updateActivityBreakdown(weekActivities);
    }

    function updateActivityBreakdown(activities) {
        const activityCounts = {};
        activities.forEach(activity => {
            const name = activity.name;
            activityCounts[name] = (activityCounts[name] || 0) + 1;
        });
        
        const total = activities.length;
        const breakdownDiv = document.querySelector('.space-y-2');
        if (breakdownDiv && total > 0) {
            const activityIcons = {
                'Running': '🏃',
                'Cycling': '🚴',
                'Swimming': '🏊',
                'Gym Workout': '🏋️',
                'Yoga': '🧘',
                'Walking': '🚶',
                'HIIT': '💪',
                'Sports': '⚽'
            };
            
            let breakdownHTML = '';
            for (const [name, count] of Object.entries(activityCounts)) {
                const percentage = Math.round((count / total) * 100);
                const icon = activityIcons[name] || '🏃';
                const colors = ['primary', 'success', 'info', 'warning', 'danger'];
                const color = colors[Object.keys(activityCounts).indexOf(name) % colors.length];
                
                breakdownHTML += `
                    <div class="d-flex justify-content-between align-items-center">
                        <span>${icon} ${name}</span>
                        <div class="d-flex align-items-center">
                            <div class="progress me-2" style="width: 100px; height: 6px;">
                                <div class="progress-bar bg-${color}" style="width: ${percentage}%"></div>
                            </div>
                            <small class="text-muted">${percentage}%</small>
                        </div>
                    </div>
                `;
            }
            breakdownDiv.innerHTML = breakdownHTML;
        }
    }

    function logWeight() {
        const weightInput = document.getElementById('weightInput');
        const weight = parseFloat(weightInput.value);
        
        if (!weight || weight < 30 || weight > 200) {
            showNotification('Please enter a valid weight (30-200 kg)', 'warning');
            return;
        }
        
        const weightData = JSON.parse(localStorage.getItem('fitnessWeight') || '{}');
        
        // Initialize if first time
        if (!weightData.starting) {
            weightData.starting = weight;
            weightData.goal = weight - 5; // Default goal is 5kg less
            weightData.history = [];
        }
        
        // Add to history
        const weekNumber = weightData.history.length + 1;
        weightData.history.push({
            week: weekNumber,
            weight: weight,
            date: new Date().toISOString()
        });
        
        // Update current weight
        weightData.current = weight;
        
        // Save to localStorage
        localStorage.setItem('fitnessWeight', JSON.stringify(weightData));
        
        // Update displays
        updateWeightProgress();
        updateWeightStats(weightData);
        
        // Clear input
        weightInput.value = '';
        
        showNotification('Weight logged successfully! 📊', 'success');
    }

    function updateWeightProgress() {
        const weightData = JSON.parse(localStorage.getItem('fitnessWeight') || '{}');
        
        if (!weightData.current) {
            // No weight data yet
            document.getElementById('startingWeight').textContent = '--';
            document.getElementById('goalWeight').textContent = '--';
            document.getElementById('weightProgressBar').style.width = '0%';
            document.getElementById('weightProgressText').textContent = 'Current: --kg (0kg lost)';
            document.getElementById('weightChart').innerHTML = '<div class="text-center text-muted w-100">No weight data yet. Log your weight to see progress!</div>';
            return;
        }
        
        // Update weight display in stats
        const currentWeightElement = document.querySelector('.col-md-3:nth-child(2) h2');
        if (currentWeightElement) {
            currentWeightElement.textContent = weightData.current.toFixed(1) + ' kg';
        }
        
        // Update weight labels
        document.getElementById('startingWeight').textContent = weightData.starting.toFixed(1);
        document.getElementById('goalWeight').textContent = weightData.goal.toFixed(1);
        
        // Calculate and update progress bar
        const totalToLose = weightData.starting - weightData.goal;
        const lostSoFar = weightData.starting - weightData.current;
        const progressPercent = totalToLose > 0 ? Math.min(100, (lostSoFar / totalToLose) * 100) : 0;
        
        const progressBar = document.getElementById('weightProgressBar');
        if (progressBar) {
            progressBar.style.width = progressPercent + '%';
        }
        
        // Update progress text
        const progressText = document.getElementById('weightProgressText');
        if (progressText) {
            const lost = lostSoFar.toFixed(1);
            const remaining = Math.max(0, totalToLose - lostSoFar).toFixed(1);
            progressText.textContent = `Current: ${weightData.current.toFixed(1)}kg (${lost}kg lost, ${remaining}kg to go)`;
        }
        
        // Update weight chart
        updateWeightChart(weightData.history || []);
    }

    function updateWeightStats(weightData) {
        // Update workouts stat based on weight entries
        const workoutsElement = document.querySelector('.col-md-3:nth-child(3) h2');
        if (workoutsElement && weightData.history) {
            workoutsElement.textContent = weightData.history.length;
        }
    }

    function updateWeightChart(history) {
        const chartContainer = document.getElementById('weightChart');
        if (!chartContainer) return;
        
        if (history.length === 0) {
            chartContainer.innerHTML = '<div class="text-center text-muted w-100">No weight data yet. Log your weight to see progress!</div>';
            return;
        }
        
        const maxWeight = Math.max(...history.map(h => h.weight));
        const minWeight = Math.min(...history.map(h => h.weight));
        const range = maxWeight - minWeight || 1;
        
        let chartHTML = '';
        history.forEach((entry, index) => {
            const height = ((maxWeight - entry.weight) / range) * 100 + 50;
            const isCurrent = index === history.length - 1;
            const color = isCurrent ? '#28a745' : '#e9ecef';
            
            chartHTML += `
                <div class="text-center">
                    <div style="width: 30px; height: ${height}px; background: ${color}; border-radius: 3px; position: relative;" title="${entry.weight.toFixed(1)}kg">
                        ${isCurrent ? '<div style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 10px; font-weight: bold;">' + entry.weight.toFixed(1) + 'kg</div>' : ''}
                    </div>
                    <small class="d-block mt-1">W${entry.week}</small>
                </div>
            `;
        });
        
        chartContainer.innerHTML = chartHTML;
    }

    // Activity logging
    document.getElementById('activityForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const activityType = document.getElementById('activityType').value;
        const duration = document.getElementById('duration').value;
        const calories = document.getElementById('estimatedCalories').textContent;
        
        if (!activityType) {
            alert('Please select an activity');
            return;
        }
        
        // Activity icons and names
        const activityInfo = {
            'running': { icon: '🏃', name: 'Running' },
            'cycling': { icon: '🚴', name: 'Cycling' },
            'swimming': { icon: '🏊', name: 'Swimming' },
            'gym': { icon: '🏋️', name: 'Gym Workout' },
            'yoga': { icon: '🧘', name: 'Yoga' },
            'walking': { icon: '🚶', name: 'Walking' },
            'hiit': { icon: '💪', name: 'HIIT' },
            'sports': { icon: '⚽', name: 'Sports' }
        };
        
        const colors = ['primary', 'success', 'info', 'warning', 'danger'];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];
        
        // Create activity object
        const activity = {
            type: activityType,
            name: activityInfo[activityType].name,
            icon: activityInfo[activityType].icon,
            duration: duration,
            calories: calories,
            color: randomColor,
            timestamp: new Date().toISOString(),
            time: 'Just now'
        };
        
        // Save to localStorage
        saveActivity(activity);
        
        // Add to display
        const activitiesList = document.getElementById('activitiesList');
        const newActivity = document.createElement('div');
        newActivity.className = `border-start border-4 border-${randomColor} ps-3 py-2`;
        newActivity.innerHTML = `
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="fw-semibold">${activityInfo[activityType].icon} ${activityInfo[activityType].name}</div>
                    <div class="text-muted small">Just now</div>
                </div>
                <div class="text-end">
                    <div class="fw-bold text-${randomColor}">${calories}</div>
                    <div class="text-muted small">${duration} min</div>
                </div>
            </div>
        `;
        
        activitiesList.insertBefore(newActivity, activitiesList.firstChild);
        
        // Update all stats
        updateWeeklyStats();
        
        // Update calories burned stat
        const activities = JSON.parse(localStorage.getItem('fitnessActivities') || '[]');
        const oneWeekAgo = new Date();
        oneWeekAgo.setDate(oneWeekAgo.getDate() - 7);
        const weekActivities = activities.filter(activity => {
            const activityDate = new Date(activity.timestamp);
            return activityDate >= oneWeekAgo;
        });
        const totalCalories = weekActivities.reduce((sum, activity) => {
            return sum + parseInt(activity.calories);
        }, 0);
        
        const caloriesElement = document.querySelector('.col-md-3:first-child h2');
        if (caloriesElement) {
            caloriesElement.textContent = totalCalories.toLocaleString();
        }
        
        // Show success message
        showNotification('Activity logged successfully! 💪');
        
        // Reset form
        document.getElementById('activityForm').reset();
        document.getElementById('duration').value = '30';
        document.getElementById('bodyWeight').value = '70';
        updateCalories();
    });

    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'alert alert-success alert-dismissible fade show position-fixed';
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initializeData();
        updateCalories();
        loadActivities();
        updateWeeklyStats();
        updateWeightProgress();
    });
</script>
@endsection
