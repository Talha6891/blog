<x-admin-layout>
    {{ Breadcrumbs::render('posts.index') }}

    {{-- success message --}}
    @if (Session::has('message'))
        <x-message/>
    @endif

    {{-- table section --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Post Data') }}</h5>

                        <div class="d-flex justify-content-between align-items-center text-center mb-3">
                            <div>
                                {{-- create post button --}}
                                @can('post create')
                                    <a href="{{ route('posts.create') }}" class="btn btn-outline-primary  ">
                                        <i class="bi bi-plus"></i> {{ __('New Post') }}
                                    </a>
                                @endcan

                                {{-- refresh button --}}
                                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary  ml-2">
                                    <i class="bi bi-arrow-repeat"></i> {{ __('Refresh') }}
                                </a>
                            </div>

                            {{-- search record form --}}
                            <form action="{{ route('posts.index') }}" method="GET" class="form-inline">
                                <div class="input-group input-group">
                                    <input type="text" name="search" class="form-control"
                                           placeholder="{{ __('Search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col">#{{ __('ID') }}</th>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Slug') }}</th>
                                <th scope="col">{{ __('Category') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Post Views ') }}</th>
                                <th scope="col">{{ __('Published At ') }}</th>
                                <th scope="col">{{ __('Created By') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">

                            @forelse ($posts as $post)
                                <tr>
                                    {{-- id --}}
                                    <th scope="row">{{ $post->id }}</th>

                                    {{-- title --}}
                                    <td>
                                        {{ Str::limit($post->title, 10) }}
                                    </td>

                                    {{-- slug --}}
                                    <td>{{ Str::limit($post->slug, 10) }}</td>

                                    {{-- category --}}
                                    <td>{{ $post->category->name }}</td>

                                    {{-- status --}}
                                    <td>{{ $post->status }}</td>

                                    {{-- post views --}}
                                    <td>{{ $post->views_count }}</td>

                                    {{-- published at --}}
                                    <td>{{ $post->published_at ?: 'NULL' }}</td>

                                    <td>{{ $post->user->name ?: '' }}</td>

                                    {{-- created at --}}
                                    <td>{{ $post->created_at->diffForHumans() ?: '' }}</td>

                                    {{-- Actions --}}
                                    <td class="d-flex">
                                        @can('post show')
                                            <a href="{{ route('posts.show', $post) }}"
                                               class="btn btn-success btn-sm "><i class="bi bi-eye"></i>
                                            </a>
                                        @endcan
                                        @can('post update')
                                            <a href="{{ route('posts.edit', $post) }}"
                                               class="btn btn-primary btn-sm mx-2"><i class="bi bi-pencil"></i>
                                            </a>
                                        @endcan

                                        @can('category delete')
                                            <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                                  id="deleteForm{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="sweetAlertDelete('deleteForm{{ $post->id }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-danger fw-bold">
                                        {{ __('No records are available.') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <!-- Entries per page dropdown -->

                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div>
                                <label for="entriesPerPage">{{ __('Entries per page:') }}</label>
                                <select id="entriesPerPage" class="form-select-sm"
                                        onchange="changeEntriesPerPage(this)">
                                    <option value="5" @selected($posts->perPage() == 10)>10</option>
                                    <option value="10" @selected($posts->perPage() == 20)>20</option>
                                    <option value="20" @selected($posts->perPage() == 30)>30</option>
                                    <!-- Add more options if needed -->
                                </select>
                            </div>

                            <!-- Pagination links -->
                            <div class="mt-3">
                                {{ $posts->appends(request()->except('page'))->links('pagination') }}
                            </div>
                        </div>
                        {{-- end --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        {{-- delete confirmation message --}}
        <script>
            function sweetAlertDelete(formId) {
                let form = document.getElementById(formId);
                Swal.fire({
                    title: '@lang('Are you sure ? ')',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: '@lang('Delete ')',
                    denyButtonText: '@lang('Cancel ')',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }

            // Function to handle "Entries per page" dropdown change
            function changeEntriesPerPage(select) {
                const selectedValue = select.value;
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('entries_per_page', selectedValue);
                window.location.href = currentUrl.toString();
            }
        </script>
    @endpush

</x-admin-layout>
