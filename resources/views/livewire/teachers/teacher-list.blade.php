<div>
    @if (session()->has('banned'))
        <div class="mb-3 alert alert-danger alert-dismissible fade show fw-bold" role="alert">
            <i class="me-2 fa-solid fa-circle-check"></i> {{ session('banned') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('unbanned'))
        <div class="mb-3 alert alert-success alert-dismissible fade show fw-bold" role="alert">
            <i class="me-2 fa-solid fa-circle-check"></i> {{ session('unbanned') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-secondary">
        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Buscar profesor por nombre</label>
                    <div class="input-group dark mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                        <input wire:model.live="search_by" type="text" placeholder="Introduzca el nombre del profesor" class="form-control border-left-none" id="search_by"
                            name="search_by">
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
                                Nombre ascedente
                                @break
                            @case(2)
                                Nombre descendente
                                @break
                            @default
                                Seleccione un orden
                        @endswitch
                    </button>
                    <ul class="dropdown-menu filter">
                        <li><button wire:click="$set('order_by', 1)"
                            class="dropdown-item {{ $order_by == 1 ? 'text-primary' : '' }}"
                            type="button">Nombre ascedente {!! $order_by == 1 ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>
    
                            <li><button wire:click="$set('order_by', 2)"
                                class="dropdown-item {{ $order_by == 2 ? 'text-primary' : '' }}"
                                type="button">Nombre descedente {!! $order_by == 2 ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>
                    </ul>
                </div>
            </div>
        </div>

        @forelse($teachers as $teacher)
            <div class="card common-list fw-bold {{ !$loop->last ? 'mb-3' : '' }}">
                <div class="row">
                    <div class="col-xl-1">
                        <p class="mb-0">ID: <span class="text-primary">{{ $teacher->id }}</span></p>
                    </div>
                    
                    <div class="col-xl-3">
                        <p class="mb-0"><i class="fa-solid fa-user me-2"></i> <span class="text-primary">{{ $teacher->name }}</span></p>
                    </div>
        
                    <div class="col-xl-3">
                        <p class="mb-0"><i class="fa-solid fa-envelope me-2"></i> <span class="text-primary">{{ $teacher->email }}</span></p>
                    </div>
        
                    <div class="col-xl-3">
                        <p class="mb-0"><i class="fa-solid fa-calendar-day me-2"></i> {{ $teacher->created_at }}</p>
                    </div>
        
                    <div class="col-xl-2 text-end">
                        <a class="btn btn-secondary me-1" target="_blank" href="{{ route('teacher', $teacher->slug) }}"><i class="fa-solid fa-eye"></i></a>
                        @if($teacher->banned)
                            <button wire:click="unban('{{ $teacher->id }}')" type="button" class="btn btn-success"><i
                                class="fa-solid fa-hands-praying"></i></button>
                        @else
                            <button wire:click="ban('{{ $teacher->id }}')" type="button" class="btn btn-danger"><i
                                class="fa-solid fa-ban"></i></button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            @if($search_by)
                <p class="fw-bold mt-2"><i class="fa-solid fa-heart-crack text-primary me-2"></i> ¡No se han encontrado profesores con el nombre {{ $search_by }}!</p>
            @else
                <p class="fw-bold mt-2"><i class="fa-solid fa-heart-crack text-danger me-2"></i>Todavía no existen profesores particulares.</p>    
            @endif
        @endforelse
    </div>
</div>
