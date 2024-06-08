<x-guest-layout>
    @section('title',  __("Registrarse como profesor particular en Teachnow"))

    @section('content')
    
    <section class="auth container-custom">
        <div class="card mx-auto mb-5" style="max-width: 750px">
            <h3><i class="fa-solid fa-right-to-bracket me-2 text-primary"></i> {{ __("Regístrate como profesor particular") }}</h3>
            <hr class="mb-4">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">{{ __("Nombre") }}</label>
                    <input autofocus type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __("Introduzca su nombre") }}" wire:model.defer="name">
                    @error('name')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">{{ __("Correo electrónico") }}</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __("Introduzca su correo electrónico") }}" wire:model.defer="email">
                    @error('email')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">{{ __("Contraseña") }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __("Introduzca una contraseña") }}" wire:model.defer="password">
                            @error('password')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">{{ __("Confirmar contraseña") }}</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="{{ __("Confirme su contraseña") }}" wire:model.defer="password_confirmation">
                            @error('password_confirmation')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" required type="checkbox" name="terms" id="terms-checkbox">
                    <label class="form-check-label" for="terms-checkbox">
                        {{ __("He leído y acepto la") }} <a target="_blank" class="btn-link" href="#">{{ __("Política de Privacidad") }}</a></a>.
                    </label>
                  </div>
                @error('terms')
                    <div class="mt-2">
                        <span class="text-danger"> {{ $message }}</span>
                    </div>
                @enderror

                <div class="row mt-4">
                    <div class="col-6 mt-2">
                        <a href="{{ route('login') }}" class="btn-link">{{ __("¿Ya tienes cuenta? Inicia sesión") }}</a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn btn-primary">{{ __("Registrarse") }} <i
                            class="ms-2 fa-solid fa-angles-right"></i></button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    @endsection
</x-guest-layout>