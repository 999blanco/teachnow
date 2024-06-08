<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Teachnow - @yield('title')</title>
    <meta name="og:title" content="Teachnow - @yield('title')">

    <link rel="icon" type="image/png" href="{{ Storage::url('logos/logo.png') }}">

    <meta name="description"
        content="Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje. Encuentra a tu mentor perfecto y alcanza tu máximo potencial académico con nuestra plataforma.">
    <meta name="og:description"
        content="Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje. Encuentra a tu mentor perfecto y alcanza tu máximo potencial académico con nuestra plataforma.">

    <meta property="og:type" content="website">
    <meta name="theme-color" content="#0078b9">
    <meta property="og:site_name" content="teachnow.es">

    <meta name="og:image" content="{{ Storage::url('logos/signature.png') }}">
    <meta name="og:image:width" content="700">
    <meta name="og:image:height" content="200">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script src="https://kit.fontawesome.com/484893fcc1.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <div>
                    <h5 class="mt-0 user">👋 Hola, <span class="text-danger">{{ auth()->user()->name }}</span></h5>
                    <hr class="mt-2 mb-2">
                    <h5 class="mt-3">{{ __('General') }}</h5>
                    <a href="{{ route('admin.dashboard') }}"
                        class="list-group-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-pie me-3 text-primary"></i><span>{{ __('Panel de control') }}</span>
                    </a>
                    <a href="{{ route('admin.subjects') }}"
                        class="list-group-item {{ request()->routeIs('admin.subjects') ? 'active' : '' }}">
                        <i class="fas fa-book-open me-3 text-primary"></i><span>{{ __('Materias') }}</span>
                    </a>
                    <a href="{{ route('admin.teachers') }}"
                        class="list-group-item {{ request()->routeIs('admin.teachers') ? 'active' : '' }}">
                        <i
                            class="fas fa-graduation-cap me-3 text-primary"></i><span>{{ __('Profesores particulares') }}</span>
                    </a>
                    <a href="{{ route('admin.reviews') }}"
                        class="list-group-item {{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                        <i class="fas fa-star me-3 text-primary"></i><span>{{ __('Valoraciones') }}</span>
                    </a>
                    <a href="{{ route('admin.regions') }}"
                        class="list-group-item {{ request()->routeIs('admin.regions') ? 'active' : '' }}">
                        <i class="fas fa-city me-3 text-primary"></i><span>{{ __('Provincias') }}</span>
                    </a>
                </div>

                <div>
                    <h5 class="mt-3">{{ __('Cuenta') }}</h5>
                    <a href="{{ route('admin.settings') }}"
                        class="list-group-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <i class="fas fa-gear me-3 text-primary"></i><span>{{ __('Configuración') }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="list-group-item text-danger"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">
                            <i class="fas fa-right-from-bracket me-3"></i><span>{{ __('Cerrar sesión') }}</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- Navigation Bar --}}
    <nav id="navigation" class="navbar app-navbar navbar-expand-xl fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasNavbar"
                aria-controls="offCanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="me-2 mb-1" src="{{ Storage::url('logos/logo.png') }}" height="35px" alt="logo">
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offCanvasNavbar">
                <div class="offcanvas-header">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="me-2 mb-1" src="{{ Storage::url('logos/logo.png') }}" height="35px"
                            alt="logo">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav app-navbar flex-grow-1 pe-3">
                        <div class="list-group list-group-flush">
                            <div>
                                <h5 class="user mt-0">👋 Hola, <span
                                        class="text-danger">{{ auth()->user()->name }}</span></h5>
                                <hr class="mt-2 mb-2">
                                <h5 class="mt-3">{{ __('General') }}</h5>
                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                        <i
                                            class="fas fa-chart-pie me-3 text-primary"></i><span>{{ __('Panel de control') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.subjects') }}"
                                        class="nav-link {{ request()->routeIs('admin.subjects') ? 'active' : '' }}">
                                        <i
                                            class="fas fa-book-open me-3 text-primary"></i><span>{{ __('Materias') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.teachers') }}"
                                        class="nav-link {{ request()->routeIs('admin.teachers') ? 'active' : '' }}">
                                        <i
                                            class="fas fa-graduation-cap me-3 text-primary"></i><span>{{ __('Profesores particulares') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.reviews') }}"
                                        class="nav-link {{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                                        <i
                                            class="fas fa-star me-3 text-primary"></i><span>{{ __('Valoraciones') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.regions') }}"
                                        class="nav-link {{ request()->routeIs('admin.regions') ? 'active' : '' }}">
                                        <i
                                            class="fas fa-city me-3 text-primary"></i><span>{{ __('Provincias') }}</span>
                                    </a>
                                </li>
                            </div>

                            <div>
                                <h5 class="mt-3">{{ __('Cuenta') }}</h5>
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings') }}"
                                        class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                                        <i class="fas fa-gear me-3 text-primary"></i><span>{{ __('Configuración') }}</span>
                                    </a>
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="nav-link text-danger"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i
                                                class="fas fa-right-from-bracket me-3"></i><span>{{ __('Cerrar sesión') }}</span>
                                        </a>
                                    </li>
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- Main layout -->
    <main class="auth-panel-data">
        <div class="container-auth-panel">
            @yield('content')
        </div>
    </main>

    @stack('modals')

    @stack('scripts')
    <script type="module">
        $(function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
    @livewireScripts
</body>

</html>
