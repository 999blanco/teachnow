<div class="modal fade defaultModal" id="contact" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Contacto y Precio') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Teléfono</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        <input wire:model="phone" type="text" class="form-control border-left-none" id="phone"
                            name="phone">
                    </div>
                    @error('phone')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Correo electrónico</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input wire:model="email" readonly type="text" class="form-control border-left-none" id="email"
                            name="email">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Precio por hora</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">€</span>
                        <input wire:model="price" type="text" class="form-control border-left-none" id="price"
                            name="price">
                    </div>
                    @error('price')
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
