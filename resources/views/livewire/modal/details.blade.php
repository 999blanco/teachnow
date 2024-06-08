<div class="modal fade defaultModal" id="details" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Información Personal') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Nombre</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text dark"><i class="fa-solid fa-user"></i></span>
                        <input wire:model="name" type="text" class="form-control dark border-left-none"
                            id="name" name="name">
                    </div>
                    @error('name')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text dark"><i class="fa-solid fa-pen-nib"></i></span>
                        <input wire:model="title" type="text" class="form-control dark border-left-none" placeholder="Profesor particular de Teachnow"
                            id="title" name="title">
                    </div>
                    @error('title')
                        <div class="mt-2">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="city" class="form-label">Ciudad</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text dark"><i class="fa-solid fa-location-dot"></i></span>
                                <input wire:model="city" type="text" class="form-control dark border-left-none" placeholder="Introduzca su ciudad"
                                    id="city" name="city">
                            </div>
                            @error('city')
                                <div class="mt-2">
                                    <span class="text-danger"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="region" class="form-label">Provincia</label>
                            <div class="dropdown">
                                <button id="region" class="btn btn-dropdown dark dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @if ($region != null)
                                        <img class="flag flag-small me-2" src="{{ Storage::url('regions/' . $region->flag) }}"
                                            alt="{{ $region->name }}-flag"> {{ $region->name }}
                                    @else
                                        {{ __('Seleccione su provincia') }}
                                    @endif
                                </button>
                                <ul class="dropdown-menu dark filter">
                                    @foreach ($regions as $region_data)
                                        <li>
                                            <button wire:click="setRegion({{ $region_data->id }})"
                                                class="dropdown-item {{ $region != null && $region_data->id == $region->id ? 'text-primary' : '' }}"
                                                type="button">
                                                <img class="flag flag-small me-2" src="{{ Storage::url("regions/" . $region_data->flag) }}"
                                                    height="20px" alt="{{ $region_data->name }}-flag">
                                                {{ $region_data->name }}
                                                {!! $region != null && $region_data->id == $region->id ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text dark text-primary"><i class="fa-brands fa-instagram"></i></span>
                                <input wire:model="social.instagram" type="text"
                                    class="form-control dark border-left-none" id="instagram" name="instagram">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text dark text-primary"><i class="fa-brands fa-linkedin"></i></span>
                                <input wire:model="social.linkedin" type="text"
                                    class="form-control dark border-left-none" id="linkedin" name="linkedin">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="mb-3">
                            <label for="github" class="form-label">Github</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text dark text-primary"><i class="fa-brands fa-github"></i></span>
                                <input wire:model="social.github" type="text"
                                    class="form-control dark border-left-none" id="github" name="github">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
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
