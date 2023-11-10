<x-admin-layout>
    {{ Breadcrumbs::render('users.update', $user) }}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Update User') }}</h5>

            <form method="POST" action="{{ route('users.update', $user) }}" class="row g-3">
                @csrf
                @method('PUT')
                <!-- name -->
                <div class="col-12">
                    <label for="name" class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"
                           required value="{{ old('name', $user->name) ?: 'No Name' }}">
                    {{-- error --}}
                    <x-error name="name" />
                </div>

                <!-- email -->
                <div class="col-12">
                    <label for="email" class="form-label">{{ __('Email') }}<span
                            class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" id="email"
                           placeholder="example@gmail.com" required value="{{ old('email', $user->email) }}">
                    {{-- error --}}
                    <x-error name="email" />
                </div>


                <!-- email_verified_at -->
                <div class="col-12">
                    <label for="email_verified_at" class="form-label">{{ __('Email Verified At') }}</label>
                    <input type="date" name="email_verified_at" class="form-control" id="email_verified_at"
                           value="{{ old('email_verified_at', $user->email_verified_at) ?: 'Not Verified yet' }}">
                    {{-- error --}}
                    <x-error name="email_verified_at" />
                </div>


                <!-- role -->
                <div class="col-12">
                    <label for="role" class="form-label">{{ __('Role') }}<span
                            class="text-danger">*</span></label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="" selected>{{ __('Select a role') }}</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $role->id == $user->roles->first()->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @empty
                            <option value="">{{ __('No role available') }}</option>
                        @endforelse
                    </select>
                    {{-- error --}}
                    <x-error name="role" />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary btn-block" type="submit">{{ __('Update') }}</button>
                </div>
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
