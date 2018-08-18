<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laraning Flame</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600"
              rel="stylesheet"
              type="text/css">

        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
              integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
              crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .m-t-30 {
                margin-top: 30px;
            }

            .f-s-11 {
                font-size: 1.1rem;
            }

            .color-laravel {
                color: #f4645f;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            a.link {
                color: #f4645f;
                text-decoration: none;
                font-weight: bolder;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    @twinkle('image')
                </div>
                <div class="title m-b-md">
                    @twinkle('title')
                </div>

                <div class="links">
                    @twinkle('links')
                </div>
                <div class="m-b-md content m-t-30">
                    <p><strong class="f-s-11">Open-source package made with <i class="fas fa-heart color-laravel"></i></strong></p>
                    <p>By <strong class="f-s-11"><a class="link" href="https://www.laraning.com" target="_blank">Laraning</a></strong></p>
                </div>
            </div>
        </div>
    </body>
</html>
