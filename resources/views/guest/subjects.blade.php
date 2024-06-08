<x-guest-layout>
    @section('title', 'Encuentra tu profesor particular en tu provincia')

    @section('content')
        <section class="container-custom default-header">
            <h1>Encuentra tu profesor particular ideal en tu provincia</h1>
        </section>
        @livewire('general.subjects')
        @include('components.how-it-works')

        @if (session('success'))
            <div class="toast-container">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto"><i class="fa-solid fa-location text-primary me-2"></i> Localización</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Ahora puedes ver los profesores particulares activos en tu nueva localización.
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
                    var toastList = toastElList.map(function(toastEl) {
                        return new bootstrap.Toast(toastEl)
                    })
                    toastList.forEach(toast => toast.show());
                });
            </script>
        @endif
    @endsection
</x-guest-layout>
