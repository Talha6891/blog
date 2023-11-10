<x-admin-layout>

    {{ Breadcrumbs::render('posts.show', $post) }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Show Post') }}</h5>

            <form class="row g-3">

                {{-- image --}}
                <div class="col-12 text-center">
                    <img src="{{ $post->getFirstMediaUrl('post') ?: asset('storage/default-post-thumbnail.png') }}"
                         alt="post image" class="img-fluid" style="max-height: 250px;">
                </div>

                <!-- title -->
                <div class="col-12">
                    <label for="title" class="form-label">{{ __('Title') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title', $post->title) }}" disabled>
                    {{-- error --}}
                    <x-error name="title"/>

                </div>

                {{-- slug --}}
                <div class="col-12">
                    <label for="slug" class="form-label">{{ __('Slug') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" name="slug" id="title" class="form-control"
                           value="{{ old('slug', $post->slug) }}" disabled>
                    {{-- error --}}
                    <x-error name="slug"/>
                </div>

                <!-- content -->
                <div class="col-12">
                    <label for="content" class="form-label">{{ __('Content') }}<span
                            class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control"
                              disabled>{{ old('content', $post->content) }}</textarea>
                    {{-- error --}}
                    <x-error name="content"/>
                </div>

                <!-- category -->
                <div class="col-12">
                    <label for="category_id" class="form-label">{{ __('Category') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $post->category->name }}" disabled>
                    {{-- error --}}
                    <x-error name="category_id"/>
                </div>

                <!-- tags -->
                <div class="col-12">
                    <label for="tags" class="form-label">{{ __('Tags') }}<span class="text-danger">*</span></label>
                    <select name="tags[]" id="tags" class="form-control" multiple disabled>
                        @forelse ($post->tags as $tag)
                            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                        @empty
                            <option value="">{{ __('No tags Available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="tags"/>
                </div>

                <!-- status -->
                <div class="col-12">
                    <label for="status" class="form-label">{{ __('Status') }}<span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control" readonly disabled>
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                            {{ __('Draft') }}</option>
                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>
                            {{ __('Published') }}</option>
                    </select>
                    {{-- error --}}
                    <x-error name="status"/>
                </div>

                <!-- published at -->
                <div class="col-12">
                    <label for="published_at" class="form-label">{{ __('published At') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $post->published_at ?? 'Not Published yet' }}"
                           disabled>
                    {{-- error --}}
                    <x-error name="published_at"/>
                </div>

                <!-- view count -->
                <div class="col-12">
                    <label for="views_count" class="form-label">{{ __('Views') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $post->views_count }}" disabled>
                    {{-- error --}}
                    <x-error name="views_count"/>
                </div>

                <!-- comments_enabled -->
                <div class="col-12">
                    <label for="comments_enabled" class="form-label">{{ __('Comments') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $post->comments_enabled }}" disabled>
                    {{-- error --}}
                    <x-error name="comments_enabled"/>
                </div>

                <!-- created by -->
                <div class="col-12">
                    <label for="user_id" class="form-label">{{ __('Created By') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $post->user->name ?? 'No name available' }}"
                           disabled>
                    {{-- error --}}
                    <x-error name="user_id"/>
                </div>

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
