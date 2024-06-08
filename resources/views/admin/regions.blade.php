<x-app-layout>
    @section('title', __('Provincias'))

    @section('content')
        @livewire('regions.add-region')
        @livewire('regions.region-list')
    @endsection
</x-app-layout>