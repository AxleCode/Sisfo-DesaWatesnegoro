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

    <!-- Open Street Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Di bagian head -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Sebelum script custom Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

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
        
        #map { 
            height: 500px; 
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .leaflet-container {
            border-radius: 10px;
        }

        .photo-upload-item {
            padding: 15px;
            border: 1px dashed #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .photo-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .existing-photo {
            position: relative;
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        .delete-photo-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #dc3545;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            cursor: pointer;
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">Manajemen Peta Desa</h2>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mapModal">
                                <i class="fas fa-plus me-2"></i>Tambah Pin Baru
                            </button>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        <div class="setting-card">
                            <div id="map" style="height: 500px; border-radius: 10px;"></div>
                        </div>
                    </div>
                </div>
        
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="setting-card">
                            <h4 class="mb-4">Daftar Pin Peta</h4>
                            <div class="table-responsive">
                                <table class="table table-hover" id="mapsTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Koordinat</th>
                                            <th>Tipe</th>
                                            <th>Jumlah Foto</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($maps as $map)
                                        <tr>
                                            <td>
                                                <strong>{{ $map->title }}</strong>
                                                <br>
                                                <small class="text-muted">{{ Str::limit($map->address, 50) }}</small>
                                            </td>
                                            <td>
                                                {{ $map->latitude }}, {{ $map->longitude }}
                                                <br>
                                                <small>
                                                    <a href="{{ $map->link_map }}" target="_blank" class="text-primary">
                                                        Buka di Google Maps
                                                    </a>
                                                </small>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $map->type === 'important' ? 'warning' : ($map->type === 'facility' ? 'info' : 'secondary') }}">
                                                    {{ ucfirst($map->type) }}
                                                </span>
                                            </td>
                                            <td>{{ $map->photos->count() }} Foto</td>
                                            <td>
                                                <span class="badge bg-{{ $map->is_active ? 'success' : 'secondary' }}">
                                                    {{ $map->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    {{-- <button class="btn btn-sm btn-info view-map" data-id="{{ $map->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button> --}}
                                                    <button class="btn btn-sm btn-primary edit-map me-3" data-id="{{ $map->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger delete-map" data-id="{{ $map->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal untuk Tambah/Edit -->
        <div class="modal fade" id="mapModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Tambah Pin Peta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="mapForm">
                        <div class="modal-body">
                            <input type="hidden" id="mapId" name="id">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul Lokasi *</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Tipe Lokasi *</label>
                                        <select class="form-select" id="type" name="type" required>
                                            <option value="general">General</option>
                                            <option value="important">Important</option>
                                            <option value="facility">Facility</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label">Latitude *</label>
                                        <input type="number" step="any" class="form-control" id="latitude" name="latitude" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label">Longitude *</label>
                                        <input type="number" step="any" class="form-control" id="longitude" name="longitude" required>
                                    </div>
                                </div>
                            </div>
        
                            <div class="mb-3">
                                <label for="link_map" class="form-label">Link Google Maps</label>
                                <input type="text" class="form-control" id="link_map" name="link_map" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6" style="display: none">
                                    <div class="mb-3">
                                        <label for="color" class="form-label">Warna Pin</label>
                                        <input type="color" class="form-control" id="color" name="color" value="#FF0000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                            <label class="form-check-label" for="is_active">Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <!-- Photo Upload Section -->
                            <div class="mb-3">
                                <label class="form-label">Foto Lokasi (Maksimal 3)</label>
                                <div id="photoUploads">
                                    <div class="photo-upload-item mb-3">
                                        <input type="file" class="form-control" name="photos[]" accept="image/*">
                                        <input type="text" class="form-control mt-2" name="captions[]" placeholder="Keterangan foto">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="addPhotoField">
                                    <i class="fas fa-plus me-1"></i>Tambah Foto
                                </button>
                            </div>
        
                            <!-- Existing Photos (for edit) -->
                            <div id="existingPhotos" class="d-none">
                                <h6>Foto Terpasang</h6>
                                <div id="existingPhotosList"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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

        document.addEventListener('DOMContentLoaded', function() {
            let map, markers = [];
            let editMode = false;
            let currentMapId = null;

            // Initialize map
            function initMap() {
                // Koordinat default
                const defaultLatitude = -7.564947;
                const defaultLongitude = 112.652278;
            
                map = L.map('map').setView([defaultLatitude, defaultLongitude], 15);
                    
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                // Load existing markers
                loadMapData();
            }

            // Load map data from server
            function loadMapData() {
                fetch('{{ route("peta.data") }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            clearMarkers();
                            data.data.forEach(mapItem => {
                                addMarker(mapItem);
                            });
                        }
                    });
            }

            // Add marker to map
            function addMarker(mapData) {
                const marker = L.marker([mapData.latitude, mapData.longitude])
                    .addTo(map)
                    .bindPopup(`
                        <div style="max-width: 250px;">
                            <h5>${mapData.title}</h5>
                            <p>${mapData.description || ''}</p>
                            ${mapData.photos.length > 0 ? 
                                `<img src="/storage/${mapData.photos[0].photo_path}" 
                                    style="width: 100%; height: 100px; object-fit: cover; border-radius: 5px; margin-bottom: 10px;">` : ''}
                            <div class="d-flex justify-content-between">
                                <a href="${mapData.link_map}" target="_blank" 
                                style="font-size: 12px; color: #007bff; text-decoration: none;">
                                    📍 Buka di Google Maps
                                </a>
                                <button onclick="editMap(${mapData.id})" 
                                        style="font-size: 12px; border: none; background: #007bff; color: white; padding: 2px 8px; border-radius: 3px; cursor: pointer;">
                                    Edit
                                </button>
                            </div>
                        </div>
                    `);

                markers.push(marker);
            }

            // Clear all markers
            function clearMarkers() {
                markers.forEach(marker => map.removeLayer(marker));
                markers = [];
            }

            // Initialize map
            initMap();

            // Photo upload management
            let photoCount = 1;
            const maxPhotos = 3;

            document.getElementById('addPhotoField').addEventListener('click', function() {
                if (photoCount < maxPhotos) {
                    const photoUploads = document.getElementById('photoUploads');
                    const newItem = document.createElement('div');
                    newItem.className = 'photo-upload-item mb-3';
                    newItem.innerHTML = `
                        <input type="file" class="form-control" name="photos[]" accept="image/*">
                        <input type="text" class="form-control mt-2" name="captions[]" placeholder="Keterangan foto">
                        <button type="button" class="btn btn-sm btn-outline-danger mt-2 remove-photo" 
                                onclick="this.parentElement.remove(); photoCount--;">
                            <i class="fas fa-times"></i> Hapus
                        </button>
                    `;
                    photoUploads.appendChild(newItem);
                    photoCount++;
                } else {
                    alert('Maksimal 3 foto per lokasi');
                }
            });

            // Form submission
            document.getElementById('mapForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData();
                
                // Jika edit mode, tambahkan _method dengan nilai 'PUT'
                if (editMode) {
                    formData.append('_method', 'PUT');
                }
                
                // Ambil nilai dari form dan tambahkan ke FormData tanpa prefix
                formData.append('title', document.getElementById('title').value);
                formData.append('description', document.getElementById('description').value);
                formData.append('latitude', document.getElementById('latitude').value);
                formData.append('longitude', document.getElementById('longitude').value);
                formData.append('address', document.getElementById('address').value);
                formData.append('link_map', document.getElementById('link_map').value);
                formData.append('type', document.getElementById('type').value);
                formData.append('color', document.getElementById('color').value);
                formData.append('is_active', document.getElementById('is_active').checked ? '1' : '0');
                
                // Handle files
                const photoFiles = document.querySelectorAll('input[name="photos[]"]');
                photoFiles.forEach((fileInput, index) => {
                    if (fileInput.files[0]) {
                        formData.append('photos[]', fileInput.files[0]);
                        const caption = document.querySelectorAll('input[name="captions[]"]')[index];
                        if (caption) formData.append('captions[]', caption.value);
                    }
                });
                
                // Handle delete photos
                document.querySelectorAll('input[name="delete_photos[]"]').forEach(input => {
                    formData.append('delete_photos[]', input.value);
                });

                const url = editMode ? `/peta/${currentMapId}` : '/peta';
                // Kita ubah method menjadi selalu POST, dan jika edit, kita tambahkan _method
                const method = 'POST';

                fetch(url, {
                    method: method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        $('#mapModal').modal('hide');
                        Swal.fire('Sukses!', data.message, 'success');
                        location.reload();
                    } else {
                        Swal.fire('Error!', data.errors ? Object.values(data.errors).join('\n') : 'Terjadi kesalahan', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error!', 'Terjadi kesalahan', 'error');
                });
            });

            // Edit map function
            window.editMap = function(mapId) {
                fetch(`/peta/${mapId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const map = data.data;
                            currentMapId = map.id;
                            editMode = true;

                            // Fill form data
                            document.getElementById('modalTitle').textContent = 'Edit Pin Peta';
                            document.getElementById('mapId').value = map.id;
                            document.getElementById('title').value = map.title;
                            document.getElementById('description').value = map.description || '';
                            document.getElementById('latitude').value = map.latitude;
                            document.getElementById('longitude').value = map.longitude;
                            document.getElementById('address').value = map.address || '';
                            document.getElementById('link_map').value = map.link_map || '';
                            document.getElementById('type').value = map.type;
                            document.getElementById('color').value = map.color || '#FF0000';
                            document.getElementById('is_active').checked = map.is_active;

                            // Show existing photos
                            const existingPhotosDiv = document.getElementById('existingPhotos');
                            const existingPhotosList = document.getElementById('existingPhotosList');
                            existingPhotosDiv.classList.remove('d-none');
                            existingPhotosList.innerHTML = '';

                            map.photos.forEach(photo => {
                                existingPhotosList.innerHTML += `
                                    <div class="existing-photo mb-3" style="position: relative; display: inline-block; margin-right: 10px;">
                                        <img src="/storage/${photo.photo_path}" 
                                            class="photo-preview" 
                                            alt="${photo.caption || 'Photo'}"
                                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                        <button type="button" class="btn btn-sm btn-danger delete-photo-btn" 
                                                style="position: absolute; top: 0; right: 0;"
                                                onclick="deletePhoto(${photo.id}, this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <div style="font-size: 12px; text-align: center; margin-top: 5px;">
                                            ${photo.caption || 'No caption'}
                                        </div>
                                    </div>
                                `;
                            });

                            $('#mapModal').modal('show');
                        }
                    });
            };

            // Delete photo function
            window.deletePhoto = function(photoId, element) {
                // Create hidden input for deleted photos if it doesn't exist
                if (!document.querySelector('input[name="delete_photos[]"]')) {
                    const deletePhotosContainer = document.createElement('div');
                    deletePhotosContainer.id = 'deletePhotosContainer';
                    document.getElementById('mapForm').appendChild(deletePhotosContainer);
                }
                
                // Add hidden input for this photo ID
                const deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = 'delete_photos[]';
                deleteInput.value = photoId;
                document.getElementById('mapForm').appendChild(deleteInput);

                // Remove the photo element from display
                element.closest('.existing-photo').remove();
            };

            // Add event listeners for edit buttons
            document.querySelectorAll('.edit-map').forEach(btn => {
                btn.addEventListener('click', function() {
                    const mapId = this.dataset.id;
                    editMap(mapId);
                });
            });

            // Add event listeners for view buttons
            document.querySelectorAll('.view-map').forEach(btn => {
                btn.addEventListener('click', function() {
                    const mapId = this.dataset.id;
                    // Implement view functionality here
                    alert('Fitur lihat detail untuk ID: ' + mapId);
                });
            });

            // Add event listeners for delete buttons
            document.querySelectorAll('.delete-map').forEach(btn => {
                btn.addEventListener('click', function() {
                    const mapId = this.dataset.id;
                    
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/peta/${mapId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Terhapus!', data.message, 'success');
                                    loadMapData();
                                    location.reload();
                                } else {
                                    Swal.fire('Error!', 'Gagal menghapus data', 'error');
                                }
                            })
                            .catch(error => {
                                Swal.fire('Error!', 'Terjadi kesalahan', 'error');
                            });
                        }
                    });
                });
            });

            // Reset modal when closed
            $('#mapModal').on('hidden.bs.modal', function() {
                document.getElementById('mapForm').reset();
                document.getElementById('modalTitle').textContent = 'Tambah Pin Peta';
                document.getElementById('existingPhotos').classList.add('d-none');
                document.getElementById('existingPhotosList').innerHTML = '';
                document.getElementById('photoUploads').innerHTML = `
                    <div class="photo-upload-item mb-3">
                        <input type="file" class="form-control" name="photos[]" accept="image/*">
                        <input type="text" class="form-control mt-2" name="captions[]" placeholder="Keterangan foto">
                    </div>
                `;
                
                // Remove any delete_photos inputs
                document.querySelectorAll('input[name="delete_photos[]"]').forEach(input => input.remove());
                
                editMode = false;
                currentMapId = null;
                photoCount = 1;
            });
        });
    </script>
           
</body>
</html>