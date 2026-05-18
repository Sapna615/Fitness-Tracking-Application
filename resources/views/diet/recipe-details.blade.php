@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Recipe Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Recipe Details</h1>
                    <p class="text-muted mb-0">Complete nutritional information and instructions</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill" onclick="history.back()">
                        <i class="fas fa-arrow-left me-2"></i>Back to Recipes
                    </button>
                </div>
            </div>

            <!-- Recipe Card -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="row">
                    <div class="col-md-6">
                        @php
                            $recipes = [
                                1 => [
                                    'name' => 'Protein Power Bowl',
                                    'category' => 'lunch',
                                    'time' => '25 min',
                                    'calories' => 420,
                                    'protein' => '32g',
                                    'carbs' => '45g',
                                    'fat' => '14g',
                                    'description' => 'A nutrient-dense quinoa bowl packed with high-quality protein and healthy fats.',
                                    'badges' => ['High-Protein', 'Lunch'],
                                    'image' => 'https://m1.quebecormedia.com/emp/cl_prod/canadian_living-_-69c3577d555d8ea51bf919a6b399b75cc8f04ce7-_-protein-power-bowls.jpg?impolicy=resize&width=1500&height=1500',
                                    'ingredients' => [
                                        'Cooked Quinoa' => '1 cup',
                                        'Grilled Chicken Breast' => '150g',
                                        'Avocado' => '1/2 sliced',
                                        'Chickpeas' => '1/2 cup',
                                        'Spinach' => '1 cup fresh',
                                        'Lemon Tahini Dressing' => '2 tbsp',
                                        'Cherry Tomatoes' => '1/2 cup'
                                    ],
                                    'instructions' => [
                                        'Prepare quinoa according to package instructions',
                                        'Grill chicken breast and slice into strips',
                                        'Arrange quinoa and spinach in a large bowl',
                                        'Top with chicken, avocado, tomatoes, and chickpeas',
                                        'Drizzle with lemon tahini dressing',
                                        'Season with salt and pepper'
                                    ]
                                ],
                                2 => [
                                    'name' => 'Green Smoothie Bowl',
                                    'category' => 'smoothies',
                                    'time' => '10 min',
                                    'calories' => 280,
                                    'protein' => '12g',
                                    'carbs' => '48g',
                                    'fat' => '8g',
                                    'description' => 'Refreshing and nutrient-packed bowl with fresh greens and tropical fruits.',
                                    'badges' => ['Vegan', 'Gluten-Free'],
                                    'image' => 'https://www.foodandwine.com/thmb/bs71nnAF0FzdZCgM574hXtixDz8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/green-smooothie-bowl-FT-RECIPE0724-ef2a8082726b486c9b0682bac36ac958.jpeg',
                                    'ingredients' => [
                                        'Frozen Banana' => '1 large',
                                        'Fresh Spinach' => '2 cups',
                                        'Almond Milk' => '1/2 cup',
                                        'Chia Seeds' => '1 tbsp',
                                        'Granola' => '1/4 cup',
                                        'Mixed Berries' => '1/2 cup for topping',
                                        'Hemp Hearts' => '1 tsp'
                                    ],
                                    'instructions' => [
                                        'Blend banana, spinach, and almond milk until thick and creamy',
                                        'Pour into a chilled bowl',
                                        'Top with granola and fresh berries',
                                        'Sprinkle with chia seeds and hemp hearts',
                                        'Enjoy immediately while cold'
                                    ]
                                ],
                                3 => [
                                    'name' => 'Mediterranean Salmon',
                                    'category' => 'dinner',
                                    'time' => '35 min',
                                    'calories' => 480,
                                    'protein' => '38g',
                                    'carbs' => '15g',
                                    'fat' => '24g',
                                    'description' => 'Succulent grilled salmon with heart-healthy omega-3s and roasted vegetables.',
                                    'badges' => ['Omega-3', 'Heart-Healthy'],
                                    'image' => 'https://cuisinewithme.com/wp-content/uploads/2021/04/Mediterranean-salmon-scaled.jpg',
                                    'ingredients' => [
                                        'Salmon Fillet' => '200g',
                                        'Asparagus' => '1 bunch',
                                        'Cherry Tomatoes' => '1 cup',
                                        'Olive Oil' => '2 tbsp',
                                        'Lemon' => '1 sliced',
                                        'Garlic' => '2 cloves minced',
                                        'Fresh Rosemary' => '1 sprig'
                                    ],
                                    'instructions' => [
                                        'Preheat oven to 400°F (200°C)',
                                        'Place salmon and vegetables on a baking sheet',
                                        'Drizzle with olive oil, garlic, and herbs',
                                        'Top salmon with lemon slices',
                                        'Bake for 15-20 minutes until salmon flakes easily',
                                        'Serve warm'
                                    ]
                                ],
                                4 => [
                                    'name' => 'Greek Yogurt Parfait',
                                    'category' => 'breakfast',
                                    'time' => '8 min',
                                    'calories' => 320,
                                    'protein' => '18g',
                                    'carbs' => '38g',
                                    'fat' => '12g',
                                    'description' => 'Creamy Greek yogurt layered with fresh fruits and crunchy granola.',
                                    'badges' => ['High-Protein', 'Quick'],
                                    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjHAGgY2QNfAOP2A-dLVmfrfkaYLCgKijWrg&s',
                                    'ingredients' => [
                                        'Greek Yogurt' => '2 cups plain',
                                        'Mixed Berries' => '1 cup fresh',
                                        'Granola' => '1/2 cup',
                                        'Honey' => '2 tbsp',
                                        'Vanilla Extract' => '1 tsp',
                                        'Nuts' => '1/4 cup chopped almonds'
                                    ],
                                    'instructions' => [
                                        'Layer Greek yogurt in a glass or bowl',
                                        'Add a layer of mixed berries',
                                        'Sprinkle with granola and nuts',
                                        'Drizzle with honey',
                                        'Repeat layers until full',
                                        'Top with fresh berries and serve'
                                    ]
                                ],
                                5 => [
                                    'name' => 'Grilled Chicken Salad',
                                    'category' => 'lunch',
                                    'time' => '25 min',
                                    'calories' => 380,
                                    'protein' => '42g',
                                    'carbs' => '18g',
                                    'fat' => '16g',
                                    'description' => 'Fresh and filling grilled chicken salad with mixed greens and vinaigrette.',
                                    'badges' => ['High-Protein', 'Low-Carb'],
                                    'image' => 'https://hips.hearstapps.com/hmg-prod/images/grilled-chicken-salad-index-6628169554c88.jpg?crop=0.6667863339915036xw:1xh;center,top&resize=1200:*',
                                    'ingredients' => [
                                        'Chicken Breast' => '200g grilled',
                                        'Mixed Greens' => '3 cups',
                                        'Cherry Tomatoes' => '1 cup',
                                        'Cucumber' => '1 medium',
                                        'Red Onion' => '1/4 medium',
                                        'Feta Cheese' => '50g',
                                        'Olive Oil' => '2 tbsp',
                                        'Lemon Juice' => '2 tbsp',
                                        'Dijon Mustard' => '1 tsp'
                                    ],
                                    'instructions' => [
                                        'Season and grill chicken until cooked through',
                                        'Slice chicken into strips',
                                        'Chop vegetables and mix with greens',
                                        'Whisk olive oil, lemon juice, and mustard for dressing',
                                        'Toss salad with dressing',
                                        'Top with grilled chicken and feta cheese'
                                    ]
                                ],
                                6 => [
                                    'name' => 'Quinoa Buddha Bowl',
                                    'category' => 'lunch',
                                    'time' => '30 min',
                                    'calories' => 420,
                                    'protein' => '16g',
                                    'carbs' => '58g',
                                    'fat' => '14g',
                                    'description' => 'Colorful and nutritious bowl with quinoa, roasted vegetables, and tahini dressing.',
                                    'badges' => ['Vegan', 'Gluten-Free'],
                                    'image' => 'https://www.bhf.org.uk//-/media/images/information-support/support/healthy-living/recipes-new/sweet-potato-and-quinoa-buddha-bowl_620x400.jpg?rev=c44ec7d9cb6c4d6eb4d4245942ba2712&hash=C9348AA44D4421EA90E08D9180BEAEA9',
                                    'ingredients' => [
                                        'Quinoa' => '1 cup cooked',
                                        'Sweet Potato' => '1 medium roasted',
                                        'Chickpeas' => '1 cup roasted',
                                        'Kale' => '2 cups chopped',
                                        'Avocado' => '1/2 medium',
                                        'Tahini' => '3 tbsp',
                                        'Lemon Juice' => '2 tbsp',
                                        'Spices' => 'Cumin, paprika, salt'
                                    ],
                                    'instructions' => [
                                        'Cook quinoa according to package directions',
                                        'Roast sweet potato and chickpeas with spices at 400°F for 25 minutes',
                                        'Massage kale with olive oil and salt',
                                        'Arrange quinoa, vegetables, and avocado in a bowl',
                                        'Whisk tahini and lemon juice for dressing',
                                        'Drizzle with dressing and serve'
                                    ]
                                ],
                                7 => [
                                    'name' => 'Turkey Wrap',
                                    'category' => 'lunch',
                                    'time' => '15 min',
                                    'calories' => 340,
                                    'protein' => '28g',
                                    'carbs' => '32g',
                                    'fat' => '12g',
                                    'description' => 'Healthy turkey wrap with fresh vegetables and hummus.',
                                    'badges' => ['Quick', 'High-Protein'],
                                    'image' => 'https://cdn.apartmenttherapy.info/image/upload/f_jpg,q_auto:eco,c_fill,g_auto,w_1500,ar_4:3/k%2Farchive%2Fc721c214e1623fc0fdfa4d4bcb4617652f783fb3',
                                    'ingredients' => [
                                        'Whole Wheat Tortilla' => '1 large',
                                        'Turkey Breast' => '150g sliced',
                                        'Hummus' => '2 tbsp',
                                        'Lettuce' => '2 cups',
                                        'Tomato' => '1 medium sliced',
                                        'Cucumber' => '1/2 medium sliced',
                                        'Cheese' => '1 slice provolone'
                                    ],
                                    'instructions' => [
                                        'Spread hummus on tortilla',
                                        'Layer turkey, cheese, and vegetables',
                                        'Roll tightly and wrap in foil',
                                        'Toast in pan for 2-3 minutes per side',
                                        'Slice diagonally and serve warm'
                                    ]
                                ],
                                8 => [
                                    'name' => 'Veggie Stir Fry',
                                    'category' => 'dinner',
                                    'time' => '20 min',
                                    'calories' => 340,
                                    'protein' => '12g',
                                    'carbs' => '48g',
                                    'fat' => '14g',
                                    'description' => 'Quick and colorful vegetable stir fry with ginger and soy sauce.',
                                    'badges' => ['Vegan', 'Quick'],
                                    'image' => 'https://ichef.bbci.co.uk/food/ic/food_16x9_1600/recipes/sachas_stir-fry_17077_16x9.jpg',
                                    'ingredients' => [
                                        'Mixed Vegetables' => '4 cups (broccoli, bell peppers, carrots)',
                                        'Tofu' => '200g firm, cubed',
                                        'Soy Sauce' => '3 tbsp',
                                        'Ginger' => '1 tbsp minced',
                                        'Garlic' => '3 cloves minced',
                                        'Sesame Oil' => '1 tbsp',
                                        'Rice' => '1 cup cooked'
                                    ],
                                    'instructions' => [
                                        'Heat sesame oil in a large pan or wok',
                                        'Add garlic and ginger, stir-fry for 30 seconds',
                                        'Add tofu and cook until golden',
                                        'Add vegetables and stir-fry for 5-7 minutes',
                                        'Add soy sauce and toss to combine',
                                        'Serve over rice immediately'
                                    ]
                                ],
                                9 => [
                                    'name' => 'Baked Salmon',
                                    'category' => 'dinner',
                                    'time' => '25 min',
                                    'calories' => 420,
                                    'protein' => '35g',
                                    'carbs' => '18g',
                                    'fat' => '22g',
                                    'description' => 'Oven-baked salmon with lemon and herbs, served with roasted asparagus.',
                                    'badges' => ['Omega-3', 'Heart-Healthy'],
                                    'image' => 'https://i2.wp.com/www.downshiftology.com/wp-content/uploads/2023/12/Baked-Salmon-main.jpg',
                                    'ingredients' => [
                                        'Salmon Fillet' => '200g',
                                        'Asparagus' => '1 bunch',
                                        'Lemon' => '1 sliced',
                                        'Olive Oil' => '2 tbsp',
                                        'Garlic' => '3 cloves minced',
                                        'Fresh Dill' => '2 tbsp',
                                        'Salt & Pepper' => 'To taste'
                                    ],
                                    'instructions' => [
                                        'Season salmon with salt, pepper, and garlic',
                                        'Place on baking sheet with asparagus',
                                        'Drizzle with olive oil and lemon juice',
                                        'Bake at 400°F for 15-20 minutes',
                                        'Garnish with fresh dill and lemon slices',
                                        'Serve immediately'
                                    ]
                                ],
                                10 => [
                                    'name' => 'Lean Beef Steak',
                                    'category' => 'dinner',
                                    'time' => '30 min',
                                    'calories' => 480,
                                    'protein' => '42g',
                                    'carbs' => '8g',
                                    'fat' => '28g',
                                    'description' => 'Grilled lean beef steak with roasted vegetables and herbs.',
                                    'badges' => ['High-Protein', 'Low-Carb'],
                                    'image' => 'https://media.istockphoto.com/id/882548344/photo/grilled-beef-steaks.jpg?s=612x612&w=0&k=20&c=KWhwanO0lIwalPY-CtmY9BDOsJ7QYa-oOnqEa_hKvUM=',
                                    'ingredients' => [
                                        'Lean Beef Steak' => '200g',
                                        'Mixed Vegetables' => '2 cups',
                                        'Olive Oil' => '2 tbsp',
                                        'Garlic' => '2 cloves minced',
                                        'Fresh Rosemary' => '1 tbsp',
                                        'Butter' => '2 tbsp',
                                        'Salt & Pepper' => 'To taste'
                                    ],
                                    'instructions' => [
                                        'Season steak with salt, pepper, and rosemary',
                                        'Grill for 4-5 minutes per side for medium-rare',
                                        'Rest steak for 5 minutes before slicing',
                                        'Roast vegetables with olive oil and garlic',
                                        'Serve steak with vegetables and butter sauce'
                                    ]
                                ],
                                11 => [
                                    'name' => 'Pasta Primavera',
                                    'category' => 'dinner',
                                    'time' => '25 min',
                                    'calories' => 380,
                                    'protein' => '16g',
                                    'carbs' => '58g',
                                    'fat' => '12g',
                                    'description' => 'Fresh pasta with seasonal vegetables and light cream sauce.',
                                    'badges' => ['Vegetarian', 'Quick'],
                                    'image' => 'https://www.southernliving.com/thmb/qa17Gzd7GwxxgZDz-YZiU6OyiSM=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/27722_SUPTskillet_DIGI_43095-a75573c28e5148139e94721f11767a83.jpg',
                                    'ingredients' => [
                                        'Pasta' => '2 cups cooked',
                                        'Mixed Vegetables' => '3 cups (zucchini, bell peppers, cherry tomatoes)',
                                        'Heavy Cream' => '1/2 cup',
                                        'Parmesan Cheese' => '1/4 cup grated',
                                        'Garlic' => '2 cloves minced',
                                        'Fresh Basil' => '1/4 cup chopped',
                                        'Olive Oil' => '2 tbsp'
                                    ],
                                    'instructions' => [
                                        'Cook pasta according to package directions',
                                        'Sauté vegetables in olive oil until tender',
                                        'Add garlic and cook for 1 minute',
                                        'Add cream and Parmesan, simmer until thickened',
                                        'Toss with pasta and fresh basil',
                                        'Serve immediately'
                                    ]
                                ],
                                12 => [
                                    'name' => 'Grilled Veggies',
                                    'category' => 'dinner',
                                    'time' => '20 min',
                                    'calories' => 280,
                                    'protein' => '8g',
                                    'carbs' => '42g',
                                    'fat' => '14g',
                                    'description' => 'Colorful grilled vegetable medley with herbs and balsamic glaze.',
                                    'badges' => ['Vegan', 'Gluten-Free'],
                                    'image' => 'https://playswellwithbutter.com/wp-content/uploads/2021/05/Grilled-Vegetable-Platter-with-Chimichurri-8-e1650490755580.jpg',
                                    'ingredients' => [
                                        'Mixed Vegetables' => '4 cups (zucchini, bell peppers, eggplant, onions)',
                                        'Olive Oil' => '3 tbsp',
                                        'Balsamic Vinegar' => '2 tbsp',
                                        'Fresh Herbs' => '2 tbsp mixed (thyme, rosemary)',
                                        'Garlic' => '3 cloves minced',
                                        'Salt & Pepper' => 'To taste'
                                    ],
                                    'instructions' => [
                                        'Slice vegetables into uniform pieces',
                                        'Toss with olive oil, garlic, and herbs',
                                        'Grill on medium-high heat for 8-10 minutes',
                                        'Drizzle with balsamic vinegar',
                                        'Season with salt and pepper',
                                        'Serve warm or at room temperature'
                                    ]
                                ]
                            ];
                            
                            $recipeId = (int)request('id', 1);
                            $recipe = $recipes[$recipeId] ?? $recipes[1];
                        @endphp
                        
                        <div class="text-center mb-4">
                            <img src="{{ Str::startsWith($recipe['image'], 'http') ? $recipe['image'] : 'https://picsum.photos/seed/' . $recipe['image'] . '/400/300.jpg' }}" class="img-fluid rounded-4" alt="{{ $recipe['name'] }}">
                        </div>
                        
                        <h2 class="fw-black mb-3">{{ $recipe['name'] }}</h2>
                        <div class="d-flex gap-2 mb-3">
                            @foreach($recipe['badges'] as $badge)
                                <span class="badge bg-{{ $badge == 'High-Protein' ? 'success' : ($badge == 'Vegan' ? 'primary' : ($badge == 'Omega-3' ? 'info' : 'warning')) }} rounded-pill">{{ $badge }}</span>
                            @endforeach
                            <span class="badge bg-secondary rounded-pill">{{ $recipe['time'] }}</span>
                        </div>
                        <p class="text-muted mb-4">{{ $recipe['description'] }}</p>
                        
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Ingredients</h5>
                            <ul class="list-unstyled">
                                @foreach($recipe['ingredients'] as $ingredient => $amount)
                                    <li><strong>{{ $ingredient }}:</strong> {{ $amount }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Instructions</h5>
                            <ol>
                                @foreach($recipe['instructions'] as $instruction)
                                    <li>{{ $instruction }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nutrition Information -->
        <div class="card border-0 shadow-sm rounded-4 mt-4">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="fw-black mb-0">Nutrition Information</h5>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="text-center">
                            <h3 class="fw-black text-primary">{{ $recipe['calories'] }}</h3>
                            <p class="text-muted mb-0">Calories</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h3 class="fw-black text-success">{{ $recipe['protein'] }}</h3>
                            <p class="text-muted mb-0">Protein</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h3 class="fw-black text-warning">{{ $recipe['carbs'] }}</h3>
                            <p class="text-muted mb-0">Carbs</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h3 class="fw-black text-info">{{ $recipe['fat'] }}</h3>
                            <p class="text-muted mb-0">Fats</p>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mt-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Macronutrient Breakdown</h6>
                        <div class="mb-2">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <small>Protein</small>
                                <div class="progress rounded-pill" style="height: 8px; width: 150px;">
                                    <div class="progress-bar bg-success" style="width: 35%"></div>
                                </div>
                                <small>35%</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <small>Carbs</small>
                                <div class="progress rounded-pill" style="height: 8px; width: 150px;">
                                    <div class="progress-bar bg-warning" style="width: 45%"></div>
                                </div>
                                <small>45%</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <small>Fats</small>
                                <div class="progress rounded-pill" style="height: 8px; width: 150px;">
                                    <div class="progress-bar bg-info" style="width: 18%"></div>
                                </div>
                                <small>18%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Vitamins & Minerals</h6>
                        <div class="row g-3">
                            <div class="col-6">
                                <small class="text-muted">Vitamin A</small>
                                <div class="fw-bold">15% DV</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Vitamin C</small>
                                <div class="fw-bold">120% DV</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Iron</small>
                                <div class="fw-bold">20% DV</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Calcium</small>
                                <div class="fw-bold">10% DV</div>
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
