<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id" content="520084524383-4j27mq342b5m3phofjm6di55ri45ii12.apps.googleusercontent.com">
    <title>Sadam Tech</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .bg {
            background-image: url({{ asset('/assets/img/login-bg.png') }});
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
</head>
<body>
    <div class="bg">
        <div class="container">
            <h5 class="welcome-text">Hi there!</h5>

            <div id="my-signin2"></div>
            
            <a href="#" onclick="signOut();">Sign out</a>
        </div>
    </div>

    <script src="{{ asset('/assets/js/login.js') }}"></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</body>
</html>