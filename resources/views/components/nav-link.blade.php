<nav class="navbar">
    <div class="nav-left">
        <a href="/">Home</a>
        <a href="/survei">Survei</a>
        <a href="/video">Video Edukasi</a>
    </div>

    <div class="nav-right">
        @auth
            <!-- Jika user sudah login -->
            <div class="dropdown">
                <button class="profile-btn">
                    <img src="{{ asset('img/user-icon.png') }}" alt="Profile" width="30">
                </button>
                <div class="dropdown-content">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <!-- Jika belum login -->
            <a href="{{ route('login') }}" class="btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn-register">Register</a>
        @endauth
    </div>
</nav>

<style>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 24px;
    background: #f5f5f5;
}
.nav-left a, .nav-right a {
    margin-right: 16px;
    text-decoration: none;
    color: #333;
}
.profile-btn {
    background: none;
    border: none;
    cursor: pointer;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background: #fff;
    border: 1px solid #ccc;
    min-width: 140px;
    z-index: 10;
    padding: 8px;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown-content form button {
    background: none;
    border: none;
    width: 100%;
    padding: 8px;
    cursor: pointer;
    text-align: left;
}
.user-name {
    display: block;
    font-size: 14px;
    margin-bottom: 8px;
}
</style>
