<x-admin-guest-layout>


    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">{{ __('Login') }}</h5>
                                </div>
                                {{-- login form --}}
                                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation"
                                    novalidate>
                                    @csrf
                                    {{-- email --}}
                                    <div class="col-12">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ old('email') }}" required>
                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        </div>
                                    </div>
                                    {{-- password --}}
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">{{ __('Password') }}</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required>
                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                    </div>
                                    {{-- remember me checkbox --}}
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                value="true" id="rememberMe">
                                            <label class="form-check-label"
                                                for="rememberMe">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>

                                    {{-- login button --}}
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100"
                                            type="submit">{{ __('Log in') }}</button>
                                    </div>

                                    {{-- forgot password link --}}
                                    @if (Route::has('password.request'))
                                        <div class="col-12">
                                            <p class="small mb-0">{{ __('Forgot your password?') }} <a
                                                    href="{{ route('password.request') }}">{{ __('Reset it here') }}</a>
                                            </p>
                                        </div>
                                    @endif

                                    <div class="col-12">
                                        <p class="small mb-0">{{ __('Do not have account?') }} <a
                                                href="pages-register.html">{{ __('Create an account') }}</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>

</x-admin-guest-layout>
