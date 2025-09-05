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
                    <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.berita') }}" class="{{ Request::is('admin/berita*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i> Daftar Berita
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.file') }}" class="{{ Request::is('admin/file') ? 'active' : '' }}">
                        <i class="fas fa-download"></i> File Download
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-map-marked-alt"></i> Peta Desa
                    </a>
                </li> 
                <li>
                    <a href="#subMenu4" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-cog"></i> Pengaturan
                    </a>
                    <ul class="sub-menu collapse" id="subMenu4">
                        <li><a href="{{ route('admin.pengaturan.informasi') }}"><i class="fas fa-info-circle"></i> Informasi Website</a></li>
                        <li><a href="{{ route('admin.setup') }}"><i class="fas fa-sliders-h"></i> Setup Website</a></li>
                        {{-- <li><a href="#"><i class="fas fa-image"></i> Tampilan</a></li>
                        <li><a href="#"><i class="fas fa-user-shield"></i> Hak Akses</a></li>
                        <li><a href="#"><i class="fas fa-database"></i> Backup Data</a></li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <a href="#">
                        <i class="fas fa-calendar-alt"></i> Kalender Kegiatan
                    </a>
                </li>--}}
                
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

<!-- Form Logout untuk Dropdown -->
<form id="logout-form-dropdown" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>