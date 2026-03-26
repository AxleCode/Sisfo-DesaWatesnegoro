<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo_mojokerto.png') }}">
    <title>Dashboard BUMDES - Link Spreadsheet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet" />

    <style>
        :root {
            --primary-color: #2c6e49;
            --secondary-color: #4c956c;
            --sidebar-width: 280px;
            --header-height: 70px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar Styles (samakan dengan dashboard admin) */
        #sidebar {
            position: fixed;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--dark-color, #1b4332);
            color: white;
            transition: transform 0.3s ease, width 0.3s ease;
            z-index: 1000;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transform: translateX(0);
        }
        #sidebar.collapsed,
        #sidebar.active {
            transform: translateX(-100%);
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
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
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

        #content { margin-left: var(--sidebar-width); transition: all 0.3s; min-height: 100vh; }
        #content.collapsed { margin-left: 0; }
        .navbar { background-color: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); height: var(--header-height); padding: 0 20px; }
        .main-content { padding: 20px; }
        .setting-card { background: white; border-radius: 10px; box-shadow: 0 3px 10px rgba(0,0,0,0.08); padding: 20px; margin-bottom: 20px; }
        .overlay { display:none; position:fixed; width:100vw; height:100vh; z-index:1099; opacity:0; transition:opacity .25s ease; }
        .overlay.active { display:block; opacity:1; }
        @media (max-width: 768px) {
            #content { margin-left: 0; }
            #sidebar { transform: translateX(-100%); }
            #sidebar:not(.collapsed) { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    @include('components.sidebar-bumdes')

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn" aria-label="Toggle sidebar" style="background: var(--primary-color); color: white; border: none;">
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
                        <h2 class="mb-0">Link Spreadsheet</h2>
                        <p class="text-muted mb-0">Link ini akan di-embed di halaman publik <code>/bumdes</code>.</p>
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
                            <form action="{{ route('bumdes.link.simpan') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">URL Spreadsheet</label>
                                    <input type="text" class="form-control" name="url" value="{{ old('url', $link?->url) }}" placeholder="https://docs.google.com/spreadsheets/d/.../edit?usp=sharing" required>
                                    <div class="form-text">Boleh URL <code>/edit</code>, halaman publik otomatis pakai <code>/preview</code>.</div>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $link?->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label">Aktif</label>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Simpan
                                    </button>
                                    @if(!empty($link?->url))
                                        <a class="btn btn-outline-success" href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-external-link-alt me-2"></i>Buka Spreadsheet
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

