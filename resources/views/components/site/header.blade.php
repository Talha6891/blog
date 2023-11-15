<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="#" class="logo m-0 float-start">{{ __('Laravel') }}</a>
                    </div>
                    <div class="col-6 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none">
                            <input type="text" class="form-control form-control-sm" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="active"><a href="#">{{ __('Home') }}</a></li>
                            <li><a href="#">{{ __('Articles') }}</a></li>
                            <li><a href="#">{{ __('Categories') }}</a></li>
                            <li><a href="#">{{ __('Tags') }}</a></li>
                            <li><a href="#">{{ __('Request Article') }}</a></li>
                            <li><a href="#">{{ __('Contact Us') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-4 text-end">
                        <div class="d-flex align-items-center">
                            <form action="#" class="search-form d-none d-lg-inline-block">
                                <input type="text" class="form-control form-control-sm" placeholder="Search...">
                                <span class="bi-search"></span>
                            </form>

                            @auth
                                <div class="dropdown d-inline-block ms-2">
                                    <a href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                       class="text-white">
                                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" width="35"
                                             class="rounded-circle me-2" alt="{{ Auth::user()->name }}">
                                        {{ Auth::user()->name }}
                                        <span class="bi bi-caret-down-fill"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li class="dropdown-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @method('POST')
                                                @csrf
                                                <button type="submit" class="btn">{{ __('Logout') }}</button>
                                            </form>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">{{ __('Setting') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="d-inline-block ms-2">
                                    <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
                                    <a href="{{ route('login') }}"
                                       class="btn btn-primary ms-2">{{ __('Login') }}</a>
                                </div>
                            @endauth
                        </div>

                        <a href="#"
                           class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
