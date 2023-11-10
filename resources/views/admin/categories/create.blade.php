<x-admin-layout>

    {{ Breadcrumbs::render('categories.create') }}


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Create New Category') }}</h5>

            <form method="POST" action="{{ route('categories.store') }}" class="row g-3">
                @csrf
                {{-- name --}}
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Category Name') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" required>

                </div>

                {{-- description at --}}
                <div class="col-12">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <input type="text" name="description" class="form-control" id="description">
                </div>

                @can('category create')
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Create') }}</button>
                    </div>
                @endcan
            </form>

        </div>
    </div>


</x-admin-layout>
