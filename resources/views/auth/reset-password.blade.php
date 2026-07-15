<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña - Eventos IA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="login-bg">
    <div class="login-center">
        <div class="login-card">
            <img src="{{ asset('img/escudo.png') }}" alt="Icono inscripción" class="login-logo">
            <h1 class="login-title">Restablecer contraseña</h1>
            <p class="login-subtitle">Ingresa tus datos para crear una nueva contraseña</p>
            <form method="POST" action="{{ route('password.store') }}" class="login-form">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <label for="email" class="login-label">Correo electrónico</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" name="email" type="email" required autofocus class="login-input"
                            value="{{ old('email', $request->email) }}">
                    </div>
                    @if ($errors->has('email'))
                        <div class="login-error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="login-label">Nueva contraseña</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" required class="login-input">
                    </div>
                    @if ($errors->has('password'))
                        <div class="login-error">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="login-label">Confirmar nueva contraseña</label>
                    <div class="login-input-group">
                        <span class="login-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="login-input">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div class="login-error">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="login-button mt-4">
                    Restablecer contraseña
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
