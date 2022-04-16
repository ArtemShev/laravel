<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('index')) active @endif" aria-current="page" href="{{ route('welcome') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('news.*')) active @endif" href="{{ route('news.CategoryList') }}">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>
            @if (Auth::user()->is_admin)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">На страницу админа</a>
            </li>
            @endif

        </ul>

    </div>
</nav>
