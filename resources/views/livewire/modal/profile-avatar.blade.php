<div class="modal fade defaultModal" id="pfp" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-edit me-2 text-primary"></i>
                    {{ __('Imagen') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4 mt-3">
                    <img class="avatar" src="{{ Storage::url('avatars/' . $avatar) }}" alt="avatar">
                </div>

                @error('avatar')
                    <div class="mt-3 text-center">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror

                <input wire:model="avatar" style="display:none" id="file-avatar-input" type="file" accept="image/*">
                <button onclick="selectAvatar()" class="btn btn-primary w-100 mb-2 mt-4">Subir imágen</button>
                <button wire:click="resetAvatar" class="btn btn-secondary w-100 mb-2 mt-2">Eliminar imágen</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function selectAvatar() {
            let fileInput = document.getElementById("file-avatar-input");
            fileInput.click();
        }
    </script>
@endpush
