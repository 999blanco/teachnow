<x-app-layout>
    @section('title', __('Materias'))

    @section('content')
        @livewire('subjects.add-subject')
        @livewire('subjects.subject-list')
    @endsection
</x-app-layout>