<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">

    <header>

        <nav class="navbar" role="navigation" aria-label="dropdown navigation">
            <div class="navbar-brand">

                    <img src="https://www.mend.com/wp-content/uploads/2020/08/logo.png"  width="120" height="100">

                <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-end">


                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="{{url("/")}}">
                            AirCraft
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{url("/newmovie")}}">
                                Add
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </nav>
    </header>
    <content>
        <div class="container">
            @yield('content')
        </div>
    </content>

    <footer></footer>
</div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
