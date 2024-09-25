<header>
    <div class="container-fluid bg-dark d-flex justify-content-between p-3 align-items-center">

        <!-- Logo -->
        <div class="logo d-flex align-items-center">
            <i class="fa-solid fa-user-tie" style="color: #feffff; font-size: 30px; margin-right: 10px;"></i>
            <a href="{{ route('home') }}" class="text-white">Vai al Sito</a>
        </div>

        <!-- USER -->
        <div class="user">
            <ul class="navbar mb-0">
                @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="text-white">Login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="text-white">Registrati</a></li>

                @else

                <!-- Menù drop down login -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Print Dell'user name al login di esso  -->
                        {{ Auth::user()->name }}
                    </a>

                    <!-- Voci del drop-down menù -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-danger" href="{{ route('admin.home') }}">Admin</a>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>

                    <!-- Form di Log-out -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                @endguest
            </ul>
        </div>
    </div>
</header>
