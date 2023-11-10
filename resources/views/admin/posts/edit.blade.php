<x-admin-layout>
    {{ Breadcrumbs::render('posts.update', $post) }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Update Post') }}</h5>

            <form method="POST" action="{{ route('posts.update', $post) }}" class="row g-3"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- image --}}
                <div class="col-12 text-center">
                    <img
                        src="{{  $post->getFirstMediaUrl('post_images') ?: asset('storage/default-post-thumbnail.png') }}"
                        alt="post image" class="img-fluid" style="max-height: 250px; max-width:250px;">
                </div>

                {{-- title --}}
                <div class="col-12">
                    <label for="title" class="form-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title', $post->title) }}">
                    {{-- error --}}
                    <x-error name="title"/>

                </div>

                {{-- slug --}}
                <div class="col-12">
                    <label for="slug" class="form-label">{{ __('Slug') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $post->slug) }}"
                           disabled>
                    {{-- error --}}
                    <x-error name="slug"/>
                </div>

                {{-- content --}}
                <div class="col-12">
                    <label for="content" class="form-label">{{ __('Content') }}<span
                            class="text-danger">*</span></label>
                    <textarea name="content" id="content"
                              class="form-control">{{ old('content', $post->content) }}</textarea>
                    {{-- error --}}
                    <x-error name="content"/>
                </div>

                {{-- category --}}
                <div class="col-12">
                    <label for="category_id" class="form-label">{{ __('Category') }}<span
                            class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control">
                        @forelse ($categories as $category)
                            <option
                                value="{{ $category->id }}" @selected($category->id == $post->category->id )>{{ $category->name }}</option>
                        @empty
                            <option value="">{{ __('No Category Available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="category_id"/>
                </div>

                {{-- tags--}}
                <div class="col-12">
                    <label for="tags" class="form-label">{{ __('Tags') }}<span class="text-danger">*</span></label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @forelse ($post->tags as $tag)
                            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                        @empty
                            <option value="">{{ __('No tags Available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="tags"/>
                </div>

                {{--post image--}}
                <div class="col-12">
                    <label for="image" class="form-label">{{ __('Image') }}</label>
                    <input type="file" name="image" id="image" class="form-control">
                    {{-- error --}}
                    <x-error name="image"/>
                </div>

                {{-- status --}}
                <div class="col-12">
                    <label for="status" class="form-label">{{ __('Status') }}<span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control">
                        <option value="draft" @selected($post->status == 'draft')> {{ __('Draft') }} </option>
                        <option value="published" @selected($post->status == 'published')>
                            {{ __('Published') }}</option>
                    </select>
                    {{-- error --}}
                    <x-error name="status"/>
                </div>

                <!-- published at -->
                {{--                <div class="col-12">--}}
                {{--                    <label for="published_at" class="form-label">{{ __('published At') }}<span--}}
                {{--                            class="text-danger">*</span></label>--}}
                {{--                    <input type="text" class="form-control" id="published_at"--}}
                {{--                           value="{{ $post->published_at ?: Null }}" disabled>--}}
                {{--                    --}}{{-- error --}}
                {{--                    <x-error name="published_at"/>--}}
                {{--                </div>--}}

                <!-- view count -->
                <div class="col-12">
                    <label for="views_count" class="form-label">{{ __('Views') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="views_count" value="{{ $post->views_count }}" disabled>
                    {{-- error --}}
                    <x-error name="views_count"/>
                </div>

                <!-- comments_enabled -->
                <div class="col-12">
                    <label for="comments_enabled" class="form-label">{{ __('Comments') }}<span
                            class="text-danger">*</span></label>
                    <select name="comments_enabled" id="comments_enabled" class="form-control">
                        <option value="enabled" @selected($post->enabled == 'enabled')>{{ __('Enabled') }}</option>
                        <option value="disabled" @selected($post->disabled == 'disabled' )>{{ __('Disabled') }}</option>
                    </select>
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
                @can('post update')
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Update') }}</button>
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
