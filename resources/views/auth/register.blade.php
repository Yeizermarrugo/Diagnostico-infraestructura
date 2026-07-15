<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Plataforma</title>
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
            <h1 class="login-title">Registro en la Plataforma</h1>
            <p class="login-subtitle">Crea tu cuenta institucional</p>
            <form method="POST" action="{{ route('register') }}" class="login-form">
                @csrf
                <div>
                    <label for="name" class="login-label">Nombre completo</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input id="name" name="name" type="text" required autofocus class="login-input"
                            value="{{ old('name') }}">
                    </div>
                    @if ($errors->has('name'))
                        <span class="text-xs text-red-600">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div>
                    <label for="email" class="login-label">Correo electrónico</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" name="email" type="email" required class="login-input"
                            value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-xs text-red-600">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div>
                    <label for="password" class="login-label">Contraseña</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" required class="login-input">
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-xs text-red-600">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div>
                    <label for="password_confirmation" class="login-label">Confirmar contraseña</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="login-input">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-xs text-red-600">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <button type="submit" class="login-button">
                    Registrarse
                </button>
            </form>
            <div>
                <a href="{{ route('login') }}" class="login-register">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>

</body>

</html>
