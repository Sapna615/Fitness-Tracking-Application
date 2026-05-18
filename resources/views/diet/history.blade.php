@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Diet History</h1>
                    <p class="text-muted mb-0">Track your nutrition journey over time</p>
                </div>
                <div class="d-flex gap-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-calendar me-2"></i>Last 30 Days
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="filterByDateRange('Last 7 Days')">Last 7 Days</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterByDateRange('Last 30 Days')">Last 30 Days</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterByDateRange('Last 90 Days')">Last 90 Days</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterByDateRange('Last 6 Months')">Last 6 Months</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filterByDateRange('Last Year')">Last Year</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick="filterByDateRange('Custom Range')">Custom Range</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-primary rounded-pill">
                        <i class="fas fa-download me-2"></i>Export Data
                    </button>
                </div>
            </div>

            <!-- Summary Stats -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-fire text-warning fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">{{ number_format($totalCalories) }}</h3>
                            <p class="text-muted mb-0">Total Calories</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line text-success fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">{{ number_format($dailyAverage) }}</h3>
                            <p class="text-muted mb-0">Daily Average</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-trophy text-primary fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">{{ count($formattedHistory) }}</h3>
                            <p class="text-muted mb-0">Days Logged</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-weight text-info fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">{{ $weightChange > 0 ? '+' : '' }}{{ $weightChange }} kg</h3>
                            <p class="text-muted mb-0">Weight Change</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Chart -->
            <div class="card border-0 shadow-sm rounded-4 mb-5">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Calorie Intake Trend</h5>
                </div>
                <div class="card-body p-4">
                    <div style="height: 300px;">
                        <canvas id="calorieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Detailed History Table -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-black mb-0">Daily History</h5>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control rounded-pill" placeholder="Search history..." style="width: 200px;">
                            <select class="form-select rounded-pill" onchange="filterByMealType(this.value)">
                                <option>All Meals</option>
                                <option>Breakfast Only</option>
                                <option>Lunch Only</option>
                                <option>Dinner Only</option>
                                <option>Snacks Only</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Meals</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                    <th>Carbs</th>
                                    <th>Fats</th>
                                    <th>Water</th>
                                    <th>Adherence</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($formattedHistory as $day)
                                <tr>
                                    <td>{{ $day['date'] }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            @foreach($day['meals'] as $mealTag)
                                                <span class="badge bg-light text-dark rounded-pill">{{ $mealTag }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ number_format($day['calories']) }}</td>
                                    <td>{{ $day['protein'] }}g</td>
                                    <td>{{ $day['carbs'] }}g</td>
                                    <td>{{ $day['fats'] }}g</td>
                                    <td>{{ $day['water'] }}L</td>
                                    <td>
                                        <span class="badge bg-{{ $day['adherence'] >= 85 ? 'success' : ($day['adherence'] >= 70 ? 'warning' : 'danger') }} rounded-pill">
                                            {{ $day['adherence'] }}%
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('diet.index', ['date' => $day['raw_date']]) }}" class="btn btn-sm btn-outline-primary rounded-pill">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">No history records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                    </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Daily Diet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="text" class="form-control" id="editDate" readonly>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Breakfast (calories)</label>
                            <input type="number" class="form-control" id="editBreakfast" placeholder="350">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lunch (calories)</label>
                            <input type="number" class="form-control" id="editLunch" placeholder="450">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dinner (calories)</label>
                            <input type="number" class="form-control" id="editDinner" placeholder="550">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Snacks (calories)</label>
                            <input type="number" class="form-control" id="editSnacks" placeholder="200">
                        </div>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Protein (g)</label>
                            <input type="number" class="form-control" id="editProtein" placeholder="125">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Carbs (g)</label>
                            <input type="number" class="form-control" id="editCarbs" placeholder="180">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Fats (g)</label>
                            <input type="number" class="form-control" id="editFats" placeholder="45">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Water (L)</label>
                            <input type="number" step="0.1" class="form-control" id="editWater" placeholder="2.5">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveEdit()">Save Changes</button>
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
    const ctx = document.getElementById('calorieChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_reverse(array_column($formattedHistory, 'date'))) !!},
            datasets: [{
                label: 'Daily Calories',
                data: {!! json_encode(array_reverse(array_column($formattedHistory, 'calories'))) !!},
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
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e3a8a',
                    titleFont: { size: 14 },
                    bodyFont: { size: 12 },
                    padding: 12
                }
            }
        }
    });
    
    // Diet History Data
    const dietData = [
        { date: 'May 24, 2026', meals: ['Breakfast', 'Lunch', 'Dinner', 'Snack'], calories: 1680, protein: 126, carbs: 189, fats: 47, water: 2.5, adherence: 84, breakfast: 350, lunch: 450, dinner: 550, snacks: 200 },
        { date: 'May 23, 2026', meals: ['Breakfast', 'Lunch', 'Dinner'], calories: 1720, protein: 128, carbs: 195, fats: 48, water: 2.2, adherence: 86, breakfast: 380, lunch: 470, dinner: 550, snacks: 0 },
        { date: 'May 22, 2026', meals: ['Breakfast', 'Lunch', 'Dinner', 'Snack'], calories: 1650, protein: 124, carbs: 182, fats: 46, water: 2.8, adherence: 82, breakfast: 320, lunch: 430, dinner: 550, snacks: 200 },
        { date: 'May 21, 2026', meals: ['Breakfast', 'Lunch', 'Dinner'], calories: 1750, protein: 130, carbs: 198, fats: 49, water: 2.1, adherence: 88, breakfast: 400, lunch: 480, dinner: 550, snacks: 0 },
        { date: 'May 20, 2026', meals: ['Breakfast', 'Lunch', 'Dinner', 'Snack'], calories: 1580, protein: 121, carbs: 178, fats: 44, water: 2.0, adherence: 79, breakfast: 330, lunch: 420, dinner: 530, snacks: 200 }
    ];

    let currentEditDate = null;

    // Diet History Functions
    function viewDayDetails(date) {
        const data = dietData.find(d => d.date === date);
        if (data) {
            alert(`View Details for ${date}:\n\nBreakfast: ${data.breakfast} cal\nLunch: ${data.lunch} cal\nDinner: ${data.dinner} cal${data.snacks > 0 ? `\nSnack: ${data.snacks} cal` : ''}\n\nTotal: ${data.calories} calories\nProtein: ${data.protein}g | Carbs: ${data.carbs}g | Fats: ${data.fats}g\nWater: ${data.water}L\nAdherence: ${data.adherence}%`);
        }
    }
    
    function editDayDetails(date) {
        currentEditDate = date;
        const data = dietData.find(d => d.date === date);
        if (data) {
            // Populate the edit form
            document.getElementById('editDate').value = date;
            document.getElementById('editBreakfast').value = data.breakfast;
            document.getElementById('editLunch').value = data.lunch;
            document.getElementById('editDinner').value = data.dinner;
            document.getElementById('editSnacks').value = data.snacks;
            document.getElementById('editProtein').value = data.protein;
            document.getElementById('editCarbs').value = data.carbs;
            document.getElementById('editFats').value = data.fats;
            document.getElementById('editWater').value = data.water;
            
            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }
    }
    
    function saveEdit() {
        if (currentEditDate) {
            const data = dietData.find(d => d.date === currentEditDate);
            if (data) {
                // Update the data
                data.breakfast = parseInt(document.getElementById('editBreakfast').value);
                data.lunch = parseInt(document.getElementById('editLunch').value);
                data.dinner = parseInt(document.getElementById('editDinner').value);
                data.snacks = parseInt(document.getElementById('editSnacks').value);
                data.protein = parseInt(document.getElementById('editProtein').value);
                data.carbs = parseInt(document.getElementById('editCarbs').value);
                data.fats = parseInt(document.getElementById('editFats').value);
                data.water = parseFloat(document.getElementById('editWater').value);
                data.calories = data.breakfast + data.lunch + data.dinner + data.snacks;
                
                // Update meals array
                data.meals = [];
                if (data.breakfast > 0) data.meals.push('Breakfast');
                if (data.lunch > 0) data.meals.push('Lunch');
                if (data.dinner > 0) data.meals.push('Dinner');
                if (data.snacks > 0) data.meals.push('Snack');
                
                // Update the table
                updateTable(dietData);
                
                // Close modal
                bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                
                // Show success message
                showSuccessMessage(`Changes saved for ${currentEditDate}`);
            }
        }
    }
    
    // Filter functions
    function filterByMealType(mealType) {
        let filteredData = dietData;
        
        if (mealType !== 'All Meals') {
            filteredData = dietData.filter(d => {
                switch(mealType) {
                    case 'Breakfast Only': return d.breakfast > 0;
                    case 'Lunch Only': return d.lunch > 0;
                    case 'Dinner Only': return d.dinner > 0;
                    case 'Snacks Only': return d.snacks > 0;
                    default: return true;
                }
            });
        }
        
        updateTable(filteredData);
        showFilterFeedback(`Meal Type: ${mealType}`);
    }
    
    function filterByDateRange(range) {
        let filteredData = dietData;
        
        // For demo, show different subsets based on range
        switch(range) {
            case 'Last 7 Days':
                filteredData = dietData.slice(0, 3); // Show 3 most recent
                break;
            case 'Last 30 Days':
                filteredData = dietData.slice(0, 4); // Show 4 most recent
                break;
            case 'Last 90 Days':
                filteredData = dietData; // Show all
                break;
            default:
                filteredData = dietData;
        }
        
        updateTable(filteredData);
        showFilterFeedback(`Date Range: ${range}`);
    }
    
    function updateTable(data) {
        const tbody = document.querySelector('tbody');
        if (tbody) {
            tbody.innerHTML = '';
            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.date}</td>
                    <td>
                        <div class="d-flex gap-1">
                            ${item.meals.map(meal => `<span class="badge bg-light text-dark rounded-pill">${meal}</span>`).join('')}
                        </div>
                    </td>
                    <td>${item.calories}</td>
                    <td>${item.protein}g</td>
                    <td>${item.carbs}g</td>
                    <td>${item.fats}g</td>
                    <td>${item.water}L</td>
                    <td><span class="badge ${item.adherence >= 85 ? 'bg-success' : 'bg-warning'} rounded-pill">${item.adherence}%</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="viewDayDetails('${item.date}')">View</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="editDayDetails('${item.date}')">Edit</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }
    }
    
    function showFilterFeedback(filterType) {
        // Remove any existing feedback
        const existingFeedback = document.querySelector('.filter-feedback');
        if (existingFeedback) {
            existingFeedback.remove();
        }
        
        // Create feedback message
        const feedback = document.createElement('div');
        feedback.className = 'alert alert-info alert-dismissible fade show rounded-4 filter-feedback';
        feedback.innerHTML = `
            <strong>Filter Applied:</strong> ${filterType}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Insert after the header
        const header = document.querySelector('.d-flex.justify-content-between.align-items-center');
        if (header) {
            header.parentNode.insertBefore(feedback, header.nextSibling);
        }
        
        // Auto-remove after 2 seconds
        setTimeout(() => {
            if (feedback.parentNode) {
                feedback.remove();
            }
        }, 2000);
    }
    
    function showSuccessMessage(message) {
        // Remove any existing feedback
        const existingFeedback = document.querySelector('.success-feedback');
        if (existingFeedback) {
            existingFeedback.remove();
        }
        
        // Create feedback message
        const feedback = document.createElement('div');
        feedback.className = 'alert alert-success alert-dismissible fade show rounded-4 success-feedback';
        feedback.innerHTML = `
            <strong>Success!</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Insert after the header
        const header = document.querySelector('.d-flex.justify-content-between.align-items-center');
        if (header) {
            header.parentNode.insertBefore(feedback, header.nextSibling);
        }
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            if (feedback.parentNode) {
                feedback.remove();
            }
        }, 3000);
    }
</script>
@endsection
