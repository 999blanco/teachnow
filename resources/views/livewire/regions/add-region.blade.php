<div>
    <div class="title mb-3">
        <div class="row">
            <div class="col-xl-6">
                <h1>{{ __('Provincias') }}</h1>
                <hr>
            </div>
            <div class="col-xl-6 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRegionModal">Añadir provincia</button>
            </div>
        </div>
    </div>

    @if (session()->has('created') || session()->has('updated'))
        <div class="mb-3 alert alert-success alert-dismissible fade show fw-bold" role="alert">
            <i class="me-2 fa-solid fa-circle-check"></i> {{ session('created') }} {{ session('updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('deleted'))
        <div class="mb-3 alert alert-danger alert-dismissible fade show fw-bold" role="alert">
            <i class="me-2 fa-solid fa-circle-check"></i> {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade defaultModal" id="addRegionModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fa-solid fa-city me-2 text-primary"></i>
                        {{ __('Añadir provincia') }}</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="flag" class="form-label">Bandera</label>
                                <input wire:model="flag" class="form-control dark" type="file" id="flag">
                                @error('flag')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            @if ($flag != null)
                                <img class="rounded-circle mb-3" src="{{ $flag->temporaryUrl() }}"
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
                            placeholder="Introduzca el nombre de la provincia" autocomplete="off">
                        @error('name')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 mt-3" wire:click="create"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="create">{{ __('Añadir provincia') }}<i
                                class="ms-3 fa-solid fa-city"></i></span>
                        <span wire:loading wire:target="create">{{ __('Añadiendo') }}<i
                                class="ms-3 fa-solid fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
