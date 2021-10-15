<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Generasi Juara</title>

    <meta name="Title" content="Speed Racer" />
    <meta name="description"
        content="Speed Racer is a HTML5 game where you can drive through the forest world, collecting the powers along the road to help extend the fuel, race with turbo mode and collect coin to get high score!">
    <meta name="keywords" content="speed, racer, racing, car, vehicle, world, fuel, coin, turbo, nitro">

    <!-- for Facebook -->
    <meta property="og:title" content="Speed Racer" />
    <meta property="og:site_name" content="Speed Racer" />
    <meta property="og:image" content="{{ asset('game-race/game/share.jpg') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:description"
        content="Speed Racer is a HTML5 game where you can drive through the forest world, collecting the powers along the road to help extend the fuel, race with turbo mode and collect coin to get high score!">

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Speed Racer" />
    <meta name="twitter:description"
        content="Speed Racer is a HTML5 game where you can drive through the forest world, collecting the powers along the road to help extend the fuel, race with turbo mode and collect coin to get high score!" />
    <meta name="twitter:image" content="{{ asset('game-race/game/share.jpg') }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement("style");
            msViewportStyle.appendChild(
                document.createTextNode(
                    "@-ms-viewport{width:device-width}"
                )
            );
            document.getElementsByTagName("head")[0].
                appendChild(msViewportStyle);
        }
    </script>

    <link rel="shortcut icon" href="{{ asset('game-race/game/icon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('game-race/game/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('game-race/game/css/main.css') }}">
    <script src="{{ asset('game-race/game/js/vendor/modernizr-2.6.2.min.js') }}"></script>
</head>

<body>
    <!-- PERCENT LOADER START-->
    <div id="mainLoader">
        <img src="{{ asset('race/assets/loader.png') }}" /><br />
        <span>0</span>
        <h5 class="mt-5" id="tip">Your Name Tip Appear Here</h5>
    </div>
    <!-- PERCENT LOADER END-->

    <!-- CONTENT START-->
    <div id="mainHolder">

        <!-- BROWSER NOT SUPPORT START-->
        <div id="notSupportHolder">
            <div class="notSupport">YOUR BROWSER ISN'T SUPPORTED.<br />PLEASE UPDATE YOUR BROWSER IN ORDER TO RUN THE
                GAME</div>
        </div>
        <!-- BROWSER NOT SUPPORT END-->

        <!-- ROTATE INSTRUCTION START-->
        <div id="rotateHolder">
            <div class="mobileRotate">
                <div class="rotateImg"><img src="{{ asset('race/assets/rotate.png') }}" /></div>
                <div class="rotateDesc">Rotate your device <br />to portrait</div>
            </div>
        </div>
        <!-- ROTATE INSTRUCTION END-->

        <!-- CANVAS START-->
        <div id="canvasHolder">
            <canvas id="gameCanvas" width="768" height="1024"></canvas>
        </div>
        <!-- CANVAS END-->

    </div>
    <!-- CONTENT END-->

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="textcheckheal"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let coin_value_data = parseInt("{{ $uses_rider['coin_value'] }}");
        let score_value_data = parseInt("{{ $uses_rider['score_value'] }}");
        let racer_data = "{{ $uses_rider['racer'] }}";
        let hills_data = "{{ $uses_rider['hills'] }}";
        let sky_data = "{{ $uses_rider['sky'] }}";
        let trees_data = "{{ $uses_rider['trees'] }}";
        let left_data = "{{ $uses_rider['left'] }}";
        let right_data = "{{ $uses_rider['right'] }}";
        let straight_data = "{{ $uses_rider['straight'] }}";
        let up_left_data = "{{ $uses_rider['up_left'] }}";
        let up_right_data = "{{ $uses_rider['up_right'] }}";
        let up_straight_data = "{{ $uses_rider['up_straight'] }}";
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var jqueryLocal = "{{ asset('game-race/game/js/vendor/jquery.min.js') }}";
        window.jQuery || document.write('<script src="'+jqueryLocal+'"><\/script>')
    </script>

    <script src="{{ asset('game-race/game/js/vendor/detectmobilebrowser.js') }}"></script>
    <script src="{{ asset('game-race/game/js/vendor/createjs.min.js') }}"></script>
    <script src="{{ asset('game-race/game/js/vendor/TweenMax.min.js') }}"></script>

    <script src="{{ asset('game-race/game/js/plugins.js') }}"></script>
    <script src="{{ asset('game-race/game/js/sound.js') }}"></script>
    <script src="{{ asset('game-race/game/js/canvas.js') }}"></script>
    <script src="{{ asset('game-race/game/js/game.js') }}"></script>
    <script src="{{ asset('game-race/game/js/mobile.js') }}"></script>
    <script src="{{ asset('game-race/game/js/main.js') }}"></script>
    <script src="{{ asset('game-race/game/js/loader.js') }}"></script>
    <script src="{{ asset('game-race/game/js/init.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</body>

</html>
