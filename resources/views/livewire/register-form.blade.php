<div class="auth-card">
    <h2 class="mb-4 text-center">Register</h2>
    <form wire:submit.prevent="register">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" wire:model.defer="name" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" wire:model.defer="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" wire:model.defer="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" wire:model.defer="password_confirmation" class="form-control" required>
        </div>
        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
        @if($success)
            <div class="alert alert-success">{{ $success }}</div>
        @endif
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
    <p class="mt-3 text-center">
        Already have an account?
        <a href="{{ url('/login') }}">Login here</a>
    </p>
</div>
