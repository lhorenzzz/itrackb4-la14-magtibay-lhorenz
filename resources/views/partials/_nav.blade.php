<nav>
    <br>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">GameHub</a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

                    <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('games.*') ? 'active' : '' }}"
                            href="{{ route('games.index') }}">Games</a>
                    </li>
                </ul>

                {{-- ms-auto = push this group to the right side of the navbar --}}
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    {{-- @guest = shown only when nobody is signed in (E1) --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest

                    {{-- @auth = shown only when signed in. Auth::user() is null for guests,
                         so ->name must stay inside @auth (E2, E3) --}}
                    @auth
                        <li class="nav-item">
                            <span class="navbar-text me-3">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            {{-- logout is a POST form with @csrf, never a plain link --}}
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Log out</button>
                            </form>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
    <br>
</nav>
