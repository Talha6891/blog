<x-admin-layout>
    {{ Breadcrumbs::render('users.index') }}

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
                        <h5 class="card-title">{{ __('User Data') }}</h5>

                        <div class="d-flex justify-content-between align-items-center text-center mb-3">
                            <div>
                                {{-- create user button --}}
                                @can('user create')
                                    <a href="{{ route('users.create') }}" class="btn btn-outline-primary  ">
                                        <i class="bi bi-plus"></i> {{ __('New User') }}
                                    </a>
                                @endcan

                                {{-- refresh button --}}
                                <a href="{{ route('users.index') }}" class="btn btn-outline-primary  ml-2">
                                    <i class="bi bi-arrow-repeat"></i> {{ __('Refresh') }}
                                </a>
                            </div>
                            {{-- search record form --}}
                            <form action="{{ route('users.index') }}" method="GET" class="form-inline">
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
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#{{ __('ID') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Email Verification') }}</th>
                                <th scope="col">{{ __('Role') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse ($users as $user)
                                <tr>
                                    {{-- id --}}
                                    <th scope="row">{{ $user->id }}</th>

                                    {{-- name and avatar --}}
                                    <td>
                                        <img src="{{ Avatar::create($user->name)->toBase64() }}" width="35">
                                        {{ $user->name }}
                                    </td>

                                    {{-- email --}}
                                    <td>{{ $user->email }}</td>

                                    {{-- email verification --}}
                                    <td class="text-center">
                                        @if ($user->email_verified_at)
                                            <span class="badge bg-primary">{{ __('Verified') }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">{{ __('Unverified') }}</span>
                                        @endif
                                    </td>

                                    {{-- role --}}
                                    <td>{{ $user->roles->first()->name ?: 'No Role Assigned' }}</td>

                                    {{-- crated at --}}
                                    <td>{{ $user->created_at->diffForHumans() ?: '' }}</td>

                                    {{-- Actions --}}
                                    <td class="d-flex">
                                        @can('user show')
                                            <a href="{{ route('users.show', $user) }}"
                                               class="btn btn-success btn-sm "><i class="bi bi-eye"></i>
                                            </a>
                                        @endcan
                                        @can('user update')
                                            <a href="{{ route('users.edit', $user) }}"
                                               class="btn btn-primary btn-sm mx-2"><i class="bi bi-pencil"></i>
                                            </a>
                                        @endcan
                                        @can('user delete')
                                            <form method="POST" action="{{ route('users.destroy', $user) }}"
                                                  id="deleteForm{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="sweetAlertDelete('deleteForm{{ $user->id }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger fw-bold">
                                        {{ __('No records are available.') }}</td>
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
                                    <option value="10" @selected($users->perPage() == 10) >10</option>
                                    <option value="20" @selected($users->perPage() == 20)>20</option>
                                    <option value="30" @selected($users->perPage() == 30)>30</option>
                                </select>
                            </div>

                            <!-- Pagination links -->
                            <div class="mt-3">
                                {{ $users->appends(request()->except('page'))->links('pagination') }}
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
