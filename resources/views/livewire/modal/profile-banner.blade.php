<div class="modal fade defaultModal" id="banner" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Banner') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4 mt-3">
                    <img class="banner" src="{{ Storage::url('banners/' . $banner) }}" alt="banner">
                </div>

                @error('banner')
                    <div class="mt-3 text-center">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror

                <input wire:model="banner" style="display:none" id="file-banner-input" type="file" accept="image/*">
                <button onclick="selectBanner()" class="btn btn-primary w-100 mb-2 mt-4">Subir banner</button>
                <button wire:click="resetBanner" class="btn btn-secondary w-100 mb-2 mt-2">Eliminar banner</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function selectBanner() {
            let fileInput = document.getElementById("file-banner-input");
            fileInput.click();
        }
    </script>
@endpush
