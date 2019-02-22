<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titel', 'IBA BookingBase')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ URL::asset('js/nQuery.js') }}" charset="utf-8"></script>

    </head>
    <body>
      <nav>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="#">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <span> - </span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <hr>
        </div>
      </nav>

      <div class="content">
        @yield('content')
      </div>

      <footer>
        <hr>
        footer
      </footer>
      @yield('js')
    </body>
</html>
