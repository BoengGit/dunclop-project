<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">Dunclop<span>.</span></a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li>
                    @if (Auth::check())
                        @if (Auth::user()->role == 1)
                            <a class="nav-link scrollto" href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a class="nav-link scrollto" href="{{ route('home') }}">Menu</a>
                        @endif
                    @endif
                    @guest
                        <a class="nav-link scrollto" href="{{ route('login') }}">Login</a>
                    @endguest
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
