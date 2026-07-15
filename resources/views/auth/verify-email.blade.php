<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu correo | Plataforma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="verify-bg">

    <div class="verify-card">
        <div class="verify-icon">
            <i class="fa fa-envelope fa-2x"></i>
        </div>
        <h1 class="verify-title">¡Verifica tu correo electrónico!</h1>
        <div class="verify-text">
            {{ __('Gracias por registrarte. Antes de continuar, por favor verifica tu correo electrónico haciendo clic en el enlace que te enviamos. Si no recibiste el correo, puedes solicitar uno nuevo.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="verify-success">
                {{ __('Un nuevo enlace de verificación fue enviado a tu correo electrónico.') }}
            </div>
        @endif

        <div class="verify-actions">
            <a class="verify-button" href="{{ route('login') }}">
                {{ __('Volver') }}
            </a>
        </div>
    </div>

</body>

</html>
