<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container-fluid d-flex align-items-center">
        <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="logo">
        <p class="logo-name">EUC Grading System</p>
        <div class="navbar-nav ms-auto">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle profile-icon"></i> Profile
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="admin-profile.html">View Profile</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li><button type="submit" class="dropdown-item">Logout</button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
