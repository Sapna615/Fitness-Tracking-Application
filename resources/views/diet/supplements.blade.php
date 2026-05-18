@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Supplements</h1>
                    <p class="text-muted mb-0">Enhance your nutrition with smart supplements</p>
                </div>
                <div class="d-flex gap-2">
                    <!-- <button class="btn btn-outline-primary rounded-pill" onclick="filterSupplements()">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button> -->
                    <!-- <button class="btn btn-outline-success rounded-pill" onclick="exportSupplements()">
                        <i class="fas fa-download me-2"></i>Export
                    </button> -->
                    <button class="btn btn-primary rounded-pill" onclick="addCustomSupplement()">
                        <i class="fas fa-plus me-2"></i>Add Custom
                    </button>
                </div>
            </div>

            <!-- Recommended Supplements -->
            <div class="mb-5">
                <h3 class="fw-black mb-4">Recommended for You</h3>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="fw-bold mb-2">Whey Protein</h5>
                                        <p class="text-muted mb-3">High-quality whey protein for muscle recovery and growth</p>
                                        <div class="d-flex gap-2 mb-3">
                                            <span class="badge bg-success rounded-pill">Post-Workout</span>
                                            <span class="badge bg-info rounded-pill">25g Protein</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <small class="text-muted">Daily</small>
                                                <span class="fw-bold text-success">1 scoop</span>
                                            </div>
                                            <div class="text-end">
                                                <h6 class="fw-black mb-0">$29.99</h6>
                                                <button class="btn btn-primary btn-sm rounded-pill" onclick="addToCart(1, 'Whey Protein', 29.99)">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQIJ4KNZCfoZ2qB7hIKLBCLN-RVKVq423897_8GP1LdXGLSb8eiox3CNXcCW5ZNgVKl1ZSH2cCrdQ4UWMR0EaIrWDUfxlt9bgwQ79hd6BLRaWa5wyZCh_WkD9F3FExliwwFC0-4WKLv&usqp=CAc" alt="Protein" class="rounded-3 mb-2" style="width: 100px;">
                                        <div class="bg-light rounded-3 p-2">
                                            <small class="text-muted">Rating</small>
                                            <div class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h5 class="fw-bold mb-2">Omega-3 Fish Oil</h5>
                                        <p class="text-muted mb-3">Essential fatty acids for heart and brain health</p>
                                        <div class="d-flex gap-2 mb-3">
                                            <span class="badge bg-primary rounded-pill">Daily</span>
                                            <span class="badge bg-info rounded-pill">1000mg EPA</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <small class="text-muted">Daily</small>
                                                <span class="fw-bold text-success">2 capsules</span>
                                            </div>
                                            <div class="text-end">
                                                <h6 class="fw-black mb-0">$24.99</h6>
                                                <button class="btn btn-primary btn-sm rounded-pill" onclick="addToCart(3, 'Omega-3 Fish Oil', 24.99)">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQQnaxzKXeupyeXyuqqpfdnzNrxVfh29viZBWbewhoK20XOhgJcNOOcfiAj_T7KDYzcJSROxOaFOAfLA-uFpNvY6womVsSpbCvfg80tyK7TZVxZMZahPnp_eE45eI2Vym-_gjWS01gA630&usqp=CAc" alt="Omega-3" class="rounded-3 mb-2" style="width: 100px;">
                                        <div class="bg-light rounded-3 p-2">
                                            <small class="text-muted">Rating</small>
                                            <div class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Supplements -->
            <div class="card border-0 shadow-sm rounded-4 mb-5">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Your Current Supplements</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Supplement</th>
                                    <th>Dosage</th>
                                    <th>Timing</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Whey Protein</strong></td>
                                    <td>1 scoop daily</td>
                                    <td>Post-workout</td>
                                    <td>30 days</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="editSupplement(1)">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="removeFromCart(1, 'Whey Protein')">Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Multivitamin</strong></td>
                                    <td>1 tablet daily</td>
                                    <td>With breakfast</td>
                                    <td>60 days</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="editSupplement(2)">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="removeFromCart(2, 'Multivitamin')">Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Vitamin D3</strong></td>
                                    <td>2000 IU daily</td>
                                    <td>With breakfast</td>
                                    <td>90 days</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="editSupplement(3)">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="removeFromCart(3, 'Vitamin D3')">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 text-center hover-lift">
                        <div class="card-body p-4">
                            <i class="fas fa-dumbbell text-primary fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Performance</h6>
                            <p class="text-muted mb-0">Boost strength and recovery</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 text-center hover-lift">
                        <div class="card-body p-4">
                            <i class="fas fa-heart text-danger fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Health</h6>
                            <p class="text-muted mb-0">Support overall wellness</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 text-center hover-lift">
                        <div class="card-body p-4">
                            <i class="fas fa-brain text-info fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Cognitive</h6>
                            <p class="text-muted mb-0">Enhance focus and memory</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4 text-center hover-lift">
                        <div class="card-body p-4">
                            <i class="fas fa-shield-alt text-success fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Immunity</h6>
                            <p class="text-muted mb-0">Strengthen immune system</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips & Guidelines -->
            <div class="bg-light rounded-4 p-5">
                <h5 class="fw-black mb-4">
                    <i class="fas fa-info-circle text-info me-2"></i>Important Guidelines
                </h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success text-white rounded-circle p-2 me-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Consult Professional</h6>
                                <p class="text-muted mb-0 small">Always consult with healthcare provider before starting new supplements</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-warning text-white rounded-circle p-2 me-3">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Consistency is Key</h6>
                                <p class="text-muted mb-0 small">Take supplements consistently for best results</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-info text-white rounded-circle p-2 me-3">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Track Results</h6>
                                <p class="text-muted mb-0 small">Monitor your progress and adjust as needed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary text-white rounded-circle p-2 me-3">
                                <i class="fas fa-tint"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Stay Hydrated</h6>
                                <p class="text-muted mb-0 small">Drink plenty of water with supplements</p>
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
.hover-lift { transition: all 0.3s ease; }
.hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
</style>

