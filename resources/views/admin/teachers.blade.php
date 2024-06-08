<x-app-layout>
    @section('title', __('Profesores particulares'))

    @section('content')
        <div class="title">
            <h1>{{ __("Profesores particulares")}}</h1>
            <hr>
        </div>

        @livewire('teachers.teacher-list')
        
    @endsection
</x-app-layout>