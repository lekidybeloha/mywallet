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
    <form class="form-signin" action='{{ route('register') }}' method="POST" id="registration">
        @csrf
        <fieldset>
            <img src="{{ asset('img/app-logo.png') }}" style="width: 80%;">
            <div id="legend">
                <legend class="">S'enregistrer</legend>
            </div>
            <div class="form-group">
                <!-- Username -->
                <label class="control-label"  for="username">Nom d'utilisateur</label>
                <div class="controls">
                    <input type="text" id="username" name="name" placeholder="" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="email" id="email" name="email" placeholder="" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <!-- Password-->
                <label class="control-label" for="password">Mot de passe</label>
                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <!-- Password -->
                <label class="control-label"  for="password_confirm">Confirmation de mot de passe</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control" required>
                <div class="alert alert-danger" role="alert" id="show-error" style="display: none">
                    Les mot de passe ne correspondent pas
                </div>
            </div>

            <div class="form-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">S'enregistrer</button>
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif
        </fieldset>
    </form>
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
