<div>
    <div class="alert alert-success fw-bold" role="alert" x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => { clearTimeout(timeout);
        shown = true;
        timeout = setTimeout(() => { shown = false }, 2000); })"
        x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms
        style="display: none;">
        <i class="me-2 fa-solid fa-user-check"></i> {{ __('Contraseña modificada con éxito') }}
    </div>
    <div class="card card-secondary mb-3">
        <div class="card-h">
            <h3><i class="fa-solid fa-lock text-primary me-2"></i> {{ __('Cambiar contraseña') }}</h3>
            <hr>
        </div>
        <p class="text-light fw-bold">{{ __('Aquí puedes cambiar tu contraseña actual por una nueva, para ello sólo tienes que rellenar el formulario indicando tu contraseña actual y la nueva contraseña.') }}
        </p>
        <form wire:submit.prevent="updatePassword">
            @csrf
            <div class="mb-3">
                <label for="current_password" class="form-label fw-bold">{{ __('Contraseña actual') }}</label>
                <input wire:model.defer="state.current_password" autocomplete="name" type="password"
                    class="form-control @error('current_password')is-invalid @enderror" name="current_password"
                    id="current_password" placeholder="Introduzca su contraseña actual">
                @error('current_password')
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>
    
            <div class="row">
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">{{ __('Nueva contraseña') }}</label>
                        <input wire:model.defer="state.password" type="password"
                            class="form-control @error('password')is-invalid @enderror" name="state.password"
                            id="state.password" placeholder="Introduzca su nueva contraseña">
                    </div>
                    @error('password')
                        <div class="mt-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-bold">{{ __('Confirmar contraseña') }}</label>
                        <input wire:model.defer="state.password_confirmation" type="password"
                            class="form-control @error('password_confirmation')is-invalid @enderror"
                            name="password_confirmation" id="password_confirmation" placeholder="Confirma tu contraseña">
                    </div>
                </div>
            </div>
    
            <div class="text-end mt-2">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="updatePassword">{{ __('Guardar') }} <i
                            class="ms-2 fa-solid fa-floppy-disk"></i></i></span>
                    <span wire:loading wire:target="updatePassword"><i class="me-2 fa-solid fa-spinner"></i>
                        {{ __('Guardando') }} <i class="ms-2 fa-solid fa-floppy-disk"></i></i></span>
                </button>
            </div>
        </form>
    </div>
</div>
