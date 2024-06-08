<main>
    <div class="card card-secondary">
        <div class="mb-3">
            <label for="title" class="form-label">Buscar materia por nombre</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                <input wire:model.live="search_by" type="text" placeholder="Introduzca el nombre de la materia"
                    class="form-control border-left-none" id="search_by" name="search_by">
            </div>
        </div>

        <div class="row">
            @forelse($regions as $region)
                <div class="col-xl-6">
                    <div class="card common-list fw-bold {{ !$loop->last ? 'mb-3' : '' }}">
                        <div class="row">
                            <div class="col-xl-10 d-flex align-items-center">
                                <img height="30px" class="rounded-pill me-3"
                                    src="{{ Storage::url('regions/' . $region->flag) }}"
                                    alt="{{ $region->name }}-flag">
                                <p class="mb-0">{{ $region->name }}</p>
                            </div>

                            <div class="col-xl-2 text-end">
                                <button wire:click="edit('{{ $region->id }}')" data-bs-toggle="modal"
                                    data-bs-target="#editregionModal" type="button" class="btn btn-secondary me-1"><i
                                        class="fa-solid fa-gear"></i></button>
                                <button wire:click="delete('{{ $region->id }}')" type="button"
                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="fw-bold text-light mt-2"><i class="fa-solid fa-heart-crack text-primary me-2"></i> ¡No se han
                    creado materias aún!</p>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade defaultModal" id="editregionModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fa-solid fa-book-open me-2 text-primary"></i>
                        {{ __('Modificar materia') }}</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="region_new_flag" class="form-label">Bandera</label>
                                <input wire:model="region_new_flag" class="form-control dark" type="file" id="region_new_flag">
                                @error('region_new_flag')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            @if ($region_new_flag != null)
                                <img class="rounded-circle mb-3" src="{{ $region_new_flag->temporaryUrl() }}"
                                    height="75px" width="75px" alt="preview">
                            @else
                                <img class="rounded-circle mb-3" src="{{ Storage::url('regions/' . $region_flag) }}"
                                    height="75px" width="75px" alt="{{ $region_name }}-flag">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="region_name" class="form-label">Nombre</label>
                        <input wire:model="region_name" type="text" class="form-control dark" id="region_name"
                            placeholder="Introduzca el nombre de la materia" autocomplete="off">
                        @error('region_name')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 mt-3" wire:click="update" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="update">{{ __('Modificar materia') }}<i
                                class="ms-3 fa-solid fa-book-open"></i></span>
                        <span wire:loading wire:target="update">{{ __('Modificando') }}<i
                                class="ms-3 fa-solid fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
