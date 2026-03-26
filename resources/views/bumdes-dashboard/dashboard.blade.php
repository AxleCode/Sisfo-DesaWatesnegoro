<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo_mojokerto.png') }}">
    <title>Dashboard BUMDES - Sistem Desa Watesnegoro</title>

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

        /* Sidebar Styles (samakan dengan dashboard admin) */
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

        #content {
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
            min-height: 100vh;
        }

        #content.collapsed {
            margin-left: 0;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: var(--header-height);
            padding: 0 20px;
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
            height: 100%;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            margin-right: 15px;
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
            #sidebar {
                transform: translateX(-100%);
            }
            #sidebar:not(.collapsed) {
                transform: translateX(0);
            }
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
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="mb-3">Dashboard BUMDES</h2>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            <div>Selamat datang {{ Auth::user()->name }}. Anda dapat mengatur foto slider dan link spreadsheet untuk halaman <code>/bumdes</code>.</div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="dashboard-card d-flex align-items-center">
                            <div class="card-icon" style="background: var(--secondary-color);">
                                <i class="fas fa-images"></i>
                            </div>
                            <div>
                                <div class="text-muted">Total Foto Slider</div>
                                <div class="fs-3 fw-bold">{{ $fotoCount }}</div>
                                <div class="small text-muted">Aktif: {{ $activeFotoCount }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dashboard-card d-flex align-items-center">
                            <div class="card-icon" style="background: var(--primary-color);">
                                <i class="fas fa-link"></i>
                            </div>
                            <div class="w-100">
                                <div class="text-muted">Link Spreadsheet</div>
                                <div class="fw-semibold text-truncate" style="max-width: 100%;">
                                    {{ $spreadsheetUrl ?: 'Belum diset' }}
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('bumdes.link') }}" class="btn btn-sm btn-outline-success">Atur Link</a>
                                    <a href="{{ route('bumdes') }}" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener noreferrer">Lihat Halaman Publik</a>
                                </div>
                            </div>
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

