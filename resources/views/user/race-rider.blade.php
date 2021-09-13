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
    <title>Speed Racer</title>

    <meta name="Title" content="Speed Racer" />
    <meta name="description"
        content="Speed Racer is a HTML5 game where you can drive through the forest world, collecting the powers along the road to help extend the fuel, race with turbo mode and collect coin to get high score!">
    <meta name="keywords" content="speed, racer, racing, car, vehicle, world, fuel, coin, turbo, nitro">

    <!-- for Facebook -->
    <meta property="og:title" content="Speed Racer" />
    <meta property="og:site_name" content="Speed Racer" />
    <meta property="og:image" content="http://demonisblack.com/code/2017/speedracer/game/share.jpg" />
    <meta property="og:url" content="http://demonisblack.com/code/2017/speedracer/game/" />
    <meta property="og:description"
        content="Speed Racer is a HTML5 game where you can drive through the forest world, collecting the powers along the road to help extend the fuel, race with turbo mode and collect coin to get high score!">

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Speed Racer" />
    <meta name="twitter:description"
        content="Speed Racer is a HTML5 game where you can drive through the forest world, collecting the powers along the road to help extend the fuel, race with turbo mode and collect coin to get high score!" />
    <meta name="twitter:image" content="http://demonisblack.com/code/2017/speedracer/game/share.jpg" />

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
        <img src="{{ asset('game-race/game/assets/loader.png') }}" /><br />
        <span>0</span>
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
                <div class="rotateImg"><img src="{{ asset('game-race/game/assets/rotate.png') }}" /></div>
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

    <script>
        var coin_value = parseInt({{ $coin_value }});
        console.log(coin_value);
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="https://127.0.0.1:8000/game-race/game/js/vendor/jquery.min.js"><\/script>')
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Congratulations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="textcheckheak"></p>
                </div>
            </div>
        </div>
    </div>


</body>

<script>
    console.log(playerData.score);
</script>



</html>