<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bands - @yield('title', 'Home')</title>
        <meta name="description" content="Band/Album Organization App">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="/css/bulma.css">
    </head>

    <body>
        <nav class="nav">
            <div class="nav-left nav-menu">
                <span class="nav-item">
                    <!-- spacer -->
                </span>
                <a class="nav-item" href="/">
                    Home
                </a>
                <a class="nav-item" href="/albums">
                    Albums
                </a>
            </div>

            <div class="nav-center">
                <a class="nav-item" href="#">
                    <span class="icon">
                        <i class="fa fa-github"></i>
                    </span>
                </a>
                <a class="nav-item" href="#">
                    <span class="icon">
                        <i class="fa fa-twitter"></i>
                    </span>
                </a>
            </div>
        </nav>
    <section class="hero is-dark">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Bands & Albums
                </h1>
                <h2 class="subtitle">

                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="columns">
            <div class="column is-2">
                <!-- gutter -->
            </div>

            <div class="column">

                @if(Session::has('message'))
                <div class="notification">
                    {{ Session::get('message') }}
                </div>
                @endif

                @if (count($errors) > 0)
                    <div class="notification is-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

            </div>

            <div class="column is-2">
                <!-- gutter -->
            </div>
        </div>
    </section>

    </body>

    <script type="text/javascript" src="/js/app.js"></script>
    @yield('scripts')

</html>
