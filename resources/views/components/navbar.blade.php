<header class="transparent">
    <!-- Hamburger Menu untuk HP -->
    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Menu Utama -->
    <nav class="center-nav" id="navMenu">
        <ul class="menu">
            <li>
                    <a href="/">Beranda</a>            
            </li>

            <li class="menu">
                @auth
                    <a href="{{ route('video.index') }}">Video Edukasi</a>
                @else
                    <a href="#" class="disabled-link" onclick="return false;">Video Edukasi</a>
                @endauth
            </li>

            <!-- Dropdown Beritahu Kami -->
            <li class="dropdown">
                <a href="#">Beritahu Kami</a>
                <ul class="dropdown-content">
                    <li>
                        @auth
                            <a href="{{ route('survey.create') }}">Survei Kepuasan</a>
                        @else
                            <a href="#" class="disabled-link" onclick="return false;">Survei Kepuasan</a>
                        @endauth
                    </li>
                    <li>
                        <a href="/kontak">Kontak Kami</a>
                    </li>
                </ul>
            </li>

            <!-- Menu khusus Admin -->
            @if(Auth::check() && Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('admin.users.index') }}">Manajemen User</a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- Bagian Login / Profil -->
    <div class="login-area">
        @auth
            <!-- Tampilkan ikon, nama user & dropdown logout -->
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <div class="user-icon" id="userMenu">
                    <img src="{{ asset('img/user-icon.jpeg') }}" alt="User" id="userIcon">
                    <div class="logout-dropdown" id="logoutMenu">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <!-- Jika belum login -->
            <button class="login-btn" onclick="window.location.href='{{ route('login') }}'">Login</button>
        @endauth
    </div>
</header>
