<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
   
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/location.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    
    <link href="{{ asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href="tel://"><i class="fa fa-phone-alt mr-2"></i> +234 807 805 0144</a>
                    <span class="text-body"> &nbsp; &nbsp; |</span>
                    <a class="text-body px-3 " href="mailto:info@intra.ng"><i class="fa fa-envelope mr-2"></i> info@intra.ng</a>
                </div>
            </div>
            <div class="col-md-6 text-end text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div> 
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                        <li>
                        <nav class="navbar navbar-light">
                          <div class="container-fluid">
                            
                         
                          <form class="d-flex" method="GET" action="{{ route('searcher')}}">
                              {{ csrf_field() }}
                              <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search Bussiness" aria-label="Search">
                              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </form>


                          </div>
                        </nav>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome')}}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('company')}}">{{ __('Company') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('profile')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user')}}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#"">{{ __('Search Workers') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Displaying currlat as current location latitude, and currlng as current location longitude -->
  <form action="{{ route('welcome')}}" method="GET" id="getloc" name="getloc">
  <input type="hidden" class="form-control col-lg-9" id="user-lat" placeholder="Get Latitude" name="user-lat" value="" readonly>
  <input type="hidden" class="form-control col-lg-9" id="user-long" placeholder="Get Longitude" name="user-long" value="" readonly>
  
  </form>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
    {{View::make('footer')}}
</html>
