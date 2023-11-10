<x-admin-layout>
    {{ Breadcrumbs::render('categories.edit', $category) }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Edit Category') }}</h5>

            <form method="POST" action="{{ route('categories.update', $category) }}" class="row g-3">
                @csrf

                @method('PUT')
                {{-- name --}}
                <div class="col-12">
                    <label for="name" class="form-label fw-bold">{{ __('Category Name') }}</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
                </div>

                {{-- slug --}}
                <div class="col-12">
                    <label for="slug" class="form-label fw-bold">{{ __('Slug') }}</label>
                    <input type="slug" name="slug" class="form-control" id="slug" value="{{ $category->slug }}"
                           disabled>
                    <small
                        class="form-text text-muted">{{ __('This is updated automatically according to name') }}</small>
                </div>

                {{-- description at --}}
                <div class="col-12">
                    <label for="description" class="form-label fw-bold">{{ __('Description') }}</label>
                    <input type="text" name="description" class="form-control" id="description"
                           value="{{ $category->description ?: '' }}">
                </div>

                {{-- created at --}}
                <div class="col-12">
                    <label for="created_at" class="form-label fw-bold">{{ __('Created At') }}</label>
                    <input type="text" class="form-control" id="created_at"
                           value="{{ $category->created_at->format('d-m-Y h:m:s A') ?: '' }}">
                </div>
                @can('category update')
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Update') }}</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>
</x-admin-layout>
