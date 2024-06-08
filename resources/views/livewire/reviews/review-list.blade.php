<div>
    @if (session()->has('deleted'))
        <div class="mb-3 alert alert-danger alert-dismissible fade show fw-bold" role="alert">
            <i class="me-2 fa-solid fa-circle-check"></i> {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-secondary">
        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Buscar valoraciones</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                        <input wire:model.live="search_by" type="text"
                            placeholder="Introduzca algun dato sobre la valoración" class="form-control border-left-none"
                            id="search_by" name="search_by">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <label class="form-label" for="order_by">Ordenar por:</label>
                <div class="dropdown">
                    <button id="order_by" class="btn btn-dropdown dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-filter me-2 text-primary"></i>
                        @switch($order_by)
                            @case(1)
                                Valoraciones mas positivas
                            @break

                            @case(2)
                                Valoraciones mas negativas
                            @break

                            @default
                                Seleccione un orden
                        @endswitch
                    </button>
                    <ul class="dropdown-menu filter">
                        <li><button wire:click="$set('order_by', 1)"
                                class="dropdown-item {{ $order_by == 1 ? 'text-primary' : '' }}"
                                type="button">Valoraciones
                                mas positivas {!! $order_by == 1 ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>

                        <li><button wire:click="$set('order_by', 2)"
                                class="dropdown-item {{ $order_by == 2 ? 'text-primary' : '' }}"
                                type="button">Valoraciones
                                más negativas {!! $order_by == 2 ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($reviews as $review)
                <div class="col-xl-4">
                    <div class="card card-primary p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="fw-bold">{{ $review->name }}</h5>
                                </div>
                                <div class="col-2 text-end">
                                    <button wire:click="delete({{ $review->id }})" class="btn text-danger p-0"><i
                                            class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="mb-2">
                                @for ($i = 1; $i <= $review->rating; $i++)
                                    <i class="fa-solid fa-star text-primary"></i>
                                @endfor

                                @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                    <i class="fa-solid fa-star text-light"></i>
                                @endfor
                                <span class="text-light ms-2">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mb-2 fw-bold">Profesor: <a class="btn-link"
                                    href="{{ route('teacher', $review->user->slug) }}">{{ $review->user->name }}</a></p>
                            <p class="card-text">{{ $review->content }}</p>
                        </div>
                    </div>
                </div>
            @empty
                @if ($search_by)
                    <p class="fw-bold mt-4"><i class="fa-solid fa-heart-crack text-primary me-2"></i> ¡No se han
                        encontrado valoraciones con esta búsqueda!</p>
                @else
                    <p class="fw-bold mt-4"><i class="fa-solid fa-heart-crack text-danger me-2"></i>Todavía no existen
                        valoraciones.</p>
                @endif
            @endforelse
        </div>
    </div>
</div>
