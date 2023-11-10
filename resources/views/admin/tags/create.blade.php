<x-admin-layout>

    {{ Breadcrumbs::render('tags.create') }}


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Create New Tag') }}</h5>

            <form method="POST" action="{{ route('tags.store') }}" class="row g-3">
                @csrf
                {{-- name --}}
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Tag Name') }}</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                {{-- description at --}}
                <div class="col-12">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <input type="text" name="description" class="form-control" id="description">
                </div>

                @can('tag create')
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Create') }}</button>
                    </div>
                @endcan
            </form>

        </div>
    </div>


</x-admin-layout>
