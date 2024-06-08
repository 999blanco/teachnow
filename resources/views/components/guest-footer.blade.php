<footer class="container-custom footer">
    <div class="row">
        <div class="col-xl-4">
            <div class="mb-3">
                <a class="navbar-brand" href="/">
                    <img class="me-2" src="{{ Storage::url('logos/logo.png') }}" height="37.5px" alt="logo">
                    Teachnow
                </a>
            </div>
            <p>Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje.</p>
        </div>
        <div class="col-xl-2"></div>
        <div class="col-xl-3">
            <div class="mt-2">
                <a class="btn-link" href="/">Inicio</a>
                <a class="btn-link" href="{{ route('subjects') }}">Encuentra tu profesor</a>
                <a class="btn-link" href="{{ route('become-a-teacher') }}">Conviértete en profesor</a>
                <a class="btn-link" href="{{ route('help') }}">Ayuda</a>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="mt-2">
                <a class="btn-link" href="#">Política de privacidad</a>
                <a class="btn-link" href="#">Aviso Legal</a>
                <a class="btn-link" href="#">Política de Cookies</a>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <div class="row">
        <div class="col-7">
            <p>2024 © <span class="text-primary">Teachnow</span></p>
        </div>
        <div class="col-5 text-end">
            <p>W ❤️ by <span class="text-primary">David Blanco</span></p>
        </div>
    </div>
</footer>
