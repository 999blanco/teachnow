<section id="subjects" class="container-custom subjects-list">
    <h3 class="mb-3">¿Que materia quieres aprender?</h3>
    <div class="row mb-3">
        <div class="col-xl-7">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                <input type="text" class="form-control border-left-none" id="search" autocomplete="off"
                    name="search"
                    placeholder="Quiero aprender... ¿Inglés? ¿Español? ¿Desarrollo Web? ¿Programación? ¿Cocina?"
                    wire:model.live="search">
            </div>
        </div>
        <div class="col-xl-5">
            <div class="input-group mb-3">
                <span class="input-group-text"><img src="{{ Storage::url('regions/' . $user_region->flag) }}"
                        class="flag flag-small" alt="{{ $user_region->name }}-flag"></span>
                <input type="text" class="form-control border-left-none" id="region" name="region" disabled
                    value="Profesores particulares en {{ $user_region->name }}, España">
                <button class="btn-input-group text-primary border-left-none" type="button" data-bs-toggle="modal"
                    data-bs-target="#locationModal"><i class="fa-solid fa-edit"></i></button>
            </div>
        </div>
    </div>
    <div class="row gy-4">
        @forelse ($subjects as $subject)
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('subject', $subject->slug) }}">
                    <div class="card">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-4">
                                <img height="47.5px" src="{{ Storage::url('subjects/' . $subject->image) }}"
                                    alt="{{ $subject->name }}-image">
                            </div>
                            <div class="flex-grow-1">
                                <h5>{{ $subject->name }}</h5>
                                <p>{{ $subject->teachers->where('region.id', $user_region->id)->count() }} profesores
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            @if ($search != null)
                <p class="fw-bold">¡No se han encontrado materias para aprender con esta búsqueda!</p>
            @else
                <p class="fw-bold">Lo sentimos, todavía no existen materias para aprender.</p>
            @endif
        @endforelse

        {{-- Pagination --}}
        <div class="light-pagination mt-3">
            {{ $subjects->links() }}
        </div>
    </div>
</section>
