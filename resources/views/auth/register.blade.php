<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .auth-card {
            max-width: 400px;
            margin: 60px auto;
            padding: 32px 24px;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            background: #fff;
        }
    </style>
</head>
<body class="bg-light">
<div class="auth-card">
    <h2 class="mb-4 text-center">Register</h2>
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
    <p class="mt-3 text-center">
        Already have an account?
        <a href="{{ url('/login') }}">Login here</a>
    </p>
</div>
</body>
</html>