<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ asset('/admin') }}">
                <i class="bi bi-house"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        {{-- users route --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav"  href="{{ route('users.index')  }}">
                    <i class="bi bi-person-square"></i><span>{{ __('Users') }}</span>
                </a>
            </li>
{{-- end users routes --}}

{{-- start category route --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#components-nav" href="{{ route('categories.index') }}">
                <i class="bi bi-journal-text"></i><span>{{ __('Category')  }}</span>
            </a>
        </li>
{{-- end category route--}}

        {{-- start post route --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#components-nav" href="{{ route('posts.index') }}">
                <i class="bi bi-file-earmark-post"></i><span>{{ __('Post')  }}</span>
            </a>
        </li>
        {{-- end post route--}}

        {{-- start tag route --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#components-nav" href="{{ route('tags.index') }}">
                <i class="bi bi-tags"></i><span>{{ __('Tag')  }}</span>
            </a>
        </li>
        {{-- end tag route--}}
    </ul>

</aside>
