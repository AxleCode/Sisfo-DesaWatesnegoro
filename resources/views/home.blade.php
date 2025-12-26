<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo_mojokerto.png">
    <title>Pemerintah Desa Watesnegoro || Sisfo Desa Watesnegoro</title>

    <meta name="description" content="Desa Watesnegoro adalah sebuah desa yang terletak di kecamatan ngoro yang subur dengan pemandangan alam yang indah. Desa kami memiliki berbagai potensi dalam bidang pertanian, peternakan, dan kerajinan tangan.">
    
    <meta name="keywords" content="Desa Watesnegoro">
    <meta name="author" content="Pemerintah Desa Watesnegoro">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://watesnegoro.free.nf"> <!-- Ganti URL sesuai domain asli -->
    <meta property="og:title" content="Pemerintah Desa Watesnegoro | Desa Watesnegoro Ngoro Mojokerto">
    <meta property="og:image" content="https://watesnegoro.free.nf/images/logo_mojokerto.png">
    <meta property="og:url" content="https://watesnegoro.free.nf"> <!-- Ganti sesuai domain -->
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    <!-- My Own Styles -->
    <!-- {{-- <link rel="stylesheet" href="css/style.css"> --}} -->

    <!-- Bootstrap 5 + FontAwesome -->
    <!-- {{-- <link rel="stylesheet" href="{{ asset('bootstrap-5.3.7-dist/css/bootstrap.min.css') }}">--}} -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet"
    />

    <!-- Include Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Custom CSS -->
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
            padding-bottom: 15px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .about-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .news-section {
            padding: 80px 0;
        }
        
        .news-card {
            transition: transform 0.3s;
            height: 100%;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .instagram-card {
            overflow: hidden;
        }
        
        .instagram-embed-wrapper {
            width: 100%;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .instagram-embed-wrapper blockquote {
            width: 100% !important;
            min-width: 100% !important;
            margin: 0 !important;
        }
        
        .download-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .download-item {
            border-left: 4px solid var(--primary-color);
            padding-left: 15px;
            margin-bottom: 20px;
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 40px 0 20px;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: color 0.3s;
        }
        
        .social-links a:hover {
            color: var(--light-color);
        }

        .hero-slider .carousel-item {
            height: 88vh;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .download-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .download-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            height: 100%;
            transition: transform 0.3s ease;
        }

        .download-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .download-item h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .download-item p {
            color: #666;
            margin-bottom: 15px;
        }

        .toggle-files {
            transition: all 0.3s ease;
        }

        .toggle-files:hover {
            transform: translateY(-2px);
        }

        .map-section {
            padding: 80px 0;
        }

        #homeMap {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 3px solid white;
            width: 100%;
            height: 100vh; /* penuh layar, atau bisa pakai 500px misalnya */

        }

/* Untuk mobile responsiveness */
@media (max-width: 768px) {
    .hero-slider .carousel-item {
        height: 60vh;
    }
    
    .carousel-caption h2 {
        font-size: 1.5rem;
    }
    
    .carousel-caption p {
        font-size: 0.9rem;
    }
}

/* Memastikan gambar cover seluruh area */
.carousel-item {
    transition: transform 0.6s ease-in-out;
}

.carousel-item img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}
    </style>
