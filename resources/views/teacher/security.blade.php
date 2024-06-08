<x-guest-layout>
    @section('title', __('Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje.'))

    @section('content')
        <section class="container-custom settings">
            <h1>Seguridad de cuenta</h1>
            <div class="row">
               {{--  <div class="col-xl-6">
                    @livewire('profile.update-profile-information-form')
                </div> --}}
                <div class="col-xl-6">
                    @livewire('profile.update-password-form')
                </div>
            </div>
        </section>
    @endsection
</x-guest-layout>
