<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AMAZING RACE</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Russo+One&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid p-0">
        <div class="container homepage mw-800 p-0 pb-5">
            <center><img src="{{ asset('images/ahrt-logo.png') }}" class="pt-3"></center>
            <center><img src="{{ asset('images/main-banner.jpg') }}" class="img-fluid"></center>
            <h1>AMAZING RACE</h1>
            <p class="p-3">Sed molestie, lacus sed eleifend pharetra, arcu massa fermentum est, at finibus ligula dolor et nulla. Maecenas eget egestas ex, ut tristique sapien. Nulla nec dui vitae neque sodales tristique sed vel enim. Praesent quis odio non leo hendrerit dignissim. Phasellus sed fermentum nisi. Nullam aliquet tristique urna in accumsan.</p>
            @if (Route::has('login'))
            <div class="text-center cta-area">
                @auth
                <a href="{{ url('/home') }}" class="btn btn-primary">
                    Profile
                </a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
                @endauth
            </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>