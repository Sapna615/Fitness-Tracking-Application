@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Recipes</h1>
                    <p class="text-muted mb-0">Discover healthy and delicious recipes</p>
                </div>
                <div class="d-flex gap-2">
                    <input type="text" id="searchInput" class="form-control rounded-pill" placeholder="Search recipes..." style="width: 250px;" onkeyup="filterRecipes()">
                    <select id="categoryFilter" class="form-select rounded-pill" onchange="filterRecipes()">
                        <option value="all">All Categories</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                        <option value="snacks">Snacks</option>
                        <option value="smoothies">Smoothies</option>
                    </select>
                </div>
            </div>

            <!-- Featured Recipes -->
            <div class="mb-5">
                <h3 class="fw-black mb-4">Featured Recipes</h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 recipe-card" data-category="dinner">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNvNevUJmAidodXespB3mpILIRMIXcPEFwFA&s" class="card-img-top rounded-top-4" alt="Recipe">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold">Protein Power Bowl</h5>
                                    <div class="text-end">
                                        <span class="badge bg-success rounded-pill">High-Protein</span>
                                        <div class="text-warning small">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-3">Quinoa bowl with grilled chicken, avocado, and mixed vegetables. Perfect for post-workout recovery.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted"><i class="fas fa-clock me-1"></i>25 min</small>
                                        <small class="text-muted"><i class="fas fa-fire me-1"></i>420 kcal</small>
                                    </div>
                                    <a href="{{ route('diet.recipe.details', 1) }}" class="btn btn-primary rounded-pill btn-sm">View Recipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 recipe-card" data-category="breakfast">
                            <img src="https://www.foodandwine.com/thmb/bs71nnAF0FzdZCgM574hXtixDz8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/green-smooothie-bowl-FT-RECIPE0724-ef2a8082726b486c9b0682bac36ac958.jpeg" class="card-img-top rounded-top-4" alt="Recipe">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold">Green Smoothie Bowl</h5>
                                    <div class="text-end">
                                        <span class="badge bg-success rounded-pill">Vegan</span>
                                        <div class="text-warning small">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-3">Nutrient-packed smoothie bowl with spinach, banana, berries, and chia seeds.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted"><i class="fas fa-clock me-1"></i>10 min</small>
                                        <small class="text-muted"><i class="fas fa-fire me-1"></i>280 kcal</small>
                                    </div>
                                    <a href="{{ route('diet.recipe.details', 2) }}" class="btn btn-primary rounded-pill btn-sm">View Recipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 recipe-card" data-category="dinner">
                            <img src="https://www.heinens.com/content/uploads/2020/07/Mediterranean-Salmon.jpg" class="card-img-top rounded-top-4" alt="Recipe">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold">Mediterranean Salmon</h5>
                                    <div class="text-end">
                                        <span class="badge bg-info rounded-pill">Omega-3</span>
                                        <div class="text-warning small">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-3">Grilled salmon with herbs, roasted vegetables, and quinoa pilaf.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted"><i class="fas fa-clock me-1"></i>35 min</small>
                                        <small class="text-muted"><i class="fas fa-fire me-1"></i>480 kcal</small>
                                    </div>
                                    <a href="{{ route('diet.recipe.details', 3) }}" class="btn btn-primary rounded-pill btn-sm">View Recipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recipe Categories -->
            <div class="mb-5">
                <h3 class="fw-black mb-4">Browse by Category</h3>
                <div class="row g-3">
                    <div class="col-md-2 col-6">
                        <div class="card border-0 shadow-sm rounded-4 text-center hover-lift" onclick="filterByCategory('breakfast')" style="cursor: pointer;">
                            <div class="card-body p-3">
                                <i class="fas fa-coffee text-primary fs-2 mb-2"></i>
                                <h6 class="fw-bold mb-0">Breakfast</h6>
                                <small class="text-muted">4 recipes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card border-0 shadow-sm rounded-4 text-center hover-lift" onclick="filterByCategory('lunch')" style="cursor: pointer;">
                            <div class="card-body p-3">
                                <i class="fas fa-utensils text-success fs-2 mb-2"></i>
                                <h6 class="fw-bold mb-0">Lunch</h6>
                                <small class="text-muted">2 recipes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card border-0 shadow-sm rounded-4 text-center hover-lift" onclick="filterByCategory('dinner')" style="cursor: pointer;">
                            <div class="card-body p-3">
                                <i class="fas fa-moon text-warning fs-2 mb-2"></i>
                                <h6 class="fw-bold mb-0">Dinner</h6>
                                <small class="text-muted">2 recipes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card border-0 shadow-sm rounded-4 text-center hover-lift" onclick="filterByCategory('snacks')" style="cursor: pointer;">
                            <div class="card-body p-3">
                                <i class="fas fa-apple-alt text-danger fs-2 mb-2"></i>
                                <h6 class="fw-bold mb-0">Snacks</h6>
                                <small class="text-muted">2 recipes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card border-0 shadow-sm rounded-4 text-center hover-lift" onclick="filterByCategory('smoothies')" style="cursor: pointer;">
                            <div class="card-body p-3">
                                <i class="fas fa-blender text-info fs-2 mb-2"></i>
                                <h6 class="fw-bold mb-0">Smoothies</h6>
                                <small class="text-muted">3 recipes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card border-0 shadow-sm rounded-4 text-center hover-lift" onclick="filterByCategory('vegan')" style="cursor: pointer;">
                            <div class="card-body p-3">
                                <i class="fas fa-leaf text-success fs-2 mb-2"></i>
                                <h6 class="fw-bold mb-0">Vegan</h6>
                                <small class="text-muted">2 recipes</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Recipes Grid -->
            <div>
                <h3 class="fw-black mb-4">All Recipes</h3>
                <div class="row g-4">
                    @php
                        $categories = ['breakfast', 'lunch', 'dinner', 'snacks', 'smoothies', 'vegan'];
                        $recipeNames = [
                            'Protein Power Bowl', 'Green Smoothie Bowl', 'Mediterranean Salmon', 'Greek Yogurt Parfait',
                            'Grilled Chicken Salad', 'Quinoa Buddha Bowl', 'Turkey Wrap', 'Veggie Stir Fry',
                            'Baked Salmon', 'Lean Beef Steak', 'Pasta Primavera', 'Grilled Veggies',
                        ];
                        $recipeImages = [
                            'https://m1.quebecormedia.com/emp/cl_prod/canadian_living-_-69c3577d555d8ea51bf919a6b399b75cc8f04ce7-_-protein-power-bowls.jpg?impolicy=resize&width=1500&height=1500', 'https://www.foodandwine.com/thmb/bs71nnAF0FzdZCgM574hXtixDz8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/green-smooothie-bowl-FT-RECIPE0724-ef2a8082726b486c9b0682bac36ac958.jpeg', 'https://cuisinewithme.com/wp-content/uploads/2021/04/Mediterranean-salmon-scaled.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjHAGgY2QNfAOP2A-dLVmfrfkaYLCgKijWrg&s',
                            'https://hips.hearstapps.com/hmg-prod/images/grilled-chicken-salad-index-6628169554c88.jpg?crop=0.6667863339915036xw:1xh;center,top&resize=1200:*', 'https://www.bhf.org.uk//-/media/images/information-support/support/healthy-living/recipes-new/sweet-potato-and-quinoa-buddha-bowl_620x400.jpg?rev=c44ec7d9cb6c4d6eb4d4245942ba2712&hash=C9348AA44D4421EA90E08D9180BEAEA9', 'https://cdn.apartmenttherapy.info/image/upload/f_jpg,q_auto:eco,c_fill,g_auto,w_1500,ar_4:3/k%2Farchive%2Fc721c214e1623fc0fdfa4d4bcb4617652f783fb3', 'https://ichef.bbci.co.uk/food/ic/food_16x9_1600/recipes/sachas_stir-fry_17077_16x9.jpg',
                            'https://i2.wp.com/www.downshiftology.com/wp-content/uploads/2023/12/Baked-Salmon-main.jpg', 'https://media.istockphoto.com/id/882548344/photo/grilled-beef-steaks.jpg?s=612x612&w=0&k=20&c=KWhwanO0lIwalPY-CtmY9BDOsJ7QYa-oOnqEa_hKvUM=', 'https://www.southernliving.com/thmb/qa17Gzd7GwxxgZDz-YZiU6OyiSM=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/27722_SUPTskillet_DIGI_43095-a75573c28e5148139e94721f11767a83.jpg', 'https://playswellwithbutter.com/wp-content/uploads/2021/05/Grilled-Vegetable-Platter-with-Chimichurri-8-e1650490755580.jpg'
                        ];
                    @endphp
                    @for($i = 1; $i <= 12; $i++)
                    @php
                        $categoryIndex = ($i - 1) % count($categories);
                        $category = $categories[$categoryIndex];
                        $recipeName = $recipeNames[$i - 1] ?? "Healthy Recipe {$i}";
                        $recipeImage = $recipeImages[$i - 1] ?? "recipe{$i}";
                    @endphp
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 recipe-card" data-category="{{ $category }}">
                            <img src="{{ Str::startsWith($recipeImage, 'http') ? $recipeImage : 'https://picsum.photos/seed/' . $recipeImage . '/400/250.jpg' }}" class="card-img-top rounded-top-4" alt="Recipe">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2">{{ $recipeName }}</h5>
                                <p class="text-muted mb-3 small">Delicious and nutritious recipe perfect for your fitness goals.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted"><i class="fas fa-clock me-1"></i>{{ rand(15, 45) }} min</small>
                                        <small class="text-muted"><i class="fas fa-fire me-1"></i>{{ rand(250, 600) }} kcal</small>
                                    </div>
                                    <button class="btn btn-outline-primary rounded-pill btn-sm" onclick="viewRecipe({{ $i }})">View Recipe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

                    </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
