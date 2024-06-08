<div class="modal fade defaultModal" id="aboutme" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Acerca de mi') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Acerca de mi (Max 500 palabras)</label>
                    <textarea wire:model="about_me" cols="30" rows="6" class="form-control dark" id="about_me" name="about_me" placeholder="Cuente a sus futuros alumnos quien es, a qué se decica, cuáles son sus aptitudes..."></textarea>
                    @error('about_me')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="text-end mt-4">
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
