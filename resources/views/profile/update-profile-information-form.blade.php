<div>
    <div class="alert alert-success fw-bold" role="alert" x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => { clearTimeout(timeout);
        shown = true;
        timeout = setTimeout(() => { shown = false }, 2000); })"
        x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms
        style="display: none;">
        <i class="me-2 fa-solid fa-user-check"></i> {{ __('Información personal guardada con éxito') }}
    </div>
    <div class="card card-secondary mb-3">
        <div class="card-h">
            <h3><i class="fa-solid fa-user-edit text-primary me-2"></i> {{ __('Información personal') }}</h3>
            <hr>
        </div>
        
        <p class="text-light fw-bold">{{ __('Hola') }} <span class="text-primary">{{ auth()->user()->name }}</span>,
            {{ __('tu nombre y email se muestran aquí, puedes modificar tu información personal cuando desees.') }}
        </p>
    
        <form wire:submit.prevent="updateProfileInformation">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold">{{ __('Nombre') }}</label>
                <input wire:model.defer="state.name" autocomplete="name" type="text"
                    class="form-control @error('name')is-invalid @enderror" name="nombre" id="nombre">
                @error('name')
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">{{ __('Correo electrónico') }}</label>
                <input wire:model.defer="state.email" type="email"
                    class="form-control @error('email')is-invalid @enderror" name="email" id="email">
                @error('email')
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="updateProfileInformation">{{ __('Guardar') }} <i
                            class="ms-2 fa-solid fa-floppy-disk"></i></i></span>
                    <span wire:loading wire:target="updateProfileInformation"><i class="me-2 fa-solid fa-spinner"></i>
                        {{ __('Guardando') }} <i class="ms-2 fa-solid fa-floppy-disk"></i></i></span>
                </button>
            </div>
        </form>
    
    </div>
</div>

