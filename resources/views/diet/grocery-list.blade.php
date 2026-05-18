@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Grocery List</h1>
                    <p class="text-muted mb-0">Smart shopping for your meal plan</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary rounded-pill" onclick="printGroceryList()">
                        <i class="fas fa-print me-2"></i>Print List
                    </button>
                    <button class="btn btn-primary rounded-pill" onclick="shareGroceryList()">
                        <i class="fas fa-share me-2"></i>Share List
                    </button>
                </div>
            </div>

            <!-- Shopping Progress -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="progress rounded-pill me-3" style="height: 20px; width: 200px;">
                                    <div class="progress-bar bg-success" style="width: 65%">18 / 28</div>
                                </div>
                                <span class="fw-bold">Items Purchased</span>
                            </div>
                            <p class="text-muted small mb-0">65% complete</p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <h3 class="fw-black mb-1">$127.50</h3>
                                <p class="text-muted mb-0">Estimated Total</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grocery Categories -->
            <div class="row g-4">
                <!-- Produce -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-black mb-0">
                                    <i class="fas fa-carrot text-success me-2"></i>Produce
                                </h5>
                                <span class="badge bg-success rounded-pill">8 items</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Spinach</span>
                                        <small class="text-muted d-block">2 bunches</small>
                                    </div>
                                    <span class="text-success fw-bold">$3.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Bananas</span>
                                        <small class="text-muted d-block">6 ripe</small>
                                    </div>
                                    <span class="text-success fw-bold">$2.49</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Broccoli</span>
                                        <small class="text-muted d-block">2 heads</small>
                                    </div>
                                    <span class="text-success fw-bold">$4.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Tomatoes</span>
                                        <small class="text-muted d-block">1 lb</small>
                                    </div>
                                    <span class="text-success fw-bold">$3.49</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Avocados</span>
                                        <small class="text-muted d-block">4 ripe</small>
                                    </div>
                                    <span class="text-success fw-bold">$5.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Mixed Berries</span>
                                        <small class="text-muted d-block">2 containers</small>
                                    </div>
                                    <span class="text-success fw-bold">$7.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Lemons</span>
                                        <small class="text-muted d-block">4 count</small>
                                    </div>
                                    <span class="text-success fw-bold">$2.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Garlic</span>
                                        <small class="text-muted d-block">1 bulb</small>
                                    </div>
                                    <span class="text-success fw-bold">$0.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Protein -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-black mb-0">
                                    <i class="fas fa-drumstick-bite text-danger me-2"></i>Protein
                                </h5>
                                <span class="badge bg-danger rounded-pill">5 items</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Chicken Breast</span>
                                        <small class="text-muted d-block">2 lbs</small>
                                    </div>
                                    <span class="text-success fw-bold">$12.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Salmon Fillet</span>
                                        <small class="text-muted d-block">1.5 lbs</small>
                                    </div>
                                    <span class="text-success fw-bold">$18.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Eggs</span>
                                        <small class="text-muted d-block">1 dozen</small>
                                    </div>
                                    <span class="text-success fw-bold">$4.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Greek Yogurt</span>
                                        <small class="text-muted d-block">32 oz</small>
                                    </div>
                                    <span class="text-success fw-bold">$5.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Tofu</span>
                                        <small class="text-muted d-block">1 block</small>
                                    </div>
                                    <span class="text-success fw-bold">$3.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grains & Pasta -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-black mb-0">
                                    <i class="fas fa-bread-slice text-warning me-2"></i>Grains & Pasta
                                </h5>
                                <span class="badge bg-warning rounded-pill">4 items</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Quinoa</span>
                                        <small class="text-muted d-block">1 bag</small>
                                    </div>
                                    <span class="text-success fw-bold">$7.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Brown Rice</span>
                                        <small class="text-muted d-block">2 lbs</small>
                                    </div>
                                    <span class="text-success fw-bold">$4.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Whole Wheat Pasta</span>
                                        <small class="text-muted d-block">2 boxes</small>
                                    </div>
                                    <span class="text-success fw-bold">$6.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Oats</span>
                                        <small class="text-muted d-block">1 canister</small>
                                    </div>
                                    <span class="text-success fw-bold">$5.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dairy & Alternatives -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-black mb-0">
                                    <i class="fas fa-cheese text-info me-2"></i>Dairy & Alternatives
                                </h5>
                                <span class="badge bg-info rounded-pill">6 items</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Almond Milk</span>
                                        <small class="text-muted d-block">2 cartons</small>
                                    </div>
                                    <span class="text-success fw-bold">$8.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Cheddar Cheese</span>
                                        <small class="text-muted d-block">8 oz</small>
                                    </div>
                                    <span class="text-success fw-bold">$4.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2" checked>
                                        <span class="fw-bold">Butter</span>
                                        <small class="text-muted d-block">1 lb</small>
                                    </div>
                                    <span class="text-success fw-bold">$5.99</span>
                                </div>
                                <div class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input me-2">
                                        <span class="fw-bold">Cottage Cheese</span>
                                        <small class="text-muted d-block">16 oz</small>
                                    </div>
                                    <span class="text-success fw-bold">$3.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Item Section -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">
                        <i class="fas fa-plus-circle text-primary me-2"></i>Add Custom Item
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control rounded-pill" placeholder="Item name">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control rounded-pill" placeholder="Quantity">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select rounded-pill">
                                <option>Produce</option>
                                <option>Protein</option>
                                <option>Grains</option>
                                <option>Dairy</option>
                                <option>Snacks</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary rounded-pill w-100" onclick="addCustomItem()">
                                <i class="fas fa-plus"></i>
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
    function printGroceryList() {
        window.print();
        console.log('Printing grocery list...');
    }
    
    function shareGroceryList() {
        // Share functionality - could open share dialog or copy to clipboard
        const groceryItems = document.querySelectorAll('.list-group-item');
        let items = [];
        groceryItems.forEach(item => {
            if (item.querySelector('input[type="checkbox"]').checked) {
                const itemName = item.querySelector('span').textContent;
                items.push(itemName);
            }
        });
        
        const shareText = 'My Grocery List:\n' + items.join('\n');
        
        if (navigator.share) {
            navigator.share({
                title: 'Grocery List',
                text: shareText
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(shareText);
            alert('Grocery list copied to clipboard!');
        }
    }
    
    function addCustomItem() {
        const itemName = document.querySelector('input[placeholder="Item name"]').value;
        const quantity = document.querySelector('input[placeholder="Quantity"]').value;
        const category = document.querySelector('select').value;
        
        if (itemName && quantity) {
            // Find the appropriate category section
            const categorySection = findCategorySection(category);
            if (categorySection) {
                // Create new list item matching the existing structure
                const newItem = document.createElement('div');
                newItem.className = 'list-group-item border-0 px-0 d-flex justify-content-between align-items-center';
                newItem.innerHTML = `
                    <div>
                        <input type="checkbox" class="form-check-input me-2">
                        <span class="fw-bold">${itemName}</span>
                        <small class="text-muted d-block">${quantity}</small>
                    </div>
                    <span class="text-success fw-bold">$0.00</span>
                `;
                
                // Add to the category list
                const listGroup = categorySection.querySelector('.list-group');
                if (listGroup) {
                    listGroup.appendChild(newItem);
                    
                    // Update the item count badge
                    const badge = categorySection.querySelector('.badge');
                    if (badge) {
                        const currentCount = parseInt(badge.textContent) || 0;
                        badge.textContent = `${currentCount + 1} items`;
                    }
                }
            }
            
            alert(`Added ${quantity} ${itemName} to ${category} category!`);
            console.log('Adding custom item:', { itemName, quantity, category });
            
            // Clear form
            document.querySelector('input[placeholder="Item name"]').value = '';
            document.querySelector('input[placeholder="Quantity"]').value = '';
        } else {
            alert('Please fill in all fields');
        }
    }
    
    function findCategorySection(category) {
        // Find the category section based on the category name
        const sections = document.querySelectorAll('.col-md-6');
        for (let section of sections) {
            const title = section.querySelector('h5');
            if (title && title.textContent.toLowerCase().includes(category.toLowerCase())) {
                return section;
            }
        }
        return null;
    }
</script>
@endsection
