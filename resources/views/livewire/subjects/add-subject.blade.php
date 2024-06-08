<div>
    <div class="title mb-3">
        <div class="row">
            <div class="col-xl-6">
                <h1>{{ __('Materias') }}</h1>
                <hr>
            </div>
            <div class="col-xl-6 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectsModal">Añadir materia</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade defaultModal" id="addSubjectsModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fa-solid fa-book-open me-2 text-primary"></i>
                        {{ __('Añadir materia') }}</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen</label>
                                <input wire:model="image" class="form-control dark" type="file" id="image">
                                @error('image')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            @if ($image != null)
                                <img class="rounded-circle mb-3" src="{{ $image->temporaryUrl() }}"
                                    height="75px" width="75px" alt="preview">
                            @else
                                <img class="rounded-circle mb-3"
                                    src="https://teachnow.es/storage/avatars-vouches/default.png" height="75px"
                                    width="75px" alt="default">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input wire:model="name" type="text" class="form-control dark" id="name"
                            placeholder="Introduzca el nombre de la materia" autocomplete="off">
                        @error('name')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 mt-3" wire:click="create"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="create">{{ __('Añadir materia') }}<i
                                class="ms-3 fa-solid fa-book-open"></i></span>
                        <span wire:loading wire:target="create">{{ __('Añadiendo') }}<i
                                class="ms-3 fa-solid fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
