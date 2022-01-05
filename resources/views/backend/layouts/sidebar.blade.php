<div class="sidebar-body">
    <ul class="nav">
        <li class="nav-item nav-category">{{ __('Main') }}</li>
        <li class="nav-item @if (request()->is('admin/dashboard')) {{ 'active' }} @endif">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">{{ __('Dashboard') }}</span>
            </a>
        </li>
        <li class="nav-item nav-category">{{ __('User Part') }}</li>
        <li class="nav-item @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#userControl" role="button" aria-expanded="false"
                aria-controls="userControl">
                <i class="link-icon" data-feather="user-plus"></i>
                <span class="link-title">{{ __('User') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'show' }} @endif" id="userControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.users.create') }}"
                            class="nav-link @if (request()->is('admin/users/create')) {{ 'active' }} @endif">{{ __('New User') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link @if (request()->is('admin/users')) {{ 'active' }} @endif">{{ __('All User') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">{{ __('General Part') }}</li>

        <li class="nav-item @if (request()->is('admin/generals')) {{ 'active' }} @endif">
            <a href="{{ route('admin.generals.index') }}" class="nav-link">
                <i class="link-icon" data-feather="info"></i>
                <span class="link-title">{{ __('General') }}</span>
            </a>
        </li>
        {{-- <li class="nav-item @if (request()->is('admin/faqs')) {{ 'active' }} @endif">
            <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                <i class="link-icon" data-feather="help-circle"></i>
                <span class="link-title">{{ __('FAQ') }}</span>
            </a>
        </li> --}}
        <li class="nav-item @if (request()->is('admin/sliders')) {{ 'active' }} @endif">
            <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                <i class="link-icon" data-feather="image"></i>
                <span class="link-title">{{ __('Slider') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/contacts')) {{ 'active' }} @endif">
            <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                <i class="link-icon" data-feather="map-pin"></i>
                <span class="link-title">{{ __('Contact') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/report-categories')) {{ 'active' }} @endif">
            <a href="{{ route('admin.report-categories.index') }}" class="nav-link">
                <i class="link-icon" data-feather="columns"></i>
                <span class="link-title">{{ __('Report Category') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/programs') || request()->is('admin/programs/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#programControl" role="button"
                aria-expanded="false" aria-controls="programControl">
                <i class="link-icon" data-feather="slack"></i>
                <span class="link-title">{{ __('Programs') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/programs') || request()->is('admin/programs/*')) {{ 'show' }} @endif" id="programControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.programs.create') }}"
                            class="nav-link @if (request()->is('admin/programs/create')) {{ 'active' }} @endif">{{ __('New Program') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.programs.index') }}"
                            class="nav-link @if (request()->is('admin/programs')) {{ 'active' }} @endif">{{ __('All Program') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (request()->is('admin/projects') || request()->is('admin/projects/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#projectControl" role="button"
                aria-expanded="false" aria-controls="projectControl">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">{{ __('Projects') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/projects') || request()->is('admin/projects/*')) {{ 'show' }} @endif" id="projectControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.projects.create') }}"
                            class="nav-link @if (request()->is('admin/projects/create')) {{ 'active' }} @endif">{{ __('New Project') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.projects.index') }}"
                            class="nav-link @if (request()->is('admin/projects')) {{ 'active' }} @endif">{{ __('All Project') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (request()->is('admin/blogs') || request()->is('admin/blogs/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#blogControl" role="button" aria-expanded="false"
                aria-controls="blogControl">
                <i class="link-icon" data-feather="book-open"></i>
                <span class="link-title">{{ __('Blogs') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/blogs') || request()->is('admin/blogs/*')) {{ 'show' }} @endif" id="blogControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.create') }}"
                            class="nav-link @if (request()->is('admin/blogs/create')) {{ 'active' }} @endif">{{ __('New Blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}"
                            class="nav-link @if (request()->is('admin/blogs')) {{ 'active' }} @endif">{{ __('All Blog') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#pageControl" role="button" aria-expanded="false"
                aria-controls="pageControl">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">{{ __('Pages') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'show' }} @endif" id="pageControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.pages.create') }}"
                            class="nav-link @if (request()->is('admin/pages/create')) {{ 'active' }} @endif">{{ __('New Page') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pages.index') }}"
                            class="nav-link @if (request()->is('admin/pages')) {{ 'active' }} @endif">{{ __('All Page') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item nav-category">{{ __('Category Part') }}</li>
        <li class="nav-item @if (request()->is('admin/categories')) {{ 'active' }} @endif">
            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="link-icon" data-feather="columns"></i>
                <span class="link-title">{{ __('Category') }}</span>
            </a>
        </li> --}}
    </ul>
</div>
