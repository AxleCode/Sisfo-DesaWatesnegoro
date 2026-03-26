<nav id="sidebar" class="{{ isset($sidebarCollapsed) && $sidebarCollapsed ? 'collapsed' : '' }}">
    <div class="sidebar-header">
        <img src="{{ asset('images/FElogo.png') }}" alt="Logo Desa Watesnegoro" width="180">
    </div>
    
    <div class="sidebar-profile">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4c956c&color=fff" alt="Profile" class="profile-image">
        <h5 class="mt-2 mb-1">{{ Auth::user()->name }}</h5>
        <p class="text-muted small">{{ ucfirst(Auth::user()->role) }}</p>
    </div>
    
    <div class="sidebar-menu-container">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('bumdes.dashboard') }}" class="{{ Request::is('bumdes/dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('bumdes.foto') }}" class="{{ Request::is('bumdes/dashboard/foto*') ? 'active' : '' }}">
                        <i class="fas fa-images"></i> Foto Slider BUMDES
                    </a>
                </li>
                <li>
                    <a href="{{ route('bumdes.link') }}" class="{{ Request::is('bumdes/dashboard/link*') ? 'active' : '' }}">
                        <i class="fas fa-link"></i> Link Spreadsheet
                    </a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form id="logout-form-dropdown" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

