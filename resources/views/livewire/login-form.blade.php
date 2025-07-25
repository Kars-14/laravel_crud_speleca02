<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="auth-card">
        <h2 class="mb-4 text-center">Login</h2>
        <form wire:submit.prevent="login">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" wire:model.defer="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" wire:model.defer="password" class="form-control" required>
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">
            Don't have an account?
            <a href="{{ url('/register') }}">Register here</a>
        </p>
    </div>
</div>
