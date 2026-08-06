<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar - Autodiagnóstico Integrado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=syne:600,700,800&family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="login-bg">

    <div class="login-center">
        <div class="login-card">
            <img src="{{ asset('img/escudo.png') }}" alt="Icono inscripción" class="login-logo">
            <h1 class="login-title">Acceso a Autodiagnóstico Integrado</h1>
            <p class="login-subtitle">Ingresa tus credenciales institucionales</p>
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div>
                    <label for="email" class="login-label">Correo electrónico</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" name="email" type="email" required autofocus class="login-input">
                    </div>
                </div>
                <div>
                    <label for="password" class="login-label">Contraseña</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" required class="login-input">
                    </div>
                </div>
                <button type="submit" class="login-button">
                    Ingresar
                </button>
            </form>
            <div>
                <a href="{{ route('register') }}" class="login-register">¿No tienes cuenta? Regístrate</a>
            </div>
            <div>
                <a href="{{ route('password.request') }}" class="login-forgot">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>

</body>

</html>
