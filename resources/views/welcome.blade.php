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
        <form class="form-signin" action="{{ route('login') }}" method="POST">
            @csrf
            <img src="{{ asset('img/app-logo.png') }}" style="width: 80%;">
            <p class="description-font">
                My wallet est une application de gestion de portefeuille, gérer au mieux vos économies
            </p>
            <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
            <label for="inputEmail" class="sr-only">Adresse email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Adresse email" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Se souvenir de moi
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
            <a href="{{ route('register') }}">S'enregistrer</a>
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            <p class="mt-5 mb-3 text-muted">Copyright © {{ date('Y') }} <a href="#">Lekidybeloha</a> - Design by Dashtreme Admin</p>
        </form>
    </div>
    </body>
</html>
