<section class="container-custom teachers-list">
    <div class="row mb-3">
        <div class="col-xl-6">
            <label class="form-label" for="search">Buscar profesor particular por nombre</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                <input type="text" class="form-control border-left-none" id="search" autocomplete="off"
                    name="search" placeholder="Escribe el nombre del profesor particular que buscas"
                    wire:model.live="search">
            </div>
        </div>
        <div class="col-xl-3">
            <label class="form-label" for="filter_by">Filtrar resultados</label>
            <div class="dropdown">
                <button id="filter_by" class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-filter me-2 text-primary"></i>
                    @switch($filter_by)
                        @case(1)
                            Profesores mejores valorados
                        @break
                    @endswitch
                </button>
                <ul class="dropdown-menu filter">
                    <li><button wire:click="$set('filter_by', 1)"
                            class="dropdown-item {{ $filter_by == 1 ? 'text-primary' : '' }}" type="button">Mejores
                            valorados {!! $filter_by == 1 ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>
                </ul>
            </div>
        </div>
        <div class="col-xl-3">
            <label class="form-label" for="order_by">Ordenar resultados</label>
            <div class="dropdown">
                <button id="order_by" class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-arrow-up-wide-short me-2 text-primary"></i>
                    @switch($order_by)
                        @case(1)
                            Ordenado alfabéticamente
                        @break
                    @endswitch
                </button>
                <ul class="dropdown-menu filter">
                    <li><button wire:click="$set('order_by', 1)"
                            class="dropdown-item {{ $order_by == 1 ? 'text-primary' : '' }}" type="button">Ordenado
                            alfabéticamente {!! $order_by == 1 ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row gy-4">
        @forelse ($teachers as $teacher)
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('teacher', $teacher->slug) }}">
                    <div class="card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 me-3">
                                <img class="avatar-small" src="{{ Storage::url('avatars/' . $teacher->avatar) }}"
                                    alt="">
                            </div>
                            <div class="flex-grow-1 mt-2">
                                <h5 class="mb-2">{{ $teacher->name }}</h5>
                                <p class="mb-3 fw-bold"><span class="text-primary"><i class="fa-solid fa-star me-1" style="color: orange"></i> {{ $teacher->reviews->avg('rating') == null ? '0.0' : number_format($teacher->reviews->avg('rating'), 1) }} / 5.0</span>
                                    de <span class="text-primary">{{ $teacher->reviews->count() }}</span> valoraciones</p>
                            </div>
                        </div>
                        <p><i class="fa-solid fa-location-dot text-primary me-2 mb-3"></i> {{ $teacher->city }},
                            {{ $teacher->region->name }}</p>
                        <p class="price">{{ number_format($teacher->price_per_hour, 2) }} € <span> / hora</span></p>
                        <p class="text-primary mb-0">Desplazamiento incluido</p>
                    </div>
                </a>
            </div>
        @empty
            @if ($search != null)
                <p class="fw-bold">¡No se han encontrado profesores particulares con esta búsqueda!</p>
            @else
                <p class="fw-bold">Lo sentimos, todavía no existen profesores particulares que impartan esta materia.
                </p>
            @endif
        @endforelse
    </div>
</section>
