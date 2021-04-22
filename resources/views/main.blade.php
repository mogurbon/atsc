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
           {{-- <div class="navbar-brand">

                    <img src="https://www.mend.com/wp-content/uploads/2020/08/logo.png"  width="120" height="100">




            </div>
--}}

            <div class="navbar-item">

                <h1 class="title">Drag Aircraft to Queue and save</h1>
            </div>
            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-end">


                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="{{url("/")}}">
                            AirCraft
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{url("/newaircraft")}}">
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
