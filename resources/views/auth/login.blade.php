<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h4 class="text-center fw-bold mb-4">Welcome Back</h4>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Email Address</label>
            <input type="email" name="email" class="form-control" required autofocus>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label text-muted" for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn btn-primary w-full py-2 fw-bold text-white w-100">Login to Dashboard</button>
        
        <div class="text-center mt-4">
            <p class="text-muted small">Don't have an account? <a href="{{ secure_url('register') }}" class="text-primary fw-bold">Sign up</a></p>
        </div>
    </form>
</x-guest-layout>
