<x-guest-layout>
    @section('title', __("Profesores en " . $user_region->name . " que imparten " . $subject->name))

    @section('content')
        <section class="container-custom default-header">
            <h1>{{ $total_teachers }} {{ $total_teachers > 1 ? 'profesores particulares' : 'profesor particular' }} de {{ $subject->name }} en {{ $user_region->name }}</h1>
        </section>

        @livewire('general.teachers', ['subject' => $subject, 'region' => $user_region])

        @include('components.how-it-works')
    @endsection
</x-guest-layout>
