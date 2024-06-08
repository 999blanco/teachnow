<div class="modal fade defaultModal" id="subjects" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Materias') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold text-light">Añada a su perfil las materias que desea impartir a sus futuros alumnos.</p>
                <div class="mb-4">
                    <label for="title" class="form-label">Buscar materias</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text dark"><i class="fa-solid fa-search"></i></span>
                        <input wire:model.live="search" placeholder="Buscar materias por nombre" type="text"
                            class="form-control border-left-none dark" id="search" name="search" autocomplete="off">
                    </div>
                </div>

                <div class="row">
                    @foreach ($subjects as $subject)
                        <div class="col-xl-6">
                            <div role="button"
                                @if (in_array($subject->id, $user_categories)) 
                                    wire:click="removeSubject({{ $subject->id }})"
                                @else
                                    wire:click="addSubject({{ $subject->id }})" 
                                @endif>
                                <div
                                    class="card p-3 mb-4 {{ in_array($subject->id, $user_categories) ? 'bg-success' : '' }}">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <img height="40px" src="{{ Storage::url('subjects/' . $subject->image) }}" alt="{{ $subject->image }}-image">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mt-2 text-black fw-bold">{{ $subject->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="dark-pagination mt-3">
                        {{ $subjects->links() }}
                    </div>
                </div>

                <div class="text-end mt-2">
                    <button class="btn btn-primary" wire:click="save" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="save">{{ __('Guardar') }}<i
                                class="ms-3 fa-solid fa-floppy-disk"></i></span>
                        <span wire:loading wire:target="save">{{ __('Guardando') }}<i
                                class="ms-3 fa-solid fa-spinner"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
