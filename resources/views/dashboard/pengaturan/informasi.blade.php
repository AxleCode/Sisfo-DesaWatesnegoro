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
        
        .setting-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 20px;
            height: 100%;
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
                <button type="button" id="sidebarCollapse" class="btn" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4c956c&color=fff" alt="Profile" width="32" height="32" class="rounded-circle me-2">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
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
                        <h2 class="mb-4">Informasi</h2>
                        
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            <div>Halaman untuk mengatur tampilan website</div>
                        </div>
                    </div>
                </div>
                
                <!-- Slider Management -->
                <div class="row">
                    <div class="col-12">
                        <div class="setting-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="mb-0">Slider Gambar Utama</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSliderModal">
                                    <i class="fas fa-plus me-2"></i>Tambah Slider
                                </button>
                            </div>
                            
                            <div class="list-group">
                                @foreach($sliders as $slider)
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ asset('storage/' . $slider->image) }}" class="slider-image" alt="{{ $slider->title }}" style="width: 100px">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-1">{{ $slider->title }}</h6>
                                            <span class="badge bg-{{ $slider->is_active ? 'success' : 'secondary' }}">
                                                {{ $slider->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </div>
                                        <p class="mb-1 text-muted">{{ $slider->description }}</p>
                                        <small class="text-muted">Urutan: {{ $slider->order }}</small>
                                    </div>
                                    <div class="ms-3">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editSliderModal{{ $slider->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.pengaturan.slider.hapus', $slider->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus slider ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Edit Slider Modal -->
                                <div class="modal fade" id="editSliderModal{{ $slider->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Slider</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.pengaturan.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="title{{ $slider->id }}" class="form-label">Judul</label>
                                                        <input type="text" class="form-control" id="title{{ $slider->id }}" name="title" value="{{ $slider->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description{{ $slider->id }}" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="description{{ $slider->id }}" name="description" rows="3">{{ $slider->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image{{ $slider->id }}" class="form-label">Gambar</label>
                                                        <input type="file" class="form-control" id="image{{ $slider->id }}" name="image" accept="image/*">
                                                        <div class="form-text">Kosongkan jika tidak ingin mengubah gambar</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="order{{ $slider->id }}" class="form-label">Urutan</label>
                                                        <input type="number" class="form-control" id="order{{ $slider->id }}" name="order" value="{{ $slider->order }}">
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="is_active{{ $slider->id }}" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="is_active{{ $slider->id }}">
                                                            Aktif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                @if($sliders->isEmpty())
                                <div class="list-group-item text-center text-muted py-4">
                                    <i class="fas fa-image fa-3x mb-3"></i>
                                    <p>Belum ada slider. Tambahkan slider pertama Anda.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Slider Management -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="setting-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="mb-0">Tentang Desa</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAboutSliderModal">
                                    <i class="fas fa-plus me-2"></i>Tambah Slider
                                </button>
                            </div>
                            
                            <div class="list-group">
                                @foreach($aboutSliders as $slider)
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ asset('storage/' . $slider->image) }}" class="slider-image" alt="{{ $slider->title }}" style="width: 100px; height: 80px; object-fit: cover;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-1">{{ $slider->title }}</h6>
                                            <span class="badge bg-{{ $slider->is_active ? 'success' : 'secondary' }}">
                                                {{ $slider->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </div>
                                        <p class="mb-1 text-muted">{{ Str::limit($slider->description, 100) }}</p>
                                        <small class="text-muted">Urutan: {{ $slider->order }}</small>
                                    </div>
                                    <div class="ms-3">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editAboutSliderModal{{ $slider->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.pengaturan.about-slider.hapus', $slider->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus slider ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Edit About Slider Modal -->
                                <div class="modal fade" id="editAboutSliderModal{{ $slider->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Slider Tentang Desa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.pengaturan.about-slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="about_title{{ $slider->id }}" class="form-label">Judul</label>
                                                        <input type="text" class="form-control" id="about_title{{ $slider->id }}" name="title" value="{{ $slider->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="about_description{{ $slider->id }}" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="about_description{{ $slider->id }}" name="description" rows="3">{{ $slider->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="about_image{{ $slider->id }}" class="form-label">Gambar</label>
                                                        <input type="file" class="form-control" id="about_image{{ $slider->id }}" name="image" accept="image/*">
                                                        <div class="form-text">Kosongkan jika tidak ingin mengubah gambar</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="about_order{{ $slider->id }}" class="form-label">Urutan</label>
                                                        <input type="number" class="form-control" id="about_order{{ $slider->id }}" name="order" value="{{ $slider->order }}">
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="about_is_active{{ $slider->id }}" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="about_is_active{{ $slider->id }}">
                                                            Aktif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                @if($aboutSliders->isEmpty())
                                <div class="list-group-item text-center text-muted py-4">
                                    <i class="fas fa-image fa-3x mb-3"></i>
                                    <p>Belum ada slider tentang desa. Tambahkan slider pertama Anda.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dusun Management -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="setting-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="mb-0">Data Dusun</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDusunModal">
                                    <i class="fas fa-plus me-2"></i>Tambah Dusun
                                </button>
                            </div>
                            
                            <div class="list-group">
                                @foreach($dusuns as $dusun)
                                <div class="list-group-item">
                                    <div class="d-flex align-items-center">
                                        @if($dusun->image)
                                        <div class="me-3">
                                            <img src="{{ asset('storage/' . $dusun->image) }}" class="slider-image" alt="{{ $dusun->name }}" style="width: 100px; height: 80px; object-fit: cover;">
                                        </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="mb-1">{{ $dusun->name }}</h6>
                                                <span class="badge bg-{{ $dusun->is_active ? 'success' : 'secondary' }}">
                                                    {{ $dusun->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small class="text-muted">Kepala Dusun: {{ $dusun->head_name ?? '-' }}</small><br>
                                                    <small class="text-muted">Telp: {{ $dusun->head_phone ?? '-' }}</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <small class="text-muted">Penduduk: {{ number_format($dusun->population) }}</small><br>
                                                    <small class="text-muted">KK: {{ number_format($dusun->households) }}</small>
                                                </div>
                                            </div>
                                            @if($dusun->description)
                                            <p class="mb-1 text-muted mt-2">{{ Str::limit($dusun->description, 150) }}</p>
                                            @endif
                                        </div>
                                        <div class="ms-3">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editDusunModal{{ $dusun->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('admin.pengaturan.dusun.hapus', $dusun->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data dusun ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Dusun Modal -->
                                <div class="modal fade" id="editDusunModal{{ $dusun->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Dusun</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.pengaturan.dusun.update', $dusun->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="dusun_name{{ $dusun->id }}" class="form-label">Nama Dusun</label>
                                                                <input type="text" class="form-control" id="dusun_name{{ $dusun->id }}" name="name" value="{{ $dusun->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="dusun_order{{ $dusun->id }}" class="form-label">Urutan</label>
                                                                <input type="number" class="form-control" id="dusun_order{{ $dusun->id }}" name="order" value="{{ $dusun->order }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="dusun_head_name{{ $dusun->id }}" class="form-label">Nama Kepala Dusun</label>
                                                                <input type="text" class="form-control" id="dusun_head_name{{ $dusun->id }}" name="head_name" value="{{ $dusun->head_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="dusun_head_phone{{ $dusun->id }}" class="form-label">Telepon Kepala Dusun</label>
                                                                <input type="text" class="form-control" id="dusun_head_phone{{ $dusun->id }}" name="head_phone" value="{{ $dusun->head_phone }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="dusun_population{{ $dusun->id }}" class="form-label">Jumlah Penduduk</label>
                                                                <input type="number" class="form-control" id="dusun_population{{ $dusun->id }}" name="population" value="{{ $dusun->population }}" min="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="dusun_households{{ $dusun->id }}" class="form-label">Jumlah KK</label>
                                                                <input type="number" class="form-control" id="dusun_households{{ $dusun->id }}" name="households" value="{{ $dusun->households }}" min="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dusun_description{{ $dusun->id }}" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="dusun_description{{ $dusun->id }}" name="description" rows="3">{{ $dusun->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dusun_image{{ $dusun->id }}" class="form-label">Gambar</label>
                                                        <input type="file" class="form-control" id="dusun_image{{ $dusun->id }}" name="image" accept="image/*">
                                                        <div class="form-text">Kosongkan jika tidak ingin mengubah gambar, Max ukuran gambar (2MB) format png,jpg,jpeg</div>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="dusun_is_active{{ $dusun->id }}" name="is_active" value="1" {{ $dusun->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="dusun_is_active{{ $dusun->id }}">
                                                            Aktif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                @if($dusuns->isEmpty())
                                <div class="list-group-item text-center text-muted py-4">
                                    <i class="fas fa-map-marker-alt fa-3x mb-3"></i>
                                    <p>Belum ada data dusun. Tambahkan data dusun pertama.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Tambah Slider Modal -->
    <div class="modal fade" id="tambahSliderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Slider Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.pengaturan.slider.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="order" class="form-label">Urutan</label>
                            <input type="number" class="form-control" id="order" name="order" value="0">
                        </div>
                        <div class="form-check mb-3">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah About Slider -->
    <div class="modal fade" id="tambahAboutSliderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Slider Tentang Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.pengaturan.about-slider.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="about_title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="about_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="about_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="about_image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="about_image" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="about_order" class="form-label">Urutan</label>
                            <input type="number" class="form-control" id="about_order" name="order" value="0">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="about_is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="about_is_active">
                                Aktif
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Dusun -->
    <div class="modal fade" id="tambahDusunModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Dusun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.pengaturan.dusun.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dusun_name" class="form-label">Nama Dusun</label>
                                    <input type="text" class="form-control" id="dusun_name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dusun_order" class="form-label">Urutan</label>
                                    <input type="number" class="form-control" id="dusun_order" name="order" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dusun_head_name" class="form-label">Nama Kepala Dusun</label>
                                    <input type="text" class="form-control" id="dusun_head_name" name="head_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dusun_head_phone" class="form-label">Telepon Kepala Dusun</label>
                                    <input type="text" class="form-control" id="dusun_head_phone" name="head_phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dusun_population" class="form-label">Jumlah Penduduk</label>
                                    <input type="number" class="form-control" id="dusun_population" name="population" value="0" min="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dusun_households" class="form-label">Jumlah KK</label>
                                    <input type="number" class="form-control" id="dusun_households" name="households" value="0" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="dusun_description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="dusun_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dusun_image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="dusun_image" name="image" accept="image/*">
                            <div class="form-text">Max ukuran gambar (2MB) format png,jpg,jpeg</div>

                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="dusun_is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="dusun_is_active">
                                Aktif
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Dusun</button>
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

          // Script untuk menangani modal errors
          @if($errors->any())
                @if($errors->has('title') || $errors->has('description') || $errors->has('image'))
                    document.addEventListener('DOMContentLoaded', function() {
                        var modal = new bootstrap.Modal(document.getElementById('tambahSliderModal'));
                        modal.show();
                    });
                @endif
                @foreach($sliders as $slider)
                    @if($errors->has('title.'.$slider->id) || $errors->has('description.'.$slider->id))
                        document.addEventListener('DOMContentLoaded', function() {
                            var modal = new bootstrap.Modal(document.getElementById('editSliderModal{{ $slider->id }}'));
                            modal.show();
                        });
                    @endif
                @endforeach
            @endif

            // Script untuk menangani modal errors
            @if($errors->any())
                @if($errors->has('title') || $errors->has('description') || $errors->has('image'))
                    @if(request()->is('admin/pengaturan/informasi'))
                        document.addEventListener('DOMContentLoaded', function() {
                            var modal = new bootstrap.Modal(document.getElementById('tambahSliderModal'));
                            modal.show();
                        });
                    @endif
                @endif
                
                @if($errors->has('about_title') || $errors->has('about_description') || $errors->has('about_image'))
                    document.addEventListener('DOMContentLoaded', function() {
                        var modal = new bootstrap.Modal(document.getElementById('tambahAboutSliderModal'));
                        modal.show();
                    });
                @endif
                
                @if($errors->has('dusun_name') || $errors->has('dusun_head_name') || $errors->has('dusun_image'))
                    document.addEventListener('DOMContentLoaded', function() {
                        var modal = new bootstrap.Modal(document.getElementById('tambahDusunModal'));
                        modal.show();
                    });
                @endif
            @endif
    </script>
           
</body>
</html>