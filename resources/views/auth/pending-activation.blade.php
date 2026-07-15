<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta pendiente de activación | Plataforma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('img/escudo.png') }}">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="verify-bg">

    <div class="verify-card">
        <div class="verify-icon">
            <i class="fa fa-user-clock fa-2x"></i>
        </div>
        <h1 class="verify-title">¡Cuenta creada!</h1>
        <div class="verify-text">
            {{ __('Tu cuenta fue registrada correctamente, pero debe ser activada por un administrador antes de que puedas ingresar. Ponte en contacto con el administrador de la plataforma para solicitar la activación.') }}
        </div>

        <div class="verify-actions">
            <a class="verify-button" href="{{ route('login') }}">
                {{ __('Volver') }}
            </a>
        </div>
    </div>

</body>

</html>