.hover-lift { transition: all 0.3s ease; }
.hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
.recipe-card { transition: all 0.3s ease; }
.recipe-card.hidden { display: none; }
</style>

@section('scripts')
<script>
    function filterRecipes() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const categoryFilter = document.getElementById('categoryFilter').value;
        const recipeCards = document.querySelectorAll('.recipe-card');
        
        recipeCards.forEach(card => {
            const title = card.querySelector('h5').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();
            const category = card.dataset.category || 'all';
            
            const matchesSearch = title.includes(searchInput) || description.includes(searchInput);
            const matchesCategory = categoryFilter === 'all' || category === categoryFilter;
            
            if (matchesSearch && matchesCategory) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    }
    
    function filterByCategory(category) {
        // Update the dropdown filter
        const categoryFilter = document.getElementById('categoryFilter');
        categoryFilter.value = category;
        
        // Apply the filter
        filterRecipes();
        
        // Show feedback
        showFeedback(`Showing ${category} recipes`, 'info');
    }
    
    function viewRecipe(recipeId) {
        // Navigate to recipe details page
        window.location.href = `/diet/recipe/${recipeId}`;
    }
    
    function showFeedback(message, type) {
        // Remove existing feedback
        const existingFeedback = document.querySelector('.recipe-feedback');
        if (existingFeedback) existingFeedback.remove();
        
        // Create feedback message
        const feedback = document.createElement('div');
        feedback.className = `alert alert-${type} alert-dismissible fade show rounded-4 recipe-feedback position-fixed`;
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
    
    function changePage(page) {
        showFeedback(`Loading page ${page}...`, 'info');
        console.log(`Loading page ${page}`);
    }
</script>
@endsection
