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
        <div class="container">
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
                                    <p class="card-text mt-2 small">{{ Str::limit($dusun->description, 100) }}</p>
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

    <!-- News Section -->
    <section id="news" class="news-section">
        <div class="container">
            <h2 class="section-title">Berita dan Informasi Terbaru</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1584697964358-3e14ca57658b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Berita 1">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Pengumuman</span>
                            <h5 class="card-title">Pelaksanaan Kerja Bakti Bersama</h5>
                            <p class="card-text">Akan diadakan kerja bakti pada hari Minggu, 12 November 2023 di seluruh wilayah Desa Watesnegoro.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="far fa-calendar me-1"></i> 5 Hari Lalu</small>
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Berita 2">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Kegiatan</span>
                            <h5 class="card-title">Pelatihan Pembuatan Kerajinan Tangan</h5>
                            <p class="card-text">Dinas Perindustrian memberikan pelatihan pembuatan kerajinan tangan dari bahan bambu.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="far fa-calendar me-1"></i> 1 Minggu Lalu</small>
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1577720643272-265f0936742f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Berita 3">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Informasi</span>
                            <h5 class="card-title">Penerimaan Bantuan Sosial Tahap II</h5>
                            <p class="card-text">Pemerintah desa membuka pendaftaran untuk bantuan sosial tahap II bagi warga yang memenuhi syarat.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="far fa-calendar me-1"></i> 2 Minggu Lalu</small>
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">Lihat Berita Lainnya</a>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="download-section">
        <div class="container">
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
                    <p><i class="fas fa-envelope me-2"></i> {{ setting('email', 'info@watesnegoro.desa.id') }}</p>
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
</script>



</html>