<x-guest-layout>
    @section('title', __('¿Necesitas ayuda? ¡Ponte en contacto con nosotros!'))

    @section('content')
        <section class="container-custom default-header">
            <h1>¿Necesitas ayuda? ¡Ponte en contacto con nosotros!</h1>
        </section>

        @livewire('general.contact')

        @include('components.how-it-works')
    @endsection
</x-guest-layout>