</head>
<body id="home">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex flex-column align-items-start" href="#">
                <img src="{{ asset('storage/' . setting('site_logo')) }}" class="mb-1" alt="Logo" width="170px">
                <span class="fs-6">
                    Pemerintah Desa Watesnegoro
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fs-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map-section">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Slider Section -->
    <section class="hero-slider" >
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            
            <!-- Carousel Indicators -->
            @if($sliders->count() > 0)
            <div class="carousel-indicators">
                @foreach($sliders as $index => $slider)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
            @endif
            
            <!-- Carousel Items -->
            <div class="carousel-inner">
                @forelse($sliders as $index => $slider)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" 
                    style="background-image: url('{{ asset('storage/' . $slider->image) }}');">
                    <div class="carousel-caption">
                        <h2>{{ $slider->title }}</h2>
                        @if($slider->description)
                        <p>{{ $slider->description }}</p>
                        @endif
                    </div>
                </div>
                @empty
                <!-- Default sliders jika tidak ada data dari database -->
                <div class="carousel-item active" style="background-image: url('images/gambar_header1.png');">
                    <div class="carousel-caption">
                        <h2>Selamat Datang di Website Desa Watesnegoro</h2>
                        <p>Website resmi pemerintah Desa Watesnegoro untuk memberikan informasi terbaru kepada masyarakat</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Carousel Controls -->
            @if($sliders->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container" style="margin-top: 10px">
            <h2 class="section-title">Tentang Desa Kami</h2>
            
            <!-- About Slider/Carousel -->
            @if($aboutSliders->count() > 0)
            <div class="row mb-5">
                <div class="col-12">
                    <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($aboutSliders as $index => $slider)
                            <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="{{ $index }}" 
                                class="{{ $index === 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner rounded">
                            @foreach($aboutSliders as $index => $slider)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}" style="height: 100%; object-fit: cover; width:100%;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $slider->title }}</h5>
                                    <p>{{ $slider->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if($aboutSliders->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Data Dusun Section -->
            @if($dusuns->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="section-title">Dusun di Desa Watesnegoro</h3>
                    <div class="row">
                        @foreach($dusuns as $dusun)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                @if($dusun->image)
                                <img src="{{ asset('storage/' . $dusun->image) }}" class="card-img-top" alt="{{ $dusun->name }}" style="height: 200px; object-fit: cover;">
                                @else
                                <img src="https://images.unsplash.com/photo-1567016376408-22d2b7dfc7b9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="{{ $dusun->name }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dusun->name }}</h5>
                                    @if($dusun->head_name)
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>Kepala Dusun: {{ $dusun->head_name }}
                                            @if($dusun->head_phone)
                                            <br><i class="fas fa-phone me-1"></i>{{ $dusun->head_phone }}
                                            @endif
                                        </small>
                                    </p>
                                    @endif
                                    <div class="d-flex justify-content-between">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-users me-1"></i>{{ number_format($dusun->population) }} Penduduk
                                        </span>
                                        <span class="badge bg-success">
                                            <i class="fas fa-home me-1"></i>{{ number_format($dusun->households) }} KK
                                        </span>
                                    </div>
                                    @if($dusun->description)
                                    <p class="card-text mt-2 small">{{ Str::limit($dusun->description, 1000) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Map Section -->
    <section id="map-section" class="map-section bg-light">
        <div class="container" style="margin-top: 10px">
            <h2 class="section-title">Peta Desa Watesnegoro</h2>
            <p class="text-center ">*Klik pin lokasi untuk mengetahui informasi tempat</p>
            <p class="text-center mb-4" style="margin-top: -15px">Temukan lokasi penting dan fasilitas di Desa Watesnegoro</p>
            
            <div class="row">
                <div class="col-12">
                    <div id="homeMap" style="height: 600px; border-radius: 10px;"></div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="https://maps.app.goo.gl/dLHVGtu1ow9Gpqux6" target="blank_" class="btn btn-primary">
                    <i class="fas fa-map-marked-alt me-2"></i>Buka Maps
                </a>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="news-section">
        <div class="container" style="margin-top: 10px">
            <h2 class="section-title">Berita dan Informasi Terbaru</h2>
            <div class="row">
                @foreach($latestNews as $news)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card news-card">
                        <img src="{{ asset('storage/' . $news->featured_image) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-{{ $news->category->color }} mb-2">{{ $news->category->name }}</span>
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ $news->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="far fa-calendar me-1"></i>
                                    {{ $news->created_at->locale('id')->diffForHumans() }}

                                </small>
                                <a href="{{ route('berita.show', $news->slug) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if($latestNews->isEmpty())
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-newspaper me-2"></i>
                        Belum ada berita terbaru.
                    </div>
                </div>
                @endif
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('berita') }}" class="btn btn-primary">Lihat Berita Lainnya</a>
            </div>
        </div>
    </section>

    <!-- Instagram Reels Section -->
    @if(!empty($instagramReels))
    <section id="news-social-media" class="news-section">
        <div class="container" style="margin-top: 10px">
            <h2 class="section-title">Media Sosial</h2>
            <div class="row">
                @php
                    $itemsPerPage = 6;
                @endphp
                
                @foreach($instagramReels as $index => $reelUrl)
                @php
                    $pageNumber = ceil(($index + 1) / $itemsPerPage);
                @endphp
                <div class="col-md-6 col-lg-4 mb-4 instagram-card-item" data-page="{{ $pageNumber }}" style="display: {{ $index < $itemsPerPage ? 'block' : 'none' }};">
                    <div class="card news-card instagram-card">
                        <div class="card-body p-0">
                            <div class="instagram-embed-wrapper">
                                <blockquote class="instagram-media" data-instgrm-permalink="{{ $reelUrl }}" data-instgrm-version="14" style="background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:100%; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box;">
                                    <div style="padding:16px;">
                                        <a href="{{ $reelUrl }}" style="background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                                            <div style="display: flex; flex-direction: row; align-items: center;">
                                                <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                                                <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                    <div style="background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                                                    <div style="background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                                                </div>
                                            </div>
                                            <div style="padding: 19% 0;"></div>
                                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;">
                                                <svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                            <g>
                                                                <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div style="padding-top: 8px;">
                                                <div style="color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">Lihat postingan ini di Instagram</div>
                                            </div>
                                            <p style="color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                                                <a href="{{ $reelUrl }}" style="color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Lihat postingan ini di Instagram</a>
                                            </p>
                                        </a>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                {{-- Pagination untuk Instagram Cards --}}
                @if(count($instagramReels) > $itemsPerPage)
                <div class="col-12 mt-4">
                    <div id="instagram-pagination" class="d-flex justify-content-center"></div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Download Section -->
    <section id="download" class="download-section">
        <div class="container" style="margin-top: 10px">
            <h2 class="section-title">Download File</h2>
            <p class="text-center mb-5">Silakan unduh formulir dan dokumen penting yang disediakan oleh pemerintah desa</p>
            
            <div class="row">
                @foreach($files->take(4) as $file)
                <div class="col-md-6 mb-4">
                    <div class="download-item">
                        <h4><i class="{{ $file->getIconClass() }} me-2"></i> {{ $file->title }}</h4>
                        <p>{{ $file->description }}</p>
                        <a href="{{ route('file.download', $file->id) }}" class="btn btn-sm {{ $file->getButtonClass() }}">
                            Download {{ strtoupper($file->file_type) }}
                        </a>
                        <small class="text-muted ms-2">{{ $file->download_count }}x diunduh</small>
                    </div>
                </div>
                @endforeach
                
                @if($files->count() === 0)
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Belum ada file yang tersedia untuk diunduh.
                    </div>
                </div>
                @endif
            </div>
    
            <!-- Bagian collapse untuk file tambahan -->
            @if($files->count() > 4)
            <div id="more-downloads" class="collapse mt-4">
                <div class="row">
                    @foreach($files->skip(4) as $file)
                    <div class="col-md-6 mb-4">
                        <div class="download-item">
                            <h4><i class="{{ $file->getIconClass() }} me-2"></i> {{ $file->title }}</h4>
                            <p>{{ $file->description }}</p>
                            <a href="{{ route('file.download', $file->id) }}" class="btn btn-sm {{ $file->getButtonClass() }}">
                                Download {{ strtoupper($file->file_type) }}
                            </a>
                            <small class="text-muted ms-2">{{ $file->download_count }}x diunduh</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    
            <!-- Tombol toggle taruh di paling bawah -->
            <div class="text-center mt-3">
                <a id="toggleButton" href="#more-downloads" class="btn btn-outline-primary" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-chevron-down me-2"></i>Lihat File Lainnya
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4>{{ setting('site_name', 'Desa Watesnegoro') }}</h4>
                    <p>{{ setting('address', 'Jl. Raya Gempol - Mojokerto') }}</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4>Kontak Kami</h4>
                    <p><i class="fas fa-phone me-2"></i> {{ setting('phone', '(021) 1234-5678') }}</p>
                    {{-- <p><i class="fas fa-envelope me-2"></i> {{ setting('email', 'info@watesnegoro.desa.id') }}</p> --}}
                    <p><i class="fas fa-clock me-2"></i> {{ setting('working_hours', 'Senin - Jumat: 08:00 - 16:00') }}</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4>Follow Kami</h4>
                    <div class="social-links">
                        @php
                            $socialMedia = \App\Models\Setting::getSocialMedia();
                        @endphp
                        <a href="{{ $socialMedia['facebook'] ?? '#' }}"><i class="fab fa-facebook"></i></a>
                        <a href="{{ $socialMedia['twitter'] ?? '#' }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $socialMedia['instagram'] ?? '#' }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $socialMedia['youtube'] ?? '#' }}"><i class="fab fa-youtube"></i></a>
                    </div>
                    
                    <div class="mt-3 d-flex flex-column align-items-start">
                        @if(setting('footer_logo'))
                        <img src="{{ asset('storage/' . setting('footer_logo')) }}" class="mb-1" alt="Logo Desa" width="250px" class="img-fluid">
                        @else
                        <img src="{{ asset('images/FElogo.png') }}" class="mb-1" alt="Logo Desa" width="250px" class="img-fluid">
                        @endif
                        <span class="fs-4">
                            {{ setting('footer_text', 'Pemerintah Desa Watesnegoro') }}
                        </span>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p>{{ setting('copyright', '© 2025 Pemerintah Desa Watesnegoro. All Rights Reserved.') }}</p>
            </div>
        </div>
    </footer>
</body>

<!-- {{-- <script src="{{ asset('bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js') }}"></script> --}} -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<script>
     // Script untuk mengaktifkan tooltip
     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Script untuk mengontrol carousel
        var myCarousel = document.querySelector('#heroCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            wrap: true
        });
        
        document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi carousel dengan interval 4 detik
        var aboutCarousel = document.getElementById('aboutCarousel');
            if (aboutCarousel) {
                var carousel = new bootstrap.Carousel(aboutCarousel, {
                    interval: 4000,
                    wrap: true,
                    pause: false
                });
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById("toggleButton");
            const collapseElement = document.getElementById("more-downloads");

            collapseElement.addEventListener("shown.bs.collapse", function () {
                toggleButton.innerHTML = '<i class="fas fa-chevron-up me-2"></i>Lebih Sedikit';
            });

            collapseElement.addEventListener("hidden.bs.collapse", function () {
                toggleButton.innerHTML = '<i class="fas fa-chevron-down me-2"></i>Lihat File Lainnya';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const homeMap = L.map('homeMap').setView([-7.564947, 112.652278], 15);

            // Base layers
            const openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap'
            });
            const satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');
            const terrain = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png');
            const darkMap = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png');

            // Add default layer
            satellite.addTo(homeMap);

            // Layer group untuk marker (didefinisikan global)
            const markers = L.layerGroup().addTo(homeMap);

            // Load GeoJSON batas desa
            fetch('/storage/batasDesaWatesnegoro.geojson')
                .then(r => r.json())
                .then(data => {
                    const desaLayer = L.geoJSON(data, {
                        style: {
                            color: "black",
                            weight: 2,
                            fillColor: "#2596be",
                            fillOpacity: 0.2
                        }
                    }).addTo(homeMap);

                    homeMap.fitBounds(desaLayer.getBounds());
                });

            // Load data lokasi dari API
            fetch('{{ route("peta.data") }}')
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        data.data.forEach(mapItem => {
                            let iconColor = mapItem.color || '#FF0000';
                            if (mapItem.type === 'important') iconColor = '#FF9800';
                            if (mapItem.type === 'facility') iconColor = '#2196F3';

                            const customIcon = L.divIcon({
                                className: 'custom-map-marker',
                                html: `<div style="background-color:${iconColor};width:24px;height:24px;border-radius:50%;border:3px solid white;box-shadow:0 2px 5px rgba(0,0,0,0.3);"></div>`,
                                iconSize: [24, 24],
                                iconAnchor: [12, 12]
                            });

                            L.marker([mapItem.latitude, mapItem.longitude], { icon: customIcon })
                                .addTo(markers)
                                .bindPopup(`
                                    <div style="max-width:350px;">
                                        <h5>${mapItem.title}</h5>
                                        <p>${mapItem.description || ''}</p>
                                        ${mapItem.photos.length > 0 ? 
                                            `<img src="/storage/${mapItem.photos[0].photo_path}" style="width:100%;height:150px;object-fit:cover;border-radius:5px;margin-bottom:10px;">` : ''}
                                        <div style="display:flex;justify-content:space-between;align-items:center;">
                                            <span class="badge" style="background-color:${iconColor};color:white;padding:4px 8px;border-radius:12px;">
                                                ${mapItem.type.toUpperCase()}
                                            </span>
                                            <a href="${mapItem.link_map}" target="_blank" style="font-size:12px;color:#007bff;">📍 Buka di Google Maps</a>
                                        </div>
                                    </div>
                                `);
                        });
                    }
                });

            // Layer control
            const baseMaps = {
                "Peta Standar": openStreetMap,
                "Satelit": satellite,
                "Topografi": terrain,
                "Mode Gelap": darkMap
            };
            const overlayMaps = {
                "Lokasi": markers
            };

            L.control.layers(baseMaps, overlayMaps).addTo(homeMap);
            L.control.scale({ metric: true }).addTo(homeMap);

            // Pencarian lokasi (pakai markers global)
            const searchControl = new L.Control.Search({
                position: 'topright',
                layer: markers,
                propertyName: 'title',
                marker: false,
                moveToLocation: function(latlng, title, map) {
                    map.setView(latlng, 16);
                }
            });
            homeMap.addControl(searchControl);
        });

        // Instagram Embed Script
        (function() {
            var script = document.createElement('script');
            script.async = true;
            script.src = '//www.instagram.com/embed.js';
            document.body.appendChild(script);
        })();

        // Instagram Pagination
        document.addEventListener('DOMContentLoaded', function() {
            const instagramCards = document.querySelectorAll('.instagram-card-item');
            const paginationEl = document.getElementById('instagram-pagination');
            
            if (!paginationEl || instagramCards.length <= 6) {
                return;
            }
            
            const itemsPerPage = 6;
            let currentPage = 1;
            const totalPages = Math.ceil(instagramCards.length / itemsPerPage);
            
            function showPage(page) {
                instagramCards.forEach((card) => {
                    const cardPage = parseInt(card.getAttribute('data-page'));
                    if (cardPage === page) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Re-initialize Instagram embeds after showing new page
                if (window.instgrm) {
                    setTimeout(function() {
                        window.instgrm.Embeds.process();
                    }, 100);
                }
                
                renderPagination();
            }
            
            function renderPagination() {
                if (totalPages <= 1) {
                    paginationEl.innerHTML = '';
                    return;
                }
                
                let paginationHTML = '<nav aria-label="Instagram pagination"><ul class="pagination justify-content-center">';
                
                // Previous button
                paginationHTML += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${currentPage - 1}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>`;
                
                // Page numbers
                for (let i = 1; i <= totalPages; i++) {
                    if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                        paginationHTML += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>`;
                    } else if (i === currentPage - 2 || i === currentPage + 2) {
                        paginationHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                    }
                }
                
                // Next button
                paginationHTML += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${currentPage + 1}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>`;
                
                paginationHTML += '</ul></nav>';
                paginationEl.innerHTML = paginationHTML;
                
                // Add event listeners
                paginationEl.querySelectorAll('.page-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const page = parseInt(this.getAttribute('data-page'));
                        if (page && page !== currentPage && page >= 1 && page <= totalPages) {
                            currentPage = page;
                            showPage(currentPage);
                            
                            // Smooth scroll to top of Instagram cards section
                            const firstCard = document.querySelector('.instagram-card-item[data-page="' + currentPage + '"]');
                            if (firstCard) {
                                window.scrollTo({ 
                                    top: firstCard.offsetTop - 100, 
                                    behavior: 'smooth' 
                                });
                            }
                        }
                    });
                });
            }
            
            // Initial render
            showPage(1);
        });

</script>



</html>