<main>
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
    
    <div class="card card-secondary">
        <div class="mb-3">
            <label for="title" class="form-label">Buscar materia por nombre</label>
            <div class="input-group dark mb-3">
                <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                <input wire:model.live="search_by" type="text" placeholder="Introduzca el nombre de la materia" class="form-control border-left-none" id="search_by"
                    name="search_by">
            </div>
        </div>
        <div class="row">
            @forelse($subjects as $subject)
                <div class="col-xl-6">
                    <div class="card common-list fw-bold {{ !$loop->last ? 'mb-3' : '' }}">
                        <div class="row">
                            <div class="col-xl-10 d-flex align-items-center">
                                <img height="30px" class="me-3"
                                    src="{{ Storage::url('subjects/' . $subject->image) }}" alt="{{ $subject->name }}-image">
                                <p class="mb-0">{{ $subject->name }}</p>
                            </div>
    
                            <div class="col-xl-2 text-end">
                                <button wire:click="edit('{{ $subject->id }}')" data-bs-toggle="modal"
                                    data-bs-target="#editSubjectModal" type="button" class="btn btn-secondary me-1"><i
                                        class="fa-solid fa-gear"></i></button>
                                <button wire:click="delete('{{ $subject->id }}')" type="button" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i></button>
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
    <div class="modal fade defaultModal" id="editSubjectModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
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
                                <label for="subject_new_image" class="form-label">Imagen</label>
                                <input wire:model="subject_new_image" class="form-control dark" type="file" id="subject_new_image">
                                @error('subject_new_image')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            @if ($subject_new_image != null)
                                <img class="mb-3" src="{{ $subject_new_image->temporaryUrl() }}"
                                    height="75px" width="75px" alt="preview">
                            @else
                                <img class="mb-3"
                                    src="{{ Storage::url('subjects/' . $subject_image) }}" height="75px"
                                    width="75px" alt="{{ $subject_name }}-logo">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subject_name" class="form-label">Nombre</label>
                        <input wire:model="subject_name" type="text" class="form-control dark" id="subject_name"
                            placeholder="Introduzca el nombre de la materia" autocomplete="off">
                        @error('subject_name')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 mt-3" wire:click="update"
                        wire:loading.attr="disabled">
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
