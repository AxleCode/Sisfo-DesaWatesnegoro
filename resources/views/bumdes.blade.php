<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo_mojokerto.png">
    <title>BUMDES || Pemerintah Desa Watesnegoro</title>

    <meta name="description" content="Halaman BUMDES Desa Watesnegoro.">
    <meta name="keywords" content="BUMDES, Desa Watesnegoro">
    <meta name="author" content="Pemerintah Desa Watesnegoro">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .navbar {
            background-color: var(--primary-color) !important;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .hero-slider {
            height: 88vh;
            overflow: hidden;
        }

        .carousel-item {
            height: 80vh;
            background-position: center;
            background-size: cover;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 20px;
        }

        .section-title {
            position: relative;
            margin-bottom: 40px;
            font-weight: 700;
            text-align: center;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--secondary-color);
        }

        .sheet-wrap {
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,.08);
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            background: #fff;
        }
    </style>
</head>
<body id="bumdes">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex flex-column align-items-start" href="{{ route('home') }}">
                <img src="images/FElogo.png" class="mb-1" alt="Logo" width="200px">
                <span class="fs-5">Pemerintah Desa Watesnegoro</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fs-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('bumdes') }}">BUMDES</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Slider Section (sama seperti index) -->
    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            @php
                $hasSlides = isset($slides) && $slides instanceof \Illuminate\Support\Collection && $slides->isNotEmpty();
            @endphp

            <div class="carousel-indicators">
                @if ($hasSlides)
                    @foreach ($slides as $i => $slide)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></button>
                    @endforeach
                @else
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                @endif
            </div>
            <div class="carousel-inner">
                @if ($hasSlides)
                    @foreach ($slides as $i => $slide)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
                            <div class="carousel-caption">
                                <h2>{{ $slide->title }}</h2>
                                @if (!empty($slide->description))
                                    <p>{{ $slide->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active" style="background-image: url('images/gambar_header1.png');">
                        <div class="carousel-caption">
                            <h2>BUMDES Desa Watesnegoro</h2>
                            <p>Silakan atur foto slider BUMDES dari dashboard.</p>
                        </div>
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Section 2: View dari link Spreadsheet -->
    <section class="py-5" style="background: #f7faf8;">
        <div class="container">
            <h2 class="section-title">Data Laporan BUMDES Watesnegoro</h2>

            @php
                $raw = is_string($spreadsheetUrl ?? null) ? trim($spreadsheetUrl) : '';
                $embedUrl = $raw;
                if ($raw && str_contains($raw, '/edit')) {
                    $embedUrl = preg_replace('#/edit(\?.*)?$#', '/preview', $raw);
                }
            @endphp

            @if (!$raw)
                <div class="alert alert-warning mb-0">
                    Link spreadsheet belum diisi. Silakan atur link Spreadsheet dari dashboard BUMDES.
                </div>
            @else
                <div class="sheet-wrap">
                    <iframe
                        src="{{ $embedUrl }}"
                        style="width: 100%; height: 80vh; border: 0;"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>
                </div>
                <div class="text-center mt-3">
                    <a class="btn btn-outline-success" href="{{ $raw }}" target="_blank" rel="noopener noreferrer">
                        Buka Spreadsheet
                    </a>
                </div>
            @endif
        </div>
    </section>

    <footer class="py-4" style="background: var(--primary-color); color: white;">
        <div class="container text-center">
            <small>&copy; 2025 Pemerintah Desa Watesnegoro. All Rights Reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

