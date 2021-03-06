<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Generasi Juara</title>

    <meta name="description"
        content="Jadilah top leader buat memenangkan Grand Prize CBR150R dan uang elektronik setiap minggunya!">
    <meta name="author" content="Astra Honda Racing Team">

    <!-- facebook -->
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Generasi Juara" />
    <meta property="og:description"
        content="Jadilah top leader buat memenangkan Grand Prize CBR150R dan uang elektronik setiap minggunya!" />
    <meta property="og:image" content="{{ asset('images/generasijuara.jpg') }}" />

    <!-- twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="{{ url()->full() }}">
    <meta name="twitter:title" content="Generasi Juara">
    <meta name="twitter:description"
        content="Jadilah top leader buat memenangkan Grand Prize CBR150R dan uang elektronik setiap minggunya!">
    <meta name="twitter:image" content="{{ asset('images/generasijuara.jpg') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid p-0">
        <div class="container homepage mw-600 p-0">
            <center><img src="{{ asset('images/logo-ahm.jpg') }}" class="img-logo"></center>
        </div>
    </div>
    <center><img src="{{ asset('images/main-banner.jpg') }}" class="w-100 mw-600"></center>
    <div class="container-fluid p-0">
        <div class="container homepage mw-600 p-0 pb-5 bg-red">
            <h4 class="py-2 mb-0 px-4 text-center text-white text-decoration-underline">
                Aktivasi Generasi Juara telah Ditutup.
                Selamat kepada pemenang Generasi Juara, kamu mendapatkan Grand Prize 1 unit CBR150R tipe non-ABS
            </h4>
            <h3 class="text-center text-white  p-3">BUDI IRAWAN</h3>
            {{-- <p class="py-2 mb-0 px-4 text-center ">Yuk, ikuti gamenya dan menangkan <b>CBR150R</b> serta <b>
                    total 1 juta uang elektronik bagi 4 orang pemenang</b> setiap minggunya</p> --}}
            <div class="text-center pb-3 links">
                <a href="{{'aturan-permainan'}}">
                    LIHAT ATURAN PERMAINAN
                </a>
            </div>
            @if (Route::has('login'))
            <div class="text-center cta-area">
                @auth
                <a href="{{ url('/home') }}" class="btn btn-primary">
                    PROFILE
                </a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    LOGIN
                </a>
                @endauth
            </div>
            @endif
            <div class="text-center pt-2 links">Belum punya akun? <a href="{{ url('register') }}">Daftar</a></div>
            <center><img src="{{ asset('images/logo-ahrt.png') }}" class="img-logo-bottom"></center>
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