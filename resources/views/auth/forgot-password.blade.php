<x-guest-layout>
    @section('title', __('Forgot password'))

    @section('content')

        <section class="auth container-custom">
            <div class="card mx-auto mb-5" style="max-width: 500px">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h3 class="text-primary mt-2">{{ __('¿Ha olvidado su contraseña?') }}</h3>
                <hr class="mb-4">
                <p class="text-light">
                    {{ __('No hay problema, tan solo introduzca su correo electrónico en el siguiente formulario y le haremos llegar un email con la información para reestablecer su contraseña.') }}
                </p>


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">{{ __('Correo electrónico') }}</label>
                        <input autofocus type="text" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="{{ __('Introduzca su correo electrónico') }}">
                        @error('email')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="text-end mt-4 mb-1">
                        <button type="submit" class="btn btn-primary">{{ __('Recuperar contraseña') }}<i
                                class="ms-2 fa-solid fa-angles-right"></i></button>
                    </div>
                </form>
            </div>
        </section>
    @endsection
</x-guest-layout>
