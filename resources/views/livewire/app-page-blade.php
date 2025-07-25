@if($view === 'login')
    <div class="auth-card">
        <h2 class="mb-4 text-center">Login</h2>
        <form wire:submit.prevent="login">
            <input type="email" wire:model.defer="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" wire:model.defer="password" class="form-control mb-2" placeholder="Password" required>
            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">
            Don't have an account?
            <a href="#" wire:click.prevent="showRegister">Register here</a>
        </p>
    </div>
@elseif($view === 'register')
    <div class="auth-card">
        <h2 class="mb-4 text-center">Register</h2>
        <form wire:submit.prevent="register">
            <input type="text" wire:model.defer="name" class="form-control mb-2" placeholder="Name" required>
            <input type="email" wire:model.defer="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" wire:model.defer="password" class="form-control mb-2" placeholder="Password" required>
            <input type="password" wire:model.defer="password_confirmation" class="form-control mb-2" placeholder="Confirm Password" required>
            @if($error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <p class="mt-3 text-center">
            Already have an account?
            <a href="#" wire:click.prevent="showLogin">Login here</a>
        </p>
    </div>
@elseif($view === 'products')
    @livewire('products')
    <button wire:click="logout" class="btn btn-outline-danger btn-sm float-end">Logout</button>
@endif