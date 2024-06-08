<x-guest-layout>
    @section('title', __('Iniciar sesión en Teachnow'))

    @section('content')

        <section class="auth container-custom">
            <div class="card mx-auto login">
                <h3><i class="fa-solid fa-right-to-bracket me-2 text-primary"></i> {{ __('Iniciar sesión') }}</h3>
                <hr class="mb-4">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">{{ __('Correo electrónico') }}</label>
                        <input autofocus type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="{{ __('Introduzca su correo electrónico') }}"
                            wire:model.defer="email">
                        @error('email')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">{{ __('Contraseña') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="{{ __('Introduzca su contraseña') }}" wire:model.defer="password">
                        @error('password')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    {{ __('Recuérdame') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('password.request') }}" class="btn-link">{{ __('¿Olvidaste tu contraseña?') }}</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-4 mb-1">{{ __('Iniciar sesión') }}</button>
                </form>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="btn-link">{{ __('¿Aún no tienes cuenta? Regístrate') }}</a>
            </div>

        </section>
    @endsection
</x-guest-layout>
