@if (auth()->check())
    <nav id="navbar" class="navbar nav-menu">
        <ul>
            <li><a href="{{ route('home.auth') }}" class="nav-link scrollto {{ $title === 'home' ? 'active' : '' }} "><i
                        class="bx bx-home"></i>
                    <span>Home</span></a></li>
            <li><a href="{{ route('statistik') }}"
                    class="nav-link scrollto {{ $title === 'statistik' ? 'active' : '' }} "><i
                        class='bx bx-bar-chart'></i>
                    <span>Statistik</span></a></li>

            <li><a href="{{ route('newsletter.index') }}"
                    class="nav-link scrollto {{ $title === 'newsletter' ? 'active' : '' }} "><i
                        class="bx bx-list-plus"></i>
                    <span>Form Newsletter</span></a></li>
            <li><a href="{{ route('storage') }}"
                    class="nav-link scrollto {{ $title === 'storage' ? 'active' : '' }} "><i class="bx bx-hdd"></i>
                    <span>Storage</span></a></li>
            <li><a href="{{ route('register') }}"
                    class="nav-link scrollto {{ $title === 'register' ? 'active' : '' }} "><i
                        class='bx bx-book-content'></i><span>Form Register</span></a></li>
            <li><a href="{{ route('logout') }}" class="nav-link scrollto {{ $title === 'about' ? 'active' : '' }} "><i
                        class='bx bx-exit'></i><span>Logout</span></a>
            </li>
        </ul>
    </nav><!-- .nav-menu -->
@else
    <nav id="navbar" class="navbar nav-menu">
        <ul>
            <li><a href="{{ route('home') }}" class="nav-link scrollto {{ $title === 'home' ? 'active' : '' }} "><i
                        class="bx bx-home"></i>
                    <span>Home</span></a></li>
            <li><a href="{{ route('login.show') }}"
                    class="nav-link scrollto {{ $title === 'login' ? 'active' : '' }} "><i class='bx bx-door-open'></i>
                    <span>Login</span></a></li>
        </ul>
    </nav><!-- .nav-menu -->
@endif
