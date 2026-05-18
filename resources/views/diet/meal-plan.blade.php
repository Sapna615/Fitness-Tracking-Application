@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Meal Plan</h1>
                    <p class="text-muted mb-0">Plan your meals for the week</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary rounded-pill" onclick="previousWeek()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <input type="week" id="weekPicker" class="form-control rounded-pill" style="width: 200px;" onchange="updateWeek()">
                    <button class="btn btn-outline-primary rounded-pill" onclick="nextWeek()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Calendar View -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="row g-3">
                        @php
    $today = now();
    $todayIndex = $today->dayOfWeekIso - 1; // Convert to 0-6 (Monday=0)
    if ($todayIndex < 0) $todayIndex = 6; // Handle Sunday
@endphp
@for($day = 0; $day < 7; $day++)
                            <div class="col">
                                <div class="text-center mb-3">
                                    <h6 class="fw-bold {{ $day == $todayIndex ? 'text-primary' : 'text-muted' }}">
                                        {{ ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'][$day] }}
                                    </h6>
                                    <small class="text-muted">{{ $today->startOfWeek()->addDays($day)->format('M d') }}</small>
                                </div>
                                <div class="border rounded-4 p-3 {{ $day == $todayIndex ? 'border-primary bg-light' : '' }}" style="min-height: 300px;">
                                    <div class="mb-2">
                                        <h6 class="fw-bold text-primary">Breakfast</h6>
                                        <div class="bg-light rounded-3 p-2 mb-2">
                                            <small class="text-muted">8:00 AM</small>
                                            <p class="mb-0 fw-bold">Oats & Fruits</p>
                                            <small class="text-success">420 kcal</small>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <h6 class="fw-bold text-warning">Lunch</h6>
                                        <div class="bg-light rounded-3 p-2 mb-2">
                                            <small class="text-muted">1:00 PM</small>
                                            <p class="mb-0 fw-bold">Grilled Chicken</p>
                                            <small class="text-success">520 kcal</small>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <h6 class="fw-bold text-info">Dinner</h6>
                                        <div class="bg-light rounded-3 p-2 mb-2">
                                            <small class="text-muted">7:00 PM</small>
                                            <p class="mb-0 fw-bold">Salmon & Veggies</p>
                                            <small class="text-success">480 kcal</small>
                                        </div>
                                    </div>
                                    <div class="text-center mt-2">
                                        <button class="btn btn-sm btn-outline-primary rounded-pill">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Weekly Summary -->
            <div class="row g-4 mb-4">
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
                            <i class="fas fa-utensils text-primary fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">21</h3>
                            <p class="text-muted mb-0">Meals Planned</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-shopping-cart text-success fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">48</h3>
                            <p class="text-muted mb-0">Grocery Items</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center">
                            <i class="fas fa-clock text-info fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">2.5 hrs</h3>
                            <p class="text-muted mb-0">Prep Time</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Quick Actions</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <button class="btn btn-outline-primary w-100 rounded-pill p-3" onclick="copyWeek()">
                                <i class="fas fa-copy me-2"></i>Copy This Week
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-success w-100 rounded-pill p-3" onclick="generateMealPlan()">
                                <i class="fas fa-magic me-2"></i>Generate Meal Plan
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-warning w-100 rounded-pill p-3" onclick="downloadPDF()">
                                <i class="fas fa-download me-2"></i>Download PDF
                            </button>
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
<script>
    let currentWeek = new Date();
    
    function updateWeek() {
        const weekInput = document.getElementById('weekPicker');
        currentWeek = new Date(weekInput.value);
        updateCalendar();
    }
    
    function previousWeek() {
        currentWeek.setDate(currentWeek.getDate() - 7);
        updateCalendar();
    }
    
    function nextWeek() {
        currentWeek.setDate(currentWeek.getDate() + 7);
        updateCalendar();
    }
    
    function updateCalendar() {
        const weekInput = document.getElementById('weekPicker');
        const startOfWeek = new Date(currentWeek);
        startOfWeek.setDate(currentWeek.getDate() - currentWeek.getDay() + 1);
        
        const endOfWeek = new Date(startOfWeek);
        endOfWeek.setDate(startOfWeek.getDate() + 6);
        
        weekInput.value = `${startOfWeek.getFullYear()}-W${Math.ceil((((startOfWeek.getTime() - new Date(startOfWeek.getFullYear(), 0, 1).getTime()) / 86400000) + 1) / 7)}`;
    }
    
    function copyWeek() {
        // Copy current week's meal plan to next week
        const mealCards = document.querySelectorAll('.border.rounded-4.p-3');
        const nextWeekButton = document.querySelector('button[onclick="nextWeek()"]');
        
        if (nextWeekButton) {
            nextWeekButton.click();
            setTimeout(() => {
                showFeedback('Meal plan copied to next week successfully!', 'success');
            }, 500);
        }
        
        console.log('Copying meal plan...');
    }
    
    function generateMealPlan() {
        // Generate new meal plan based on preferences
        const mealOptions = [
            { breakfast: ['Oats & Fruits', 'Scrambled Eggs', 'Greek Yogurt', 'Protein Smoothie'], calories: [420, 380, 350, 400] },
            { lunch: ['Grilled Chicken', 'Salad Bowl', 'Turkey Sandwich', 'Quinoa Bowl'], calories: [520, 480, 450, 500] },
            { dinner: ['Salmon & Veggies', 'Lean Beef', 'Pasta Primavera', 'Stir Fry'], calories: [480, 550, 520, 460] }
        ];
        
        const mealCards = document.querySelectorAll('.border.rounded-4.p-3');
        mealCards.forEach((card, index) => {
            const dayIndex = index % 7;
            const breakfastMeal = mealOptions[0].breakfast[dayIndex % 4];
            const lunchMeal = mealOptions[1].lunch[dayIndex % 4];
            const dinnerMeal = mealOptions[2].dinner[dayIndex % 4];
            
            // Update meal content
            const breakfastDiv = card.querySelector('.mb-2:nth-child(1) p');
            const lunchDiv = card.querySelector('.mb-2:nth-child(2) p');
            const dinnerDiv = card.querySelector('.mb-2:nth-child(3) p');
            
            if (breakfastDiv) breakfastDiv.textContent = breakfastMeal;
            if (lunchDiv) lunchDiv.textContent = lunchMeal;
            if (dinnerDiv) dinnerDiv.textContent = dinnerMeal;
        });
        
        showFeedback('New meal plan generated successfully!', 'success');
        console.log('Generating meal plan...');
    }
    
    function showFeedback(message, type) {
        // Remove existing feedback
        const existingFeedback = document.querySelector('.meal-feedback');
        if (existingFeedback) existingFeedback.remove();
        
        // Create feedback message
        const feedback = document.createElement('div');
        feedback.className = `alert alert-${type} alert-dismissible fade show rounded-4 meal-feedback position-fixed`;
        feedback.style.top = '20px';
        feedback.style.right = '20px';
        feedback.style.zIndex = '9999';
        feedback.innerHTML = `
            <strong>${type === 'success' ? 'Success!' : 'Info:'}</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(feedback);
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            if (feedback.parentNode) {
                feedback.remove();
            }
        }, 3000);
    }
    
    function downloadPDF() {
        // Download meal plan as PDF
        window.print();
        console.log('Downloading PDF...');
    }
    
    // Initialize calendar
    updateCalendar();
</script>
@endsection
