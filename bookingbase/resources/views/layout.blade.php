<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titel', 'IBA BookingBase')</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ URL::asset('js/nQuery.js') }}" charset="utf-8"></script>

    </head>
    <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">BookingBase</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  @if (Route::has('login'))
                        <ul class="navbar-nav">
                        @auth
                              <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          {{ Auth::user()->name }} <span></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                          Logout
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                          </form>
                                    </div>
                              </li>
                              @else
                              <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                              </li>
                              @if (Route::has('register'))
                                    <li class="nav-item">
                                          <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    </li>
                              @endif
                              @endauth
                        </ul>
                  @endif
            </div>
      </nav>

      <div class="content">
        @yield('content')
      </div>

      <div class="footer-margin">

      </div>
      <footer class="page-footer font-small pt-4 bg-dark mt-5 pb-4">
            <div class="footer-copyright text-center py-3 text-white">© 2019 Copyright:
                  <a href="" class="text-muted"> IBA BookingBase</a>
            </div>
      </footer>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      @yield('js')
    </body>
</html>
