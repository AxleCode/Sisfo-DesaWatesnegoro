<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo_mojokerto.png') }}">
    <title>Dashboard - BUMDES</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet" />

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

        .slider-image {
            width: 110px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(0,0,0,.08);
        }

        .overlay {
            display: none;
            position: fixed;
            width: 100vw;
            height: 100vh;
            z-index: 1099;
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .overlay.active {
            display: block;
            opacity: 1;
        }

        @media (max-width: 768px) {
            #content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    @include('components.sidebar')

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ms-auto d-flex align-items-center">
                    <span class="me-2">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </nav>

        <div class="main-content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="mb-0">Foto Slider BUMDES</h2>
                        <p class="text-muted mb-0">Atur foto slider untuk halaman publik <code>/bumdes</code>.</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="setting-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="mb-0">Daftar Foto</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahFotoModal">
                                    <i class="fas fa-plus me-2"></i>Tambah Foto
                                </button>
                            </div>

                            <div class="list-group">
                                @foreach($slides as $slide)
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{ asset('storage/' . $slide->image) }}" class="slider-image" alt="{{ $slide->title }}">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="mb-1">{{ $slide->title }}</h6>
                                                <span class="badge bg-{{ $slide->is_active ? 'success' : 'secondary' }}">
                                                    {{ $slide->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </div>
                                            @if(!empty($slide->description))
                                                <p class="mb-1 text-muted">{{ $slide->description }}</p>
                                            @endif
                                            <small class="text-muted">Urutan: {{ $slide->order }}</small>
                                        </div>
                                        <div class="ms-3">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editFotoModal{{ $slide->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('admin.bumdes.foto.hapus', $slide->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus foto ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="editFotoModal{{ $slide->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Foto Slider</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.bumdes.foto.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Judul</label>
                                                            <input type="text" class="form-control" name="title" value="{{ $slide->title }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" name="description" rows="3">{{ $slide->description }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Gambar</label>
                                                            <input type="file" class="form-control" name="image" accept="image/*">
                                                            <div class="form-text">Kosongkan jika tidak ingin mengubah gambar</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Urutan</label>
                                                            <input type="number" class="form-control" name="order" value="{{ $slide->order }}">
                                                        </div>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $slide->is_active ? 'checked' : '' }}>
                                                            <label class="form-check-label">Aktif</label>
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
                                @endforeach

                                @if($slides->isEmpty())
                                    <div class="list-group-item text-center text-muted py-4">
                                        <i class="fas fa-image fa-3x mb-3"></i>
                                        <p>Belum ada foto slider. Tambahkan foto pertama Anda.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahFotoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Foto Slider BUMDES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.bumdes.foto.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Urutan</label>
                            <input type="number" class="form-control" name="order" value="0">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                            <label class="form-check-label">Aktif</label>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function(e) {
                e.preventDefault();
                $('#sidebar').toggleClass('collapsed');
                $('#content').toggleClass('collapsed');
                $('.overlay').toggleClass('active');
            });

            $('.overlay').on('click', function() {
                $('#sidebar').addClass('collapsed');
                $('#content').addClass('collapsed');
                $('.overlay').removeClass('active');
            });

            $(window).on('resize', function() {
                if ($(window).width() > 768) {
                    $('#sidebar').removeClass('collapsed');
                    $('#content').removeClass('collapsed');
                    $('.overlay').removeClass('active');
                } else {
                    $('#sidebar').addClass('collapsed');
                    $('#content').addClass('collapsed');
                    $('.overlay').removeClass('active');
                }
            }).trigger('resize');
        });
    </script>
</body>
</html>

