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
                        <h2 class="mb-4">{{ isset($news) ? 'Edit' : 'Tambah' }} Berita</h2>
                        
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
        
                <form action="{{ isset($news) ? route('admin.berita.update', $news) : route('admin.berita.simpan') }}" 
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($news)) @method('POST') @endif
        
                    <div class="row">
                        <div class="col-md-8">
                            <div class="setting-card">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title', $news->title ?? '') }}" required>
                                </div>
        
                                <div class="mb-3">
                                    <label for="excerpt" class="form-label">Ringkasan (Excerpt)</label>
                                    <textarea class="form-control" id="excerpt" name="excerpt" 
                                              rows="3">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                                    <div class="form-text">Ringkasan singkat berita (max 500 karakter)</div>
                                </div>
        
                                <div class="mb-3">
                                    <label for="content" class="form-label">Konten Berita</label>
                                    <textarea class="form-control" id="content" name="content" 
                                              rows="15">{{ old('content', $news->content ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4">
                            <div class="setting-card">
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Gambar Utama</label>
                                    <input type="file" class="form-control" id="featured_image" name="featured_image" 
                                           {{ !isset($news) ? 'required' : '' }} accept="image/*">
                                    @if(isset($news) && $news->featured_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $news->featured_image) }}" 
                                             alt="Featured Image" class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                    @endif
                                </div>
        
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Kategori</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $news->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
        
                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Tanggal Publikasi</label>
                                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" 
                                           value="{{ old('published_at', isset($news) && $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
                                </div>
        
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" 
                                           value="1" {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">
                                        Publikasikan Berita
                                    </label>
                                </div>
        
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        {{ isset($news) ? 'Update' : 'Simpan' }} Berita
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
    
    <!-- Include CKEditor or other rich text editor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

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