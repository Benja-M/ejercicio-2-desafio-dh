<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title class="Title">Desafio 2</title>
</head>
<style>
.logo{
    color:black;
}

.Admin-Link{
    margin: 0 auto;
}
</style>
<body>

    <header>
        <div class="container-fluid">
            <nav class="d-flex navbar navbar-expand-lg navbar-dark __nave">
                    <div class="d-flex flex-grow-1">
                        <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
                        <div class="navbar-brand" href="#">
                            <p class="logo"></p>
                        </div>
                        
                        <div class="w-100 text-right">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </div>
          
                    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
                        <ul class="navbar-nav ml-auto flex-nowrap __navbar">
                                <!-- Authentication Link -->
                                @guest
                                    <li class="nav-item o_navitem">
                                      <a href="" class="" action="">Administrador</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                    </li>
                                @endif
                            @else
                         
                                
                            @endguest
    
                        </ul>
    
                    </div>
                    
                    </div>
                  </nav>
    </header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Desafio 2
                </a>
                <div class="d-flex __busqueda">
                    <form action="{{route('busqueda')}}" method="GET" class="d-flex form-inline">
                      <input class="form-control mr-sm-2" type="text" placeholder="Buscar pelicula" aria-label="Search" name="busqueda">
                      <button class="btn btn-dark my-2 my-sm-0 __buscar" type="submit">Buscar</button>
                      
                    </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="">
                                <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
