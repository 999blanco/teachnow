<div class="modal fade defaultModal" id="education" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Educacion') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body education-modal">
                <p class="fw-bold text-light">Añada a su perfil los estudios que ha cursado o que está cursando.</p>
                @switch($currentAction)
                    @case('create')
                        <div class="card p-4 mb-3">
                            <h5>Añada sus estudios</h5>
                            <hr>
                            <div class="mb-3">
                                <label for="new_degree" class="form-label">Título</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-light"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input wire:model="new_degree" type="text" placeholder="Introduzca el nombre del curso" class="form-control border-left-none"
                                        id="new_degree" name="new_degree">
                                </div>
                                @error('new_degree')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="mb-3">
                                        <label for="new_school" class="form-label">Universidad / Centro de Estudio</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text text-light"><i class="fa-solid fa-school"></i></span>
                                            <input wire:model="new_school" type="text" placeholder="Introduzca el nombre del centro de estudio" class="form-control border-left-none"
                                                id="new_school" name="new_school">
                                        </div>
                                        @error('new_school')
                                            <div class="mt-2">
                                                <span class="text-danger"> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="new_year" class="form-label">Año de finalización</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text text-light"><i
                                                    class="fa-solid fa-calendar-day"></i></span>
                                            <input wire:model="new_year" type="text" placeholder="2024" class="form-control border-left-none"
                                                id="new_year" name="new_year">
                                        </div>
                                        @error('new_year')
                                            <div class="mt-2">
                                                <span class="text-danger"> {{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-6">
                                <button class="btn btn-secondary" wire:click="$set('currentAction', 'show')">
                                    Cancelar
                                </button>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-primary" wire:click="store" wire:loading.attr="disabled">
                                    <span wire:loading.remove wire:target="store">{{ __('Crear') }}<i
                                            class="ms-3 fa-solid fa-floppy-disk"></i></span>
                                    <span wire:loading wire:target="store">{{ __('Creando') }}<i
                                            class="ms-3 fa-solid fa-spinner"></i></span>
                                </button>
                            </div>
                        </div>
                    @break

                    @case('show')
                        <button class="btn btn-success mb-3" wire:click="$set('currentAction', 'create')">
                            Añadir educación<i class="ms-3 fa-solid fa-plus"></i>
                        </button>
                        @forelse($education as $index => $education_item)
                        <div class="card p-2 mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <h5>{{ $education_item['degree'] }}</h5>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button wire:click="edit({{ $index }})" class="btn p-0 text-light me-2"><i class="fa-solid fa-edit"></i></button>
                                            <button wire:click="delete({{ $index }})" class="btn p-0 text-danger"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <p>{{ $education_item['year'] }} - {{ $education_item['school'] }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="mt-3">Todavía no ha asignado sus estudios.</p>
                        @endforelse
                        <div class="text-end mt-4">
                            <button class="btn btn-primary" wire:click="close" wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="close">{{ __('Guardar') }}<i
                                        class="ms-3 fa-solid fa-floppy-disk"></i></span>
                                <span wire:loading wire:target="close">{{ __('Guardando') }}<i
                                        class="ms-3 fa-solid fa-spinner"></i></span>
                            </button>
                        </div>
                    @break

                    @case('edit')
                    <div class="card p-4 mb-3">
                        <h5>Editar mis estudios</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Título</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-light"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input wire:model="degree" type="text" class="form-control border-left-none"
                                    id="degree" name="degree">
                            </div>
                            @error('degree')
                                <div class="mt-2">
                                    <span class="text-danger"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="mb-3">
                                    <label for="school" class="form-label">Universidad / Centro de Estudio</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-light"><i class="fa-solid fa-school"></i></span>
                                        <input wire:model="school" type="text" class="form-control border-left-none"
                                            id="school" name="school">
                                    </div>
                                    @error('school')
                                        <div class="mt-2">
                                            <span class="text-danger"> {{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="year" class="form-label">Año de finalización</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-light"><i
                                                class="fa-solid fa-calendar-day"></i></span>
                                        <input wire:model="year" type="text" class="form-control border-left-none"
                                            id="year" name="year">
                                    </div>
                                    @error('year')
                                        <div class="mt-2">
                                            <span class="text-danger"> {{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <button class="btn btn-secondary" wire:click="$set('currentAction', 'show')">
                                Cancelar
                            </button>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-primary" wire:click="store" wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="store">{{ __('Guardar') }}<i
                                        class="ms-3 fa-solid fa-floppy-disk"></i></span>
                                <span wire:loading wire:target="store">{{ __('Guardando') }}<i
                                        class="ms-3 fa-solid fa-spinner"></i></span>
                            </button>
                        </div>
                    </div>
                    @break

                @endswitch
            </div>
        </div>
    </div>
</div>