@section('scripts')
<script>
    let currentSupplements = [
        { id: 1, name: 'Whey Protein', dosage: '1 scoop daily', timing: 'Post-workout', duration: '30 days' },
        { id: 2, name: 'Multivitamin', dosage: '1 tablet daily', timing: 'With breakfast', duration: '60 days' },
        { id: 3, name: 'Vitamin D3', dosage: '2000 IU daily', timing: 'With breakfast', duration: '90 days' }
    ];
    
    function filterSupplements() {
        alert('Opening supplement filters...');
        console.log('Filtering supplements');
    }
    
    function exportSupplements() {
        let readableText = 'SUPPLEMENTS REPORT\n';
        readableText += '==================\n\n';
        readableText += `Report Date: ${new Date().toLocaleDateString()}\n`;
        readableText += `Total Supplements: ${currentSupplements.length}\n\n`;
        readableText += 'CURRENT SUPPLEMENTS:\n';
        readableText += '--------------------\n';
        
        currentSupplements.forEach((supplement, index) => {
            readableText += `${index + 1}. ${supplement.name}\n`;
            readableText += `   Dosage: ${supplement.dosage}\n`;
            readableText += `   Timing: ${supplement.timing}\n`;
            readableText += `   Duration: ${supplement.duration}\n\n`;
        });
        
        readableText += '\nGenerated by Fitness Portal';
        
        const dataBlob = new Blob([readableText], {type: 'text/plain'});
        const url = URL.createObjectURL(dataBlob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'supplements-report.txt';
        link.click();
        
        alert('Supplements data exported successfully!');
        console.log('Exporting supplements data');
    }
    
    function addCustomSupplement() {
        const supplementName = prompt('Enter supplement name:');
        const dosage = prompt('Enter dosage:');
        const timing = prompt('Enter timing:');
        
        if (supplementName && dosage && timing) {
            const newSupplement = {
                id: currentSupplements.length + 1,
                name: supplementName,
                dosage: dosage,
                timing: timing,
                duration: '30 days'
            };
            
            currentSupplements.push(newSupplement);
            updateSupplementTable();
            
            alert(`Added ${supplementName} - ${dosage} - ${timing} to your supplement list!`);
            console.log('Adding custom supplement:', { supplementName, dosage, timing });
        }
    }
    
    function updateSupplementTable() {
        const tableBody = document.querySelector('tbody');
        if (tableBody) {
            // Clear existing rows
            tableBody.innerHTML = '';
            
            // Rebuild table with current supplements
            currentSupplements.forEach(supplement => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><strong>${supplement.name}</strong></td>
                    <td>${supplement.dosage}</td>
                    <td>${supplement.timing}</td>
                    <td>${supplement.duration}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="editSupplement(${supplement.id})">Edit</button>
                        <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="removeFromCart(${supplement.id}, '${supplement.name}')">Remove</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
    }
    
    function addToCart(supplementId, name, price) {
        // Check if supplement already exists
        const exists = currentSupplements.find(s => s.name === name);
        if (exists) {
            alert(`${name} is already in your supplement list!`);
            return;
        }
        
        // Add to current supplements array
        const newSupplement = {
            id: currentSupplements.length + 1,
            name: name,
            dosage: 'As recommended',
            timing: 'Daily',
            duration: '30 days'
        };
        
        currentSupplements.push(newSupplement);
        updateSupplementTable();
        
        alert(`Added ${name} to your supplement list!`);
        console.log(`Adding to cart:`, { supplementId, name, price });
    }
    
    function removeFromCart(supplementId, name) {
        // Remove from current supplements array
        currentSupplements = currentSupplements.filter(s => s.id !== supplementId);
        updateSupplementTable();
        
        alert(`Removed ${name} from supplement list`);
        console.log(`Removing from cart:`, { supplementId, name });
    }
    
    function editSupplement(supplementId) {
        const supplement = currentSupplements.find(s => s.id === supplementId);
        if (supplement) {
            const newName = prompt('Edit supplement name:', supplement.name);
            const newDosage = prompt('Edit dosage:', supplement.dosage);
            const newTiming = prompt('Edit timing:', supplement.timing);
            
            if (newName && newDosage && newTiming) {
                supplement.name = newName;
                supplement.dosage = newDosage;
                supplement.timing = newTiming;
                updateSupplementTable();
                
                alert('Supplement updated successfully!');
            }
        }
    }
</script>
@endsection
