<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña - Autodiagnóstico Integrado</title>
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
            <h1 class="login-title">Recuperar contraseña</h1>
            <p class="login-subtitle">
                ¿Olvidaste tu contraseña? Ingresa tu correo institucional y te enviaremos el enlace para restablecerla.
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="login-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="login-label">Correo electrónico</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" name="email" type="email" required autofocus class="login-input"
                            value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <div class="login-error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="login-button mt-4">
                    Enviar enlace de recuperación
                </button>
            </form>
            <div>
                <a href="{{ route('login') }}" class="login-register">¿Ya tienes cuenta? Ingresar</a>
            </div>
            <div>
                <a href="{{ route('register') }}" class="login-forgot">¿No tienes cuenta? Regístrate</a>
            </div>
        </div>
    </div>

</body>

</html>
