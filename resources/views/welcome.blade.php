<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Portal - Unleash Your Potential</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .hero-section { 
            background: linear-gradient(135deg, #1e3a8a 0%, #4c1d95 100%); 
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
            background-size: 40px 40px;
        }
        .btn-primary { background: #3b82f6; border: none; padding: 15px 40px; border-radius: 50px; font-weight: 700; font-size: 1.1rem; }
        .btn-outline-light { border-radius: 50px; padding: 15px 40px; font-weight: 700; }
        .feature-card { border-radius: 30px; border: 1px solid rgba(0,0,0,0.05); transition: 0.3s; }
        .feature-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100 z-3 py-4">
        <div class="container">
            <a class="navbar-brand fw-black fs-3 italic" href="/">FITNESS<span class="text-info">PORTAL</span></a>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-light rounded-pill px-4 fw-bold shadow">Dashboard</a>
                @else
                    <!-- <a href="{{ route('login') }}" class="btn btn-link text-white text-decoration-none fw-bold me-3">Login</a> -->
                    <!-- <a href="{{ route('register') }}" class="btn btn-info text-white rounded-pill px-4 fw-bold shadow">Join Now</a> -->
                @endauth
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container relative z-2">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-1 fw-black mb-4">UNLEASH YOUR <br><span class="text-info italic">POTENTIAL.</span></h1>
                    <p class="lead mb-5 opacity-75 fs-4 pe-lg-5">
                        Get personalized workout plans, track your nutrition, and crush your fitness goals with our all-in-one training portal.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary shadow-lg">Register Now </a>
                        <!-- <a href="#features" class="btn btn-outline-light">Join now</a> -->
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
