<x-app-layout>
    @section('title', __('Valoraciones'))

    @section('content')
        <div class="title">
            <h1>{{ __("Valoraciones de los profesores particulares")}}</h1>
            <hr>
        </div>
        
        @livewire('reviews.review-list')
    @endsection
</x-app-layout>