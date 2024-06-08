<x-guest-layout>
    @section('title', __('Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje.'))

    @section('content')
        <section class="container-custom home-home">
            <div class="row">
                <div class="col-xl-6">
                    <span class="preview">¡Bienvenido a Teachnow!</span>
                    <h1>Encuentra a tu <span class="text-primary">profesor particular</span> ideal <span
                            class="text-primary">en tu ciudad</span></h1>
                    <p>Descubre una red de profesores particulares en tu área listos para impulsar tu
                        aprendizaje. Encuentra a tu mentor perfecto y alcanza tu máximo potencial académico con nuestra
                        plataforma.</p>
                    <a href="{{ route('subjects') }}" class="btn btn-primary me-3">Encontrar profesores <i
                            class="fa-solid fa-angles-down ms-2"></i></a>
                    <a href="{{ route('become-a-teacher') }}" class="btn btn-secondary">Ser profesor <i
                            class="fa-solid fa-angles-right ms-2"></i></a>
                </div>
                <div class="col-xl-1">

                </div>
                <div class="col-xl-5 text-end">
                    <dotlottie-player src="https://lottie.host/ccb12fa3-6280-4901-b40e-b8ac76c8c488/lmBiQ8Cfa2.json"
                        background="transparent" speed="1" loop autoplay></dotlottie-player>
                </div>
            </div>
        </section>


        @livewire('general.subjects')

        @include('components.how-it-works')

        @include('components.become-a-teacher')

        @livewire('general.reviews')

        @push('scripts')
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        @endpush
    @endsection
</x-guest-layout>
