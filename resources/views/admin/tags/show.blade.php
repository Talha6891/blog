<x-admin-layout>

    {{ Breadcrumbs::render('tags.show', $tag) }}


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Show Tag') }}</h5>

            <form class="row g-3">

                {{-- name --}}
                <div class="col-12">
                    <label for="name" class="form-label fw-bold">{{ __('Tag Name') }}</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $tag->name }}"
                           readonly>
                </div>

                {{-- slug --}}
                <div class="col-12">
                    <label for="slug" class="form-label fw-bold">{{ __('Slug') }}</label>
                    <input type="slug"name="slug" class="form-control" id="slug" value="{{ $tag->slug }}"
                           readonly>
                </div>

                {{-- description at --}}
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">{{ __('Description') }}</label>
                    <input type="text" name="description" class="form-control" id="description"
                           value="{{ $tag->description ?: '' }}" readonly>
                </div>

                {{-- created at --}}
                <div class="col-12">
                    <label for="created_at" class="form-label fw-bold">{{ __('Created At') }}</label>
                    <input type="text" class="form-control" id="created_at"
                           value="{{ $tag->created_at->format('d-M-Y  h:i:s A') ?: '' }}" readonly>
                </div>

            </form>

        </div>
    </div>


</x-admin-layout>
