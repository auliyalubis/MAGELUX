<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-earth-asia"></i> {{ $title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Menu Biasa -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="fa-solid fa-map"></i> Peta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                        <i class="fa-solid fa-table"></i> Tabel
                    </a>
                </li>

                <!-- Dropdown Fitur untuk Saran, Event, dan Data (hanya untuk user yang login) -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="fiturDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-layer-group"></i> Fitur
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="fiturDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('saran.index') }}">
                                    <i class="fa-solid fa-lightbulb"></i> Saran
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('events.index') }}">
                                    <i class="fa-solid fa-calendar-days"></i> Event
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('api.points') }}" target="_blank">
                                    <i class="fa-solid fa-database"></i> Data
                                </a>
                            </li>
                        </ul>
                    </li>
                @endauth

                <!-- Autentikasi -->
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link text-danger" type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('login') }}">
                            <i class="fa-solid fa-right-from-bracket"></i> Login
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
