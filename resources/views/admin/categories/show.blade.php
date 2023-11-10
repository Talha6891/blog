<x-admin-layout>

    {{ Breadcrumbs::render('categories.show', $category) }}


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Show Category') }}</h5>

            <form class="row g-3">

                {{-- name --}}
                <div class="col-12">
                    <label for="name" class="form-label fw-bold">{{ __('Category Name') }}</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}"
                           disabled>
                </div>

                {{-- slug --}}
                <div class="col-12">
                    <label for="slug" class="form-label fw-bold">{{ __('Slug') }}</label>
                    <input type="slug" name="slug" class="form-control" id="slug"
                           value="{{ $category->slug }}" disabled>
                </div>

                {{-- description at --}}
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">{{ __('Description') }}</label>
                    <input type="text" name="description" class="form-control" id="description"
                           value="{{ $category->description ?: '' }}" disabled>
                </div>

                {{-- created by --}}
                <div class="col-12">
                    <label for="created_at" class="form-label fw-bold">{{ __('Created By') }}</label>
                    <input type="text" class="form-control" id="created_at" value="{{ $category->user->name ?: '' }}"
                           disabled>
                </div>

                {{-- created at --}}
                <div class="col-12">
                    <label for="created_at" class="form-label fw-bold">{{ __('Created At') }}</label>
                    <input type="text" class="form-control" id="created_at"
                           value="{{ $category->created_at->format('d-M-Y h:i:s A') ?: '' }}"
                           disabled>
                </div>

            </form>

        </div>
    </div>


</x-admin-layout>
