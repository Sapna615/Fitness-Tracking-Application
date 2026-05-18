@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="fw-black mb-3">Upgrade to Premium</h1>
                <p class="lead text-muted">Unlock the full potential of your fitness journey with our premium features</p>
            </div>

            <!-- Pricing Cards -->
            <div class="row g-4 mb-5">
                <!-- Free Plan -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-3">Free</h4>
                            <h2 class="fw-black mb-3">$0<span class="fs-5 text-muted">/month</span></h2>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic meal tracking</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Water tracker</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic recipes</li>
                                <li class="mb-2 text-muted"><i class="fas fa-times text-muted me-2"></i>Custom meal plans</li>
                                <li class="mb-2 text-muted"><i class="fas fa-times text-muted me-2"></i>Advanced analytics</li>
                                <li class="mb-2 text-muted"><i class="fas fa-times text-muted me-2"></i>Premium recipes</li>
                            </ul>
                            <button class="btn btn-outline-secondary w-100 rounded-pill mt-auto" data-bs-toggle="modal" data-bs-target="#checkoutModal" data-plan="Free" data-price="$0">Current Plan</button>
                        </div>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="col-md-4">
                    <div class="card border-3 border-primary shadow-lg rounded-4 h-100 position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle-x bg-primary text-white px-3 py-1 rounded-pill" style="margin-top: -15px;">
                            <small class="fw-bold">MOST POPULAR</small>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-3">Premium</h4>
                            <h2 class="fw-black mb-3">$9.99<span class="fs-5 text-muted">/month</span></h2>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Everything in Free</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom meal plans</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Premium recipes</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Nutrition insights</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority support</li>
                            </ul>
                            <button class="btn btn-primary w-100 rounded-pill mt-auto" data-bs-toggle="modal" data-bs-target="#checkoutModal" data-plan="Premium" data-price="$9.99/month">
                                <i class="fas fa-crown me-2"></i>Upgrade Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lifetime Plan -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="fw-bold mb-3">Lifetime</h4>
                            <h2 class="fw-black mb-3">$199<span class="fs-5 text-muted">/once</span></h2>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Everything in Premium</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Lifetime access</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Future features</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>One-time payment</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Save 60%</li>
                            </ul>
                            <button class="btn btn-success w-100 rounded-pill mt-auto" data-bs-toggle="modal" data-bs-target="#checkoutModal" data-plan="Lifetime" data-price="$199">
                                <i class="fas fa-infinity me-2"></i>Get Lifetime
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Comparison -->
            <div class="card border-0 shadow-sm rounded-4 mb-5">
                <div class="card-body p-4">
                    <h3 class="fw-black mb-4 text-center">Feature Comparison</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th class="text-center">Free</th>
                                    <th class="text-center">Premium</th>
                                    <th class="text-center">Lifetime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Meal Tracking</strong></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td><strong>Custom Meal Plans</strong></td>
                                    <td class="text-center"><i class="fas fa-times text-muted"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td><strong>Advanced Analytics</strong></td>
                                    <td class="text-center"><i class="fas fa-times text-muted"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td><strong>Premium Recipes</strong></td>
                                    <td class="text-center"><i class="fas fa-times text-muted"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td><strong>Priority Support</strong></td>
                                    <td class="text-center"><i class="fas fa-times text-muted"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Testimonial -->
            <div class="bg-light rounded-4 p-5 text-center">
                <div class="mb-4">
                    <img src="https://picsum.photos/seed/user1/80/80.jpg" alt="User" class="rounded-circle mb-3" style="width: 80px; height: 80px;">
                    <h5 class="fw-bold">Sarah Johnson</h5>
                    <p class="text-muted mb-0">"Premium has completely transformed my fitness journey. The custom meal plans and insights are game-changers!"</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-0 pb-0 mt-3 px-4">
                <h5 class="fw-black modal-title">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="bg-light rounded-4 p-3 mb-4 text-center">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">Selected Plan</p>
                    <h4 class="fw-black mb-0 text-primary" id="checkoutPlanName">Plan Name</h4>
                    <h5 class="fw-bold text-dark mt-2" id="checkoutPlanPrice">$0.00</h5>
                </div>
                
                <form action="#" method="POST" id="checkoutForm">
                    @csrf
                    <h6 class="fw-bold mb-3">Payment Details</h6>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Name on Card</label>
                        <input type="text" class="form-control rounded-pill" required placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Card Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 rounded-start-pill"><i class="fas fa-credit-card text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 rounded-end-pill pl-0" required placeholder="0000 0000 0000 0000" maxlength="19">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <label class="form-label text-muted small fw-bold">Expiry Date</label>
                            <input type="text" class="form-control rounded-pill" required placeholder="MM/YY" maxlength="5">
                        </div>
                        <div class="col-6">
                            <label class="form-label text-muted small fw-bold">CVV</label>
                            <input type="password" class="form-control rounded-pill" required placeholder="123" maxlength="4">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary w-100 rounded-pill py-2 fw-bold" onclick="processPayment()">
                        Confirm Payment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkoutModal = document.getElementById('checkoutModal');
        if (checkoutModal) {
            checkoutModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const planName = button.getAttribute('data-plan');
                const planPrice = button.getAttribute('data-price');
                
                document.getElementById('checkoutPlanName').textContent = planName;
                document.getElementById('checkoutPlanPrice').textContent = planPrice;
            });
        }
    });

    function processPayment() {
        const form = document.getElementById('checkoutForm');
        if (form.checkValidity()) {
            const btn = form.querySelector('button');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            btn.disabled = true;
            
            setTimeout(() => {
                alert('Payment processed successfully! Your plan has been upgraded.');
                bootstrap.Modal.getInstance(document.getElementById('checkoutModal')).hide();
                btn.innerHTML = 'Confirm Payment';
                btn.disabled = false;
                form.reset();
            }, 1500);
        } else {
            form.reportValidity();
        }
    }
</script>

<style>
.fw-black { font-weight: 900; }
</style>
@endsection
