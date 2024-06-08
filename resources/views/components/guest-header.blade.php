<div>
    <div class="container-custom"
        style="background: #0078b9;
    background: linear-gradient(180deg, #0078b9 0%, #004a72 100%); color: #fff!important;">
        <div class="row py-2">
            <div class="col-6">
                <a href="#" class="text-white me-2"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="text-white me-2"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="text-white me-2"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#" class="text-white me-2"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            <div class="col-6 text-end">
                @auth
                    <a class="text-white fw-bold dropdown-toggle text-decoration-none" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @role('Administrator')
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                        class="fa-solid fa-chart-pie me-2"></i> Panel de control</a></li>
                        @else
                            <li><a class="dropdown-item {{ request()->routeIs('teacher') ? 'text-primary' : '' }}"
                                    href="{{ route('teacher', auth()->user()->slug) }}"
                                    href="{{ route('teacher', auth()->user()->slug) }}"><i
                                        class="fa-solid fa-user-tie me-2"></i> Mi perfil</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('security') ? 'text-primary' : '' }}"
                                    href="{{ route('security') }}"><i class="fa-solid fa-lock me-2"></i> Seguridad</a></li>
                        @endrole
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();"><i
                                        class="fa-solid fa-right-from-bracket me-2"></i> Cerrar sesión</a></li>
                        </form>
                    </ul>
                @else
                    <a href="{{ route('login') }}" class="text-white fw-bold">Acceso Profesores<i
                            class="fa-solid fa-right-to-bracket ms-2"></i></a>
                @endauth
            </div>
        </div>
    </div>
    <nav id="navigation" class="navbar navbar-expand-xl">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ Storage::url('logos/logo.png') }}" height="37.5px" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link home-mt {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">{{ __('Inicio') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('subjects', 'subject') ? 'active' : '' }}"
                            href="{{ route('subjects') }}">{{ __('Encuentra tu profesor') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('become-a-teacher') ? 'active' : '' }}"
                            href="{{ route('become-a-teacher') }}">{{ __('Conviértete en profesor') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('help') ? 'active' : '' }}"
                            href="{{ route('help') }}">{{ __('Ayuda') }}</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="modal"
                                data-bs-target="#locationModal">
                                <img src="{{ Storage::url('regions/' . session('user_region')->flag) }}" class="flag"
                                    alt="{{ session('user_region')->name }}-flag">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
