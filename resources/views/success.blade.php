<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <!-- Custom Style-->
    <link href="{{ asset('css/app-style.css') }}" rel="stylesheet"/>
    <title>My Wallet</title>
</head>
<body class="text-center bg-theme1">
<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <div class="form-signin">
        <img src="{{ asset('img/app-logo.png') }}" style="width: 80%;">
        <p class="description-font">
            Bienvenue, vous pouvez maintenant vous connecter et suivre vos dépenses
        </p>
        <a href="{{ route('welcome') }}">Se connecter</a>
    </div>
</div>
</body>
</html>
