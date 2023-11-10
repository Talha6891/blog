<x-admin-layout>
    {{ Breadcrumbs::render('posts.create') }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Create New Post') }}</h5>

            <form method="POST" action="{{ route('posts.store') }}" class="row g-3" enctype="multipart/form-data">
                @csrf
                <!-- name -->
                <div class="col-12">
                    <label for="title" class="form-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" id="title" required>
                    {{-- error --}}
                    <x-error name="title"/>
                </div>

                <!-- content -->
                <div class="col-12">
                    <label for="content" class="form-label">{{ __('Content') }}<span
                            class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control" cols="10" rows="1"></textarea>
                    {{-- error --}}
                    <x-error name="content"/>
                </div>

                <!-- category -->
                <div class="col-12">
                    <label for="category_id" class="form-label">{{ __('Category') }}<span
                            class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="" selected>{{ __('Select a Category') }}</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">{{ __('No category Available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="category_id"/>
                </div>

                {{-- tags --}}
                <div class="col-12">
                    <label for="tags" class="form-label">{{ __('Tags') }}</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @forelse ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @empty
                            <option value="">{{ __('No tags Available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="tags"/>
                </div>

                <!-- post image -->
                <div class="col-12">
                    <label for="image" class="form-label">{{ __('Image') }}</label>
                    <input type="file" name="image" id="image" class="form-control">
                    {{-- error --}}
                    <x-error name="image"/>
                </div>

                <!-- status -->
                <div class="col-12">
                    <label for="status" class="form-label">{{ __('Status') }}</label>
                    <select name="status" id="status" class="form-control">
                        <option value="draft" selected>{{ __('Draft') }}</option>
                        <option value="published">{{ __('Published') }}</option>
                    </select>
                    {{-- error --}}
                    <x-error name="status"/>
                </div>

                <!-- comments enabled/disabled -->
                <div class="col-12">
                    <label for="comments_enabled" class="form-label">{{ __('Comments') }}</label>
                    <select name="comments_enabled" id="comments_enabled" class="form-control">
                        <option value="enabled" selected>{{ __('Enabled') }}</option>
                        <option value="disabled">{{ __('Disabled') }}</option>
                    </select>
                    {{-- error --}}
                    <x-error name="comments_enabled"/>
                </div>
                @can('post create')
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Create') }}</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>

    @push('scripts')
        <x-tinymice-config/>
        <script>
            $(document).ready(function () {
                $('#tags').select2({
                    tags: true,
                    tokenSeparators: [',', ' ']
                });
            });
        </script>
    @endpush

</x-admin-layout>
