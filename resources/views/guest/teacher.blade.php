<x-guest-layout>
    @section('title', __('Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje.'))

    @section('content')
        <section class="container-custom teacher">
            @if ($teacher->banned)
                <div class="mb-3 alert alert-danger fade show fw-bold" role="alert">
                    <i class="me-2 fa-solid fa-ban"></i> Este profesor particular ha sido baneado.
                </div>
            @else
            @endif
            @if (session()->has('success'))
                <div class="mb-3 alert alert-success alert-dismissible fade show fw-bold" role="alert">
                    <i class="me-2 fa-solid fa-circle-check"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Auth::check() && Auth::user()->id == $teacher->id)
                {{-- Si el usuario no ha rellenado su información de perfil, se le mostrará un mensaje de advertencia. --}}
                @if (
                    $teacher->city == null ||
                        $teacher->region == null ||
                        $teacher->phone == null ||
                        $teacher->about_me == null ||
                        $teacher->education == null ||
                        $teacher->subjects->count() == 0 ||
                        $teacher->price_per_hour == null ||
                        $teacher->social == null ||
                        $teacher->avatar == null ||
                        $teacher->banner == null)
                    <div class="mb-3 alert alert-warning fade show fw-bold" role="alert">
                        <i class="me-2 fa-solid fa-warning"></i> ¡Por favor, completa toda información de perfil para
                        que los alumnos puedan contactarte!

                    </div>
                @endif
            @endif
            <div class="row g-5">
                <div class="col-xl-8">
                    <div class="card card-main">
                        @if (Auth::check() && Auth::user()->id == $teacher->id)
                            <a type="button" data-bs-toggle="modal" data-bs-target="#banner">
                                <img class="card-img-top banner" src="{{ Storage::url('banners/' . $teacher->banner) }}"
                                    alt="banner">
                            </a>
                        @else
                            <img class="card-img-top banner" src="{{ Storage::url('banners/' . $teacher->banner) }}"
                                alt="banner">
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    @if (Auth::check() && Auth::user()->id == $teacher->id)
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#pfp">
                                            <img class="avatar" src="{{ Storage::url('avatars/' . $teacher->avatar) }}"
                                                alt="avatar">
                                        </a>
                                    @else
                                        <img class="avatar" src="{{ Storage::url('avatars/' . $teacher->avatar) }}"
                                            alt="avatar">
                                    @endif
                                </div>
                                <div class="col-4 text-end social-links">
                                    @php
                                        $social = json_decode($teacher->social, true);
                                    @endphp
                                    @if ($social['instagram'] != null)
                                        <a class="btn-link ms-2" target="_blank"
                                            href="https://instagram.com/{{ $social['instagram'] }}" class="me-2"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    @endif
                                    @if ($social['linkedin'] != null)
                                        <a class="btn-link ms-2" target="_blank"
                                            href="https://linkedin.com/in/{{ $social['linkedin'] }}" class="me-2"><i
                                                class="fa-brands fa-linkedin"></i></a>
                                    @endif
                                    @if ($social['github'] != null)
                                        <a class="btn-link ms-2" target="_blank"
                                            href="https://github.com/{{ $social['github'] }}" class="me-2"><i
                                                class="fa-brands fa-github"></i></a>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-11">
                                    <h3>{{ $teacher->name }} <img class="me-1" height="20px"
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Twitter_Verified_Badge.svg/1200px-Twitter_Verified_Badge.svg.png"
                                            alt="verified"></h3>
                                </div>
                                <div class="col-1 text-end mt-2">
                                    @if (Auth::check() && Auth::user()->id == $teacher->id)
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#details"
                                            class="text-primary"><i class="fa-solid fa-edit"></i></a>
                                    @endif
                                </div>
                            </div>
                            <p class="title">
                                {{ $teacher->title != null ? $teacher->title : 'Profesor particular en Teachnow' }}</p>
                            <p class="location"><i class="fa-solid fa-location-dot text-primary me-2"></i>
                                {{ $teacher->city != null ? $teacher->city . ', ' : '' }}
                                {{ $teacher->region != null ? $teacher->region->name . ', ' : '' }}
                                {{ $teacher->country }}</p>

                            <div class="card card-secondary mb-4">
                                <div class="row">
                                    <div class="col-11">
                                        <h5>Acerca de mi</h5>
                                    </div>
                                    <div class="col-1 text-end">
                                        @if (Auth::check() && Auth::user()->id == $teacher->id)
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#aboutme"
                                                class="text-primary"><i class="fa-solid fa-edit"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <p class="mb-0">
                                    {{ $teacher->about_me != null ? $teacher->about_me : 'Todavía no se ha asignado información acerca de ' . $teacher->name }}
                                </p>
                            </div>

                            <div class="card card-secondary mb-4">
                                <div class="row">
                                    <div class="col-11">
                                        <h5>Educación</h5>
                                    </div>
                                    <div class="col-1 text-end">
                                        @if (Auth::check() && Auth::user()->id == $teacher->id)
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#education"
                                                class="text-primary"><i class="fa-solid fa-edit"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <hr>

                                @php
                                    $education = json_decode($teacher->education, true);
                                    if ($education == null) {
                                        $education = [];
                                    }
                                @endphp

                                @forelse($education as $education_item)
                                    <div class="card p-4 fw-bold {{ !$loop->last ? 'mb-4' : '' }}">
                                        <h5 class="text-primary">{{ $education_item['degree'] }}</h5>
                                        <p class="text-light mb-0">{{ $education_item['year'] }} -
                                            {{ $education_item['school'] }}</p>
                                    </div>
                                @empty
                                    <p>Todavía no se ha asignado información acerca de los estudios de {{ $teacher->name }}
                                    </p>
                                @endforelse


                            </div>

                            <div class="card card-secondary">
                                <div class="row">
                                    <div class="col-11">
                                        <h5>Materias</h5>
                                    </div>
                                    <div class="col-1 text-end">
                                        @if (Auth::check() && Auth::user()->id == $teacher->id)
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#subjects"
                                                class="text-primary"><i class="fa-solid fa-edit"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-4">
                                    @forelse ($teacher->subjects as $subject)
                                        <div class="col-md-6">
                                            <div class="card p-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <img height="40px"
                                                            src="{{ Storage::url('subjects/' . $subject->image) }}"
                                                            alt="{{ $subject->name }}-image">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="mt-2">{{ $subject->name }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Todavía no se ha asignado información acerca de las materias que imparte
                                            {{ $teacher->name }}</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-11">
                                <h5>¡Contáctame!</h5>
                            </div>
                            <div class="col-1 text-end">
                                @if (Auth::check() && Auth::user()->id == $teacher->id)
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#contact"
                                        class="text-primary"><i class="fa-solid fa-edit"></i></a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        @if ($teacher->phone != null)
                            <p class="mb-2 fw-bold"><i class="fa-solid fa-phone text-primary me-2"></i>
                                {{ $teacher->phone }}</p>
                        @endif
                        <p class="fw-bold"><i class="fa-solid fa-envelope text-primary me-2"></i> {{ $teacher->email }}
                        </p>
                        <div class="card py-3 px-4 card-secondary fw-bold mt-1">
                            <p class="price mb-0">{{ number_format($teacher->price_per_hour, 2) }} € <span> / hora</span>
                            </p>
                            <p class="text-primary mb-0">Desplazamiento incluido</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="row">
                            <div class="col-11">
                                <h5>Valoraciones</h5>
                            </div>
                            <div class="col-1 text-end">
                                @if (Auth::check() && Auth::user()->id == $teacher->id)
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#reviews"
                                        class="text-primary"><i class="fa-solid fa-edit"></i></a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <p class="mb-3 fw-bold"><span class="text-primary"><i class="fa-solid fa-star me-1"
                                    style="color: orange"></i>
                                {{ $teacher->reviews->avg('rating') == null ? '0.0' : number_format($teacher->reviews->avg('rating'), 1) }}
                                / 5.0</span>
                            de <span class="text-primary">{{ $teacher->reviews->count() }}</span> valoraciones</p>

                        @forelse($teacher->reviews->sortByDesc('created_at')->take(3) as $review)
                            <div class="card card-secondary p-2 {{ !$loop->last ? 'mb-4' : '' }}">
                                <div class="card-body">
                                    <h5 class="fw-bold text-black">{{ $review->name }}</h5>
                                    <div class="mb-2">
                                        @for ($i = 1; $i <= $review->rating; $i++)
                                            <i class="fa-solid fa-star text-primary"></i>
                                        @endfor

                                        @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                            <i class="fa-solid fa-star text-light"></i>
                                        @endfor
                                        <span class="text-light ms-2">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-black fw-normal mb-0">{{ $review->content }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="fw-bold"><i
                                    class="fa-solid fa-heart-crack text-danger me-2"></i>¡{{ $teacher->name }} no tiene
                                valoraciones aún!</p>
                        @endforelse

                        @if (Auth::check() && Auth::user()->id == $teacher->id)
                            <button type="button" data-bs-toggle="modal" data-bs-target="#reviews"
                                class="btn btn-primary w-100 mt-3">Ver mis valoraciones</button>
                        @else
                            @if ($teacher->reviews->count() != 0)
                                <button type="button" data-bs-toggle="modal" data-bs-target="#reviews"
                                    class="btn btn-secondary w-100 mt-3">Ver todas <i
                                        class="fa-solid fa-eye ms-2"></i></button>
                            @else
                                <button type="button" data-bs-toggle="modal" data-bs-target="#reviews"
                                    class="btn btn-primary w-100 mt-3">Valorar profesor</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @if (Auth::check() && Auth::user()->id == $teacher->id)
            @livewire('modal.profile-avatar', ['teacher' => $teacher])
            @livewire('modal.profile-banner', ['teacher' => $teacher])
            @livewire('modal.details', ['teacher' => $teacher])
            @livewire('modal.about-me', ['teacher' => $teacher])
            @livewire('modal.education', ['teacher' => $teacher])
            @livewire('modal.subjects')
            @livewire('modal.contact', ['teacher' => $teacher])
        @endif
        @livewire('modal.reviews', ['teacher' => $teacher])
    @endsection
</x-guest-layout>
