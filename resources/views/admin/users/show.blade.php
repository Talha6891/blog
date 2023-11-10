<x-admin-layout>
    {{ Breadcrumbs::render('users.show', $user) }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show User Record</h5>

            <form class="row g-3">

                {{-- name --}}
                <div class="col-12">
                    <label for="name" class="form-label"><strong> {{ __('Name') }} </strong></label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}"  disabled>
                </div>

                {{-- email --}}
                <div class="col-12">
                    <label for="email" class="form-label"><strong> {{ __('Email') }} </strong></label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                </div>

                {{-- email verifed at --}}
                <div class="col-12">
                    <label for="email_verified_at" class="form-label"><strong> {{ __('Email Verified At') }}
                        </strong></label>
                    <input type="text" class="form-control" id="email_verified_at"
                           value="{{ $user->email_verified_at ? $user->email_verified_at->format('d-M-Y h:i:s A') : 'Not Verified Yet' }}" disabled>
                </div>

                {{-- role --}}
                <div class="col-12">
                    <label for="role" class="form-label"><strong> {{ __('Role') }}
                        </strong></label>
                    <input type="text" class="form-control" id="role"
                           value="{{ $user->roles->first()->name ?: 'No role assigned' }}" disabled>
                </div>

                {{-- created at --}}
                <div class="col-12">
                    <label for="created_at" class="form-label"><strong> {{ __('Created At') }} </strong></label>
                    <input type="text" class="form-control" id="created_at" value="{{ $user->created_at ? $user->created_at->format('d-M-Y h:i:s A') : '' }}" disabled>
                </div>

            </form>

        </div>
    </div>
</x-admin-layout>
