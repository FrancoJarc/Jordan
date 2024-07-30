<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Titulo', 'Jordan APP')</title>

    <meta name="description" content="@yield('description', 'Jordan de Nike es una pagina para comprar tus zapatillas favoritas')">
    <meta name="keywords" content="@yield('keywords', 'Jordan, Zapatillas, Nike, Sneakers, Comprar zapatillas')">
    <meta name="author" content="@yield('autor', 'Jordan')">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar">
        <div class="nav-logo">
            @if(Auth::check())
                @if(Auth::user()->is_vendedor)
                <a href="{{ route('productos.index') }}">
                    <img class="jordan-img-vendedor" src="{{ Storage::url('public/imagenes/jordanlogo.png') }}" alt="Jordan Logo" width="50" height="50">
                </a>
                @else
                <a href="{{ route('carrito.index') }}">
                    <img src="{{ Storage::url('public/imagenes/jordanlogo.png') }}" alt="Jordan Logo" width="50" height="50">
                </a>
                @endif
            @else
                <a href="{{ route('visitantes.index') }}">
                    <img src="{{ Storage::url('public/imagenes/jordanlogo.png') }}" alt="Jordan Logo" width="50" height="50" class="logo-visitante">
                </a>
            @endif
            </div>
            <div class="nav-actions">
                @if(Auth::check())
                    @if(!Auth::user()->is_vendedor)
                        <a class="nav-link" href="{{ route('carrito.show') }}">
                            <i class="bi bi-cart fs-4 text-dark"></i>
                        </a>
                    @endif
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
                </form>
                @else
                <a class="nav-link boton" aria-current="page" href="{{ route('register') }}">INICIAR SESION</a>
                @endif
            </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <footer class="footer">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <a href="#" class="footer-icon">
                    <i class="bi bi-x"></i>
                </a>
                <a href="https://www.instagram.com/jumpman23/" class="footer-icon mx-3">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://www.facebook.com/jumpman23?__tn__=%3C" class="footer-icon">
                    <i class="bi bi-facebook"></i>
                </a>
            </div>
        </div>
    </footer>
</body>


</html>