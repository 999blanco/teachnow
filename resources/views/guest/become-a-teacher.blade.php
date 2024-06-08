<x-guest-layout>
    @section('title', __("Conviertete en profesor"))

    @section('content')
        <section class="container-custom default-header">
            <h1>¡Únete al equipo de profesores particulares de Teachnow!</h1>
        </section>

        @include('components.become-a-teacher')

        @livewire('general.reviews')
    @endsection
</x-guest-layout>
