
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    @livewireStyles
</head>
<body class="bg-light">
    @livewire('login-form')
    @livewireScripts
</body>
</html>