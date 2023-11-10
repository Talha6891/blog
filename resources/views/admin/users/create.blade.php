<x-admin-layout>
    {{ Breadcrumbs::render('users.create') }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Create New User') }}</h5>

            <form method="POST" action="{{ route('users.store') }}" class="row g-3">
                @csrf
                <!-- name -->
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                    {{-- error --}}
                    <x-error name="name"/>
                </div>

                <!-- email -->
                <div class="col-12">
                    <label for="email" class="form-label">{{ __('Email') }}<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" id="email"
                           placeholder="example@gmail.com" required>
                    {{-- error --}}
                    <x-error name="email"/>
                </div>

                <!-- password and confirm password-->
                <div class="col-12">
                    <label for="password" class="form-label">{{ __('Password') }}<span
                            class="text-danger">*</span></label>
                    <div class="input-group">

                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Enter  Password" required>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control" placeholder="Enter Confirm Password" required>
                        <button type="button" class="btn btn-outline-secondary" id="showPassword"
                                onclick="togglePasswordVisibility()">
                            Show Password
                        </button>
                    </div>
                    {{-- error --}}
                    <x-error name="password"/>
                </div>

                <!-- email_verified_at -->
                <div class="col-12">
                    <label for="email_verified_at" class="form-label">{{ __('Email Verified At') }}</label>
                    <input type="date" name="email_verified_at" class="form-control" id="email_verified_at">
                    {{-- error --}}
                    <x-error name="email_verified_at"/>
                </div>

                <!-- role -->
                <div class="col-12">
                    <label for="role" class="form-label">{{ __('Role') }}<span
                            class="text-danger">*</span></label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="" selected>{{ __('Select a role') }}</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @empty
                            <option value="">{{ __('No role Available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="role"/>
                </div>
                @can('user create')
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Create') }}</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>


    @push('scripts')
        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('password_confirmation');
                const showButton = document.getElementById('showPassword');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    confirmPasswordInput.type = 'text';
                    showButton.textContent = 'Hide Password';
                } else {
                    passwordInput.type = 'password';
                    confirmPasswordInput.type = 'password';
                    showButton.textContent = 'Show Password';
                }
            }
        </script>
    @endpush

</x-admin-layout>
