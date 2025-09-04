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
            transition: transform 0.3s ease, width 0.3s ease;
            z-index: 1000;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transform: translateX(0); /* visible by default */
        }

        /* saat sidebar disembunyikan */
        #sidebar.collapsed,
        #sidebar.active {
            transform: translateX(-100%); /* geser keluar layar */
        }

        /* tombol tetap di dalam nav DOM tetapi terlihat (fixed) */
        #sidebar #sidebarCollapse {
            background: var(--primary-color);
            color: white;
            border: none;
            position: fixed;
            left: 12px;  /* jarak dari kiri viewport */
            top: 12px;   /* jarak dari atas viewport */
            z-index: 1101; /* di atas overlay dan sidebar */
            width: 40px;
            height: 40px;
            padding: 6px 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
        }

        /* ketika sidebar terlihat penuh, kita bisa geser tombol sedikit */
        #sidebar:not(.collapsed) #sidebarCollapse {
            left: calc(var(--sidebar-width) - 48px); /* tombol terlihat di tepi sidebar */
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
        
        /* overlay: sekarang tersedia untuk semua ukuran */
        .overlay {
            display: none;
            width: 100vw;
            height: 100vh;
            /* background: rgba(0, 0, 0, 0.5); */
            z-index: 1099; /* di bawah tombol (1101) */
            opacity: 0;
            transition: opacity 0.25s ease;
        }

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

        #sidebarCollapse {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 6px 10px;
            transition: all 0.3s;
        }
        #sidebarCollapse:hover {
            background: var(--secondary-color);
        }

        /* default: tombol terlihat */
        #sidebarCollapse {
            display: block;
        }

        /* sembunyikan tombol saat lebar layar >=768px */
        @media (min-width: 768px) {
            #sidebarCollapse {
                display: none !important;
            }
        }

        /* Sidebar active state styles */
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.15) !important;
            color: white !important;
            border-left: 3px solid var(--secondary-color) !important;
        }
        
        .sidebar-menu .sub-menu a.active {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }
        
        .dropdown-toggle.active {
            background: rgba(255, 255, 255, 0.1) !important;
        }
        
        /* Memastikan submenu terlihat ketika parent active */
        .sidebar-menu .sub-menu.show {
            display: block !important;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%);
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            /* ketika sidebar disembunyikan, konten gunakan margin 0 */
            #content.collapsed {
                margin-left: 0;
            }
            #sidebar:not(.collapsed) {
                transform: translateX(0);
            }

            /* tombol pada mobile tetap di posisi fixed di kiri atas */
            #sidebar #sidebarCollapse {
                left: 12px;
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

    <!-- Include Sidebar Component -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                {{-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fas fa-bars"></i>
                </button> --}}
                <button type="button" id="sidebarCollapse" class="btn" aria-label="Toggle sidebar">
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
                        <h2 class="mb-4">Setup Website</h2>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                Terdapat kesalahan dalam input data. Silakan periksa kembali.
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
        
                <form action="{{ route('admin.setup.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Informasi Umum -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="setting-card">
                                <h4 class="mb-4"><i class="fas fa-info-circle me-2"></i> Informasi Umum</h4>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="site_name" class="form-label">Nama Website</label>
                                            <input type="text" class="form-control" id="site_name" name="site_name" 
                                                   value="{{ $settings['site_name']->value ?? '' }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   value="{{ $settings['email']->value ?? '' }}" required>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Deskripsi Website</label>
                                    <textarea class="form-control" id="site_description" name="site_description" 
                                              rows="3">{{ $settings['site_description']->value ?? '' }}</textarea>
                                </div>
        
                                <div class="mb-3">
                                    <label for="site_keywords" class="form-label">Kata Kunci (Keywords)</label>
                                    <input type="text" class="form-control" id="site_keywords" name="site_keywords" 
                                           value="{{ $settings['site_keywords']->value ?? '' }}">
                                    <div class="form-text">Pisahkan dengan koma</div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="site_logo" class="form-label">Logo Website</label>
                                            <input type="file" class="form-control" id="site_logo" name="site_logo" accept="image/*">
                                            @if($settings['site_logo']->value ?? null)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $settings['site_logo']->value) }}" 
                                                     alt="Logo Website" style="max-height: 100px;" class="img-thumbnail">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="site_favicon" class="form-label">Favicon</label>
                                            <input type="file" class="form-control" id="site_favicon" name="site_favicon" accept="image/*">
                                            @if($settings['site_favicon']->value ?? null)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $settings['site_favicon']->value) }}" 
                                                     alt="Favicon" style="max-height: 32px;" class="img-thumbnail">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Kontak & Alamat -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="setting-card">
                                <h4 class="mb-4"><i class="fas fa-map-marker-alt me-2"></i> Kontak & Alamat</h4>
                                
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="address" name="address" 
                                              rows="2" required>{{ $settings['address']->value ?? '' }}</textarea>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Telepon</label>
                                            <input type="text" class="form-control" id="phone" name="phone" 
                                                   value="{{ $settings['phone']->value ?? '' }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="working_hours" class="form-label">Jam Kerja</label>
                                            <input type="text" class="form-control" id="working_hours" name="working_hours" 
                                                   value="{{ $settings['working_hours']->value ?? '' }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Sosial Media -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="setting-card">
                                <h4 class="mb-4"><i class="fas fa-share-alt me-2"></i> Sosial Media</h4>
                                
                                @php
                                    $socialMedia = isset($settings['social_media']) ? 
                                        json_decode($settings['social_media']->value, true) : 
                                        ['facebook' => '#', 'twitter' => '#', 'instagram' => '#', 'youtube' => '#'];
                                @endphp
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="url" class="form-control" id="facebook" name="facebook" 
                                                   value="{{ $socialMedia['facebook'] ?? '#' }}" placeholder="https://facebook.com/username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="twitter" class="form-label">Twitter/X</label>
                                            <input type="url" class="form-control" id="twitter" name="twitter" 
                                                   value="{{ $socialMedia['twitter'] ?? '#' }}" placeholder="https://twitter.com/username">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="url" class="form-control" id="instagram" name="instagram" 
                                                   value="{{ $socialMedia['instagram'] ?? '#' }}" placeholder="https://instagram.com/username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="youtube" class="form-label">YouTube</label>
                                            <input type="url" class="form-control" id="youtube" name="youtube" 
                                                   value="{{ $socialMedia['youtube'] ?? '#' }}" placeholder="https://youtube.com/channelname">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Footer -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="setting-card">
                                <h4 class="mb-4"><i class="fas fa-footer me-2"></i> Pengaturan Footer</h4>
                                
                                <div class="mb-3">
                                    <label for="footer_text" class="form-label">Teks Footer</label>
                                    <input type="text" class="form-control" id="footer_text" name="footer_text" 
                                           value="{{ $settings['footer_text']->value ?? '' }}" required>
                                </div>
        
                                <div class="mb-3">
                                    <label for="copyright" class="form-label">Teks Copyright</label>
                                    <input type="text" class="form-control" id="copyright" name="copyright" 
                                           value="{{ $settings['copyright']->value ?? '' }}" required>
                                </div>
        
                                <div class="mb-3">
                                    <label for="footer_logo" class="form-label">Logo Footer</label>
                                    <input type="file" class="form-control" id="footer_logo" name="footer_logo" accept="image/*">
                                    @if($settings['footer_logo']->value ?? null)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $settings['footer_logo']->value) }}" 
                                             alt="Logo Footer" style="max-height: 80px;" class="img-thumbnail">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- SEO & Analytics -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="setting-card">
                                <h4 class="mb-4"><i class="fas fa-chart-line me-2"></i> SEO & Analytics</h4>
                                
                                <div class="mb-3">
                                    <label for="google_analytics" class="form-label">Google Analytics ID</label>
                                    <input type="text" class="form-control" id="google_analytics" name="google_analytics" 
                                           value="{{ $settings['google_analytics']->value ?? '' }}" 
                                           placeholder="G-XXXXXXXXXX atau UA-XXXXX-Y">
                                </div>
        
                                <div class="mb-3">
                                    <label for="meta_tags" class="form-label">Meta Tags Tambahan</label>
                                    <textarea class="form-control" id="meta_tags" name="meta_tags" 
                                              rows="3" placeholder='<meta name="author" content="Nama">'>{{ $settings['meta_tags']->value ?? '' }}</textarea>
                                    <div class="form-text">Tambahkan meta tags HTML khusus jika diperlukan</div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Tombol Submit -->
                    <div class="row">
                        <div class="col-12">
                            <div class="setting-card">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>Simpan Pengaturan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
            // initial state:
            // pada desktop kita ingin sidebar terlihat; pada mobile default collapsed di CSS
            // klik tombol toggle
            $('#sidebarCollapse').on('click', function(e) {
                e.preventDefault();
                $('#sidebar').toggleClass('collapsed');   // sembunyikan / tampilkan sidebar
                $('#content').toggleClass('collapsed');   // geser konten
                $('.overlay').toggleClass('active');      // overlay on/off
            });
    
            // klik overlay untuk menutup sidebar
            $('.overlay').on('click', function() {
                $('#sidebar').addClass('collapsed');
                $('#content').addClass('collapsed');
                $('.overlay').removeClass('active');
            });
    
            // submenu toggle (Bootstrap collapse already used in HTML; keep both safe)
            $('.dropdown-toggle').on('click', function(e) {
                // jika menggunakan Bootstrap collapse (data-bs-toggle="collapse"), biarkan Bootstrap handle.
                // Script ini hanya untuk toggling sub-menu non-bootstrap if present.
                var $sub = $(this).parent().find('.sub-menu').first();
                if ($sub.length) {
                    e.preventDefault();
                    $sub.toggleClass('show');
                    $(this).parent().siblings().find('.sub-menu').removeClass('show');
                }
            });
    
            // Optional: close sidebar on window resize for mobile/desktop preference
            $(window).on('resize', function() {
                if ($(window).width() > 768) {
                    // pastikan sidebar tidak tersembunyi di desktop; hapus class collapsed jika ingin selalu tampil
                    // Jika Anda ingin mempertahankan last state antar-resize, hapus baris berikut
                    $('#sidebar').removeClass('collapsed');
                    $('#content').removeClass('collapsed');
                    $('.overlay').removeClass('active');
                } else {
                    // di mobile, hide by default (sesuaikan jika ingin kebalikan)
                    $('#sidebar').addClass('collapsed');
                    $('#content').addClass('collapsed');
                    $('.overlay').removeClass('active');
                }
            }).trigger('resize'); // jalankan sekali saat load
        });
    </script>
           
</body>
</html>