<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            background-image: linear-gradient(white, #8edea3);
            margin: 0;

        }

        .full-height {
            height: 70vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
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
            font-size: 84px;
        }

        .links>a {
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

        .img {

            padding-top: 45px;
            width: 100%;

        }

        .quote {
            text-align: center;
            padding-top: 150px;
        }

        .how {
            background-color: rgba(39, 219, 126,0.5);
            color: white;

        }

        .howImg {
            height: 200px;
            width: 100%;

            border-radius: 50%;
        }
    </style>
</head>

<body class="body">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif



        <!-- 
        <h1 class="display-2">Welcome!</h1> -->
        <!-- <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div> -->
        <div class="row">
            <div class="col-md-6 img">
                <img class="img" src="./Resources/top.jpg">

            </div>
            <div class="col-md-6 quote">
                <h1><b>"Recycle the present, save the future."</b></h1>
            </div>
        </div>

    </div>



    <div class="how">
        <h2><b>How It Works<b></h2>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <h3>I want to sell trash<h3>

                        <div class="row">
                            <div class="col-md-6"><img class="howImg" src="./Resources/Collect.jpg"></div>
                            <div class="col-md-6" style="color: black; padding-top: 10%;">
                                <h6><b>Collect the trash</b></h6>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6"><img class="howImg" src="./Resources/add.png"></div>
                            <div class="col-md-6" style="color: black; padding-top: 10%;">
                                <h6><b>Add a post</b></h6>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6"><img class="howImg" src="./Resources/find.jpg"></div>
                            <div class="col-md-6" style="color: black; padding-top: 10%;">
                                <h6><b>Find a customer</b></h6>
                            </div>
                        </div>
            </div>
            <div class="col-md-6">
                <h3>I want to buy trash<h3>
                        <div class="row">
                            <div class="col-md-6"><img class="howImg" src="./Resources/add.png"></div>
                            <div class="col-md-6" style="color: black; padding-top: 10%;">
                                <h6><b>Add post</b></h6>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6"><img class="howImg" src="./Resources/find.jpg"></div>
                            <div class="col-md-6" style="color: black; padding-top: 10%;">
                                <h6><b>Find the seller</b></h6>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6"><img class="howImg" src="./Resources/pay.jpg"></div>
                            <div class="col-md-6" style="color: black; padding-top: 10%;">
                                <h6><b>Pay & Buy</b></h6>
                            </div>
                        </div>

            </div>
        </div>
    </div>






    <div class="row" style="background-color: white;">
        <div class="col-md-6" style="padding-top: 100px;">
            <ol>
                <li>Reduced Energy Consumption.</li>
                <li>Decreased Pollution.</li>
                <li>Considered Very Environmentally Friendly.</li>
                <li>Slows the Rate of Resource Depletion.</li>
                <li>Fights Global Warming.</li>
                <li>Decreases Landfill Waste.</li>
                <li><b>Some Extra Money</b></li>
            </ol>
        </div>
        <div class="col-md-6 img">
            <img class="img" src="./Resources/why.png">

        </div>

    </div>
</body>

</html>