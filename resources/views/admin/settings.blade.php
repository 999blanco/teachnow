<x-app-layout>
    @section('title', __('Configuracion'))

    @section('content')
        <div class="title">
            <h1>{{ __("Configuracion")}}</h1>
            <hr>
        </div>

        <div class="row">
            <div class="col-xl-6">
                @livewire('profile.update-profile-information-form')
            </div>
            <div class="col-xl-6">
                @livewire('profile.update-password-form')
            </div>
        </div>
    @endsection
</x-app-layout>