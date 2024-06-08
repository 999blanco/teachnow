<div class="modal fade defaultModal starsModal" id="reviews" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fa-solid fa-star me-1 text-primary"></i>
                    {{ $nuevaReseña ? 'Añadir valoración a ' : 'Valoraciones de' }} {{ $teacher->name }}</h3>
                @if ($nuevaReseña)
                    <button type="button" class="btn-close" wire:click="cancel"></button>
                @else
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                @endif
            </div>
            <div class="modal-body">
                @if ($nuevaReseña)
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input wire:model="name" type="text" placeholder="Introduzca su nombre"
                                    class="form-control dark" id="name" name="name">
                                @error('name')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input wire:model="email" type="email" placeholder="Introduzca su correo electrónico"
                                    class="form-control dark" id="email" name="email">
                                @error('email')
                                    <div class="mt-2">
                                        <span class="text-danger"> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Valora la experiencia</label>
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <button class="btn p-0 star" wire:mouseover="setHoverRating({{ $i }})"
                                    wire:mouseout="setHoverRating(0)" wire:click="setRating({{ $i }})">
                                    <i
                                        class="fa-solid fa-star {{ $i <= max($rating, $hoverRating) ? 'text-primary' : '' }}"></i>
                                </button>
                            @endfor
                            @error('rating')
                                <div class="mt-2">
                                    <span class="text-danger"> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Describe tu experiencia</label>
                        <textarea wire:model="content" class="form-control dark" id="content" rows="3"
                            placeholder="Describe tu experiencia con {{ $teacher->name }} (Max 500 caracteres)"></textarea>
                        @error('content')
                            <div class="mt-2">
                                <span class="text-danger"> {{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 mt-3" wire:click="store" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="store">Añadir valoración<i
                                class="ms-3 fa-solid fa-plus"></i></span>
                        <span wire:loading wire:target="store">Enviando<i class="ms-3 fa-solid fa-spinner"></i></span>
                    </button>
                @else
                    <div class="reviews-container">
                        <div class="inside">
                            <div class="row mb-3">
                                <div class="col-xl-8">
                                    <p class="mb-0">Puntuación de <span class="text-primary">{{ $teacher->reviews->avg('rating') == null ? '0.0' : number_format($teacher->reviews->avg('rating'), 1) }} / 5.0</span> de <span class="text-primary">{{ $reviews->count() }}</span> valoraciones</p>
                                </div>
                                <div class="col-xl-4 text-end">
                                    <button
                                        @if (!Auth::check() || (Auth::check() && Auth::user()->id != $teacher->id)) wire:click="$set('nuevaReseña', true)" @endif
                                        class="btn text-success p-0 text-capitalize"
                                        @if (Auth::check() && Auth::user()->id == $teacher->id) disabled @endif><i
                                            class="fa-solid fa-plus me-1"></i> Nueva</button>
                                </div>
                            </div>
                            @forelse($reviews as $review)
                                <div class="card card-primary p-2 {{ !$loop->last ? 'mb-4' : '' }}">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-black">{{ $review->name }}</h5>
                                        <div class="mb-2">
                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                <i class="fa-solid fa-star text-primary"></i>
                                            @endfor

                                            @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                                <i class="fa-solid fa-star text-light"></i>
                                            @endfor
                                            <span
                                                class="text-light ms-2">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-black fw-normal mb-0">{{ $review->content }}</p>
                                    </div>
                                </div>
                            @empty
                                @if (Auth::check() && Auth::user()->id == $teacher->id)
                                    <p class="mb-1"><i class="fa-solid fa-heart-crack text-danger me-2"></i>¡Aún no tienes ninguna valoracion!</p>
                                    <p class="text-light">Comparte tu perfil con tus alumnos y pide que valoren la experiencia que han tenido contigo.</p>
                                @else
                                    <p class="mb-1"><i class="fa-solid fa-heart-crack text-danger me-2"></i>¡{{ $teacher->name }} no tiene valoraciones aún!</p>
                                    <p class="text-light">Haz click en el botón "Nueva" para añadir una valoración.</p>
                                @endif
                            @endforelse
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
