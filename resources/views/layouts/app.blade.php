<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Portal - {{ $title ?? '' }}</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #f8f9fa; }
        .navbar { background: linear-gradient(135deg, #1e3a8a 0%, #312e81 100%); position: fixed; top: 0; left: 0; right: 0; z-index: 1050; width: 100%; padding: 0; height: auto; }
    body { padding-top: 80px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        .btn-primary { background: #2563eb; border: none; padding: 10px 25px; border-radius: 10px; }
        .sidebar-link { color: #4b5563; text-decoration: none; padding: 10px 15px; display: block; border-radius: 8px; }
        .sidebar-link:hover, .sidebar-link.active { background: #e5e7eb; color: #1e3a8a; font-weight: 600; }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold italic" href="{{ route('dashboard') }}">
                FITNESS<span class="text-info">PORTAL</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('workouts.*') ? 'active' : '' }}" href="{{ route('workouts.index') }}">Workouts</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('diet.*') ? 'active' : '' }}" href="{{ route('diet.index') }}">Diet</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('progress.*') ? 'active' : '' }}" href="{{ route('progress.index') }}">Progress</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">Help</a></li>
                    @can('admin')
                        <li class="nav-item"><a class="nav-link text-warning fw-bold" href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                    @endcan
                </ul>
                <div class="navbar-nav">
                    @auth
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-bold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Account Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('fitness-profile.edit') }}">Fitness Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-info text-white">Join Now</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-5" style="margin-top: 10px;">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Fitness Portal. Built with Strength & Bootstrap.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @auth
        @include('components.chatbot')
    @endauth

    @yield('scripts')
</body>
</html>
