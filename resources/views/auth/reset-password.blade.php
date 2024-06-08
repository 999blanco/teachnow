<x-guest-layout>
    @section('title', __('Reestablecer contraseña'))

    @section('content')

        <section class="auth container-custom">

            <div class="card mx-auto mb-5" style="max-width: 500px">
                @if (session('status'))
                    <div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h3 class="text-primary mt-2">{{ __('Reestablecer contraseña') }}</h3>
                <hr class="mb-4">

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

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

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">{{ __('Contraseña') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="{{ __('Introduzca su contraseña') }}">
                        @error('password')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation"
                            class="form-label fw-bold">{{ __('Confirmar contraseña') }}</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation"
                            placeholder="{{ __('Confirme su contraseña') }}">
                        @error('password_confirmation')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="text-end mt-4 mb-1">
                        <button type="submit" class="btn btn-primary">{{ __('Reestablecer contraseña') }}<i
                                class="ms-2 fa-solid fa-angles-right"></i></button>
                    </div>
                </form>
            </div>
        </section>
    @endsection
</x-guest-layout>
