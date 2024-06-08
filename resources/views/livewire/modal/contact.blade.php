<div class="modal fade defaultModal" id="contact" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Contacto y Precio') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text dark"><i class="fa-solid fa-phone"></i></span>
                        <input wire:model="phone" type="text" class="form-control dark border-left-none" id="phone"
                            name="phone" placeholder="Introduzca su número de teléfono">
                    </div>
                    @error('phone')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text dark"><i class="fa-solid fa-envelope"></i></span>
                        <input wire:model="email" type="email" class="form-control dark border-left-none"
                            id="email" name="email" placeholder="Introduzca su correo electrónico">
                    </div>
                    @error('email')
                    <div class="mt-2">
                        <span class="text-danger"> {{ $message }}</span>
                    </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="price_per_hour" class="form-label">Precio por hora</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text dark">€</span>
                        <input wire:model="price_per_hour" type="number" min="0" class="form-control dark border-left-none"
                            id="price_per_hour" name="price_per_hour">
                    </div>
                    @error('price_per_hour')
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
