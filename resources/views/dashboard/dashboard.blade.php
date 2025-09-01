<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo_mojokerto.png') }}">
    <title>Dashboard - Sistem Desa Watesnegoro</title>

    <!-- Bootstrap 5 + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet"
    />

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2c6e49;
            --secondary-color: #4c956c;
            --accent-color: #fefee3;
            --light-color: #d8f3dc;
            --dark-color: #1b4332;
            --sidebar-width: 280px;
            --header-height: 70px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        #sidebar {
            position: fixed;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--dark-color);
            color: white;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 20px;
            background: var(--primary-color);
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .sidebar-profile {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .sidebar-menu-container {
            flex: 1;
            overflow-y: auto;
            padding: 10px 0;
        }
        
        .sidebar-menu {
            padding: 0;
        }
        
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            padding: 0;
        }
        
        .sidebar-menu a {
            padding: 12px 20px;
            display: block;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        
        .sidebar-menu a:hover, 
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 3px solid var(--secondary-color);
        }
        
        .sidebar-menu a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-menu .sub-menu {
            padding-left: 30px;
            background: rgba(0, 0, 0, 0.2);
            display: none;
        }
        
        .sidebar-menu .sub-menu.show {
            display: block;
        }
        
        /* Custom scrollbar for sidebar */
        .sidebar-menu-container::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-menu-container::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-menu-container::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 3px;
        }
        
        .sidebar-menu-container::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }
        
        /* Main Content Styles */
        #content {
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
            min-height: 100vh;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: var(--header-height);
            padding: 0 20px;
        }
        
        #sidebarCollapse {
            background: var(--primary-color);
            color: white;
            border: none;
        }
        
        .main-content {
            padding: 20px;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s;
            height: 100%;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -var(--sidebar-width);
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            #content {
                margin-left: 0;
            }
            
            #content.active {
                margin-left: var(--sidebar-width);
            }
            
            .overlay {
                display: none;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.7);
                z-index: 999;
                opacity: 0;
                transition: all 0.5s ease-in-out;
            }
            
            .overlay.active {
                display: block;
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay -->
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/FElogo.png') }}" alt="Logo Desa Watesnegoro" width="180">
        </div>
        
        <div class="sidebar-profile">
            <img src="https://ui-avatars.com/api/?name=Admin+User&background=4c956c&color=fff" alt="Profile" class="profile-image">
            <h5 class="mt-2 mb-1">{{ Auth::user()->name }}</h5>
            <p class="small">{{ Auth::user()->role }}</p>
        </div>
        
        <div class="sidebar-menu-container">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="#" class="active">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-user"></i> Manajemen Pengguna
                        </a>
                    </li>
                    <li>
                        <a href="#subMenu1" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-newspaper"></i> Berita & Artikel
                        </a>
                        <ul class="sub-menu collapse" id="subMenu1">
                            <li><a href="#"><i class="fas fa-list"></i> Daftar Berita</a></li>
                            <li><a href="#"><i class="fas fa-plus"></i> Tambah Berita</a></li>
                            <li><a href="#"><i class="fas fa-tags"></i> Kategori</a></li>
                            <li><a href="#"><i class="fas fa-clock"></i> Jadwal Publikasi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#subMenu2" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-download"></i> File Download
                        </a>
                        <ul class="sub-menu collapse" id="subMenu2">
                            <li><a href="#"><i class="fas fa-list"></i> Daftar File</a></li>
                            <li><a href="#"><i class="fas fa-upload"></i> Unggah File</a></li>
                            <li><a href="#"><i class="fas fa-folder"></i> Kategori File</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#subMenu3" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-images"></i> Galeri
                        </a>
                        <ul class="sub-menu collapse" id="subMenu3">
                            <li><a href="#"><i class="fas fa-image"></i> Foto</a></li>
                            <li><a href="#"><i class="fas fa-video"></i> Video</a></li>
                            <li><a href="#"><i class="fas fa-folder-plus"></i> Album Baru</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#subMenu4" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                        <ul class="sub-menu collapse" id="subMenu4">
                            <li><a href="#"><i class="fas fa-info-circle"></i> Informasi Website</a></li>
                            <li><a href="#"><i class="fas fa-sliders-h"></i> Umum</a></li>
                            <li><a href="#"><i class="fas fa-image"></i> Tampilan</a></li>
                            <li><a href="#"><i class="fas fa-user-shield"></i> Hak Akses</a></li>
                            <li><a href="#"><i class="fas fa-database"></i> Backup Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-chart-bar"></i> Statistik
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-comments"></i> Komentar
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-envelope"></i> Pesan
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-calendar-alt"></i> Kalender Kegiatan
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-map-marked-alt"></i> Peta Desa
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-history"></i> Log Aktivitas
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-question-circle"></i> Bantuan
                        </a>
                    </li>
                    <li>
                        <!-- Form Logout -->
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

    <!-- Main Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=4c956c&color=fff" alt="Profile" width="32" height="32" class="rounded-circle me-2">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="mb-4">Dashboard Sistem</h2>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            <div>Selamat datang {{ Auth::user()->name }} di Sistem Administrasi Desa Watesnegoro. Anda login sebagai Administrator.</div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h4>25</h4>
                            <p class="text-muted">Total Berita</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-icon bg-success text-white">
                                <i class="fas fa-download"></i>
                            </div>
                            <h4>12</h4>
                            <p class="text-muted">File Download</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-icon bg-info text-white">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4>158</h4>
                            <p class="text-muted">Pengguna Terdaftar</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-card">
                            <div class="card-icon bg-warning text-white">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4>42</h4>
                            <p class="text-muted">Komentar Baru</p>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity and Quick Actions -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="dashboard-card">
                            <h4 class="mb-4">Aktivitas Terbaru</h4>
                            <div class="list-group">
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-primary rounded-circle p-2 me-3">
                                        <i class="fas fa-plus text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Berita Baru Ditambahkan</h6>
                                            <small class="text-muted">2 jam yang lalu</small>
                                        </div>
                                        <p class="mb-1">"Kerja Bakti Desa Watesnegoro" telah ditambahkan</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-success rounded-circle p-2 me-3">
                                        <i class="fas fa-download text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">File Diunduh</h6>
                                            <small class="text-muted">5 jam yang lalu</small>
                                        </div>
                                        <p class="mb-1">Formulir KTP diunduh 15 kali</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-info rounded-circle p-2 me-3">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Pengguna Baru</h6>
                                            <small class="text-muted">Kemarin</small>
                                        </div>
                                        <p class="mb-1">Budi Santoso mendaftar sebagai warga</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-warning rounded-circle p-2 me-3">
                                        <i class="fas fa-comment text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Komentar Baru</h6>
                                            <small class="text-muted">2 hari yang lalu</small>
                                        </div>
                                        <p class="mb-1">Siti memberikan komentar pada berita "Pelatihan Kerajinan"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <h4 class="mb-4">Aksi Cepat</h4>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary mb-2">
                                    <i class="fas fa-plus me-2"></i>Tambah Berita
                                </button>
                                <button class="btn btn-success mb-2">
                                    <i class="fas fa-upload me-2"></i>Unggah File
                                </button>
                                <button class="btn btn-warning mb-2">
                                    <i class="fas fa-cog me-2"></i>Pengaturan Website
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
    <!-- jQuery (for sidebar toggle) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            // Sidebar toggle
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('.overlay').toggleClass('active');
                $('#content').toggleClass('active');
            });
            
            // Close sidebar when clicking on overlay
            $('.overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                $('#content').removeClass('active');
            });
            
            // Handle submenu toggle
            $('.dropdown-toggle').on('click', function(e) {
                e.preventDefault();
                $(this).parent().find('.sub-menu').first().toggleClass('show');
                $(this).parent().siblings().find('.sub-menu').removeClass('show');
            });
        });
    </script>
</body>
</html>