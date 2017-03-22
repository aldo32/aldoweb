<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title")</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">

    <script src="{{ URL::asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
</head>

<body>
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Works</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Contact</a></li>
                    <li>
                        <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
                    </li>
                </ul>
                <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
                    <form class="navbar-form navbar-right form-inline" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="Email">Email</label>
                            <input type="email" class="form-control" id="Email" placeholder="Email" autofocus required />
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="Password">Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="Password" required />
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">footer</p>
    </div>
</footer>
</body>
</html>
