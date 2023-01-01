<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')
</head>

<body>
    @yield('cetak')
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
    <header id="header" class="d-flex flex-column justify-content-center">
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>
</body>

</html>
