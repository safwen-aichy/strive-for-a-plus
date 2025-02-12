<nav class="navbar">
    <div class="navbar-container justify-content-between">
        <a href="/" class="navbar-logo"><img src="{{ asset('logo.png') }}" width='160px' height='60px'/></a>
        <ul class="navbar-menu">
            <li class="navbar-item {{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
            <li class="navbar-item"><a href="/tuitions">Tuition Listings</a></li>
            @guest
                <li class="navbar-item {{ request()->is('login') ? 'active' : '' }}"><a href="/login">Login</a></li>
                <li class="navbar-item {{ request()->is('register') ? 'active' : '' }}"><a href="/register">Register</a></li>
            @else
                @if(Auth::user()->role == 'tutor')
                    <li class="navbar-item {{ request()->is('dashboard') || request()->is('tuition-create') || request()->segment(1) == 'tuition' && request()->segment(3) == 'edit' ? 'active' : '' }}"><a href="/dashboard">Dashboard</a></li>
                @endif

                <!-- Profile Dropdown -->
                <li class="navbar-item profile-dropdown">
                    <div class="profile-container" onclick="toggleDropdown()">
                        @if(auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Image" class="profile-pic">
                        @else
                            <div class="profile-initials">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1) . substr(explode(' ', auth()->user()->name)[1] ?? '', 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu" id="profileDropdown">
                        <a href="/account-settings">Account Settings</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-link logout-btn">Logout</button>
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
