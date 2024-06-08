<div class="modal fade defaultModal" id="locationModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-location me-2 text-primary"></i>
                    {{ __('Localización') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="region" class="form-label">Provincia</label>
                    <div class="dropdown">
                        <button id="region" class="btn btn-dropdown dark dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if ($user_region != null)
                                <img class="flag flag-small me-2" src="{{ Storage::url('regions/' . $user_region->flag) }}"
                                    alt="{{ $user_region->name }}-flag"> {{ $user_region->name }}
                            @else
                                {{ __('Seleccione una provincia') }}
                            @endif
                        </button>
                        <ul class="dropdown-menu dark filter">
                            @foreach ($regions as $region)
                                <li><button wire:click="setRegion({{ $region->id }})"
                                        class="dropdown-item {{ $user_region->name == $region->name ? 'text-primary' : '' }}"
                                        type="button"><img class="flag flag-small me-2" src="{{ Storage::url("regions/" . $region->flag) }}"
                                            height="20px" alt="{{ $region->name }}-flag"> {{ $region->name }}
                                        {!! $user_region->name == $region->name ? '<i class="fa-solid fa-check-double ms-2"></i>' : '' !!}</button></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">País</label>
                    <button id="country" class="btn btn-dropdown dark dropdown-toggle" type="button" disabled>
                        Spain
                    </button>
                </div>
                <button class="btn btn-primary mt-2 w-100" wire:click="update" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="update">{{ __('Guardar') }}<i
                            class="ms-3 fa-solid fa-floppy-disk"></i></span>
                    <span wire:loading wire:target="update">{{ __('Guardando') }}<i
                            class="ms-3 fa-solid fa-spinner"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>
