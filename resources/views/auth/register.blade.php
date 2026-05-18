<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h4 class="text-center fw-bold mb-4">Join Fitness Portal</h4>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Full Name</label>
            <input type="text" name="name" class="form-control" required autofocus>
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Email Address</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-full py-2 fw-bold text-white w-100">Create Account</button>
        
        <div class="text-center mt-4">
            <p class="text-muted small">Already a member? <a href="{{ route('login') }}" class="text-primary fw-bold">Login here</a></p>
        </div>
    </form>
</x-guest-layout>
