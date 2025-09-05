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
        
        .news-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .news-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }

        .news-content h2, .news-content h3, .news-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .news-content p {
            margin-bottom: 1.5rem;
        }

        .news-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .sticky-sidebar {
            position: sticky;
            top: 90px;
            z-index: 99;
        }

        /* Pastikan navbar memiliki z-index yang lebih tinggi */
        .navbar {
            z-index: 1000 !important;
        }

        /* Card styling */
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15) !important;
        }

        .card-header {
            border-bottom: none;
            font-weight: 600;
        }

        /* List group item styling */
        .list-group-item {
            border: none;
            border-bottom: 1px solid #f1f1f1;
            transition: all 0.3s ease;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .list-group-item-action:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        /* Badge styling */
        .badge.rounded-pill {
            font-size: 0.75rem;
            min-width: 25px;
        }

        /* Image styling */
        .list-group-item img {
            transition: transform 0.3s ease;
        }

        .list-group-item:hover img {
            transform: scale(1.05);
        }

        /* Responsive design */
        @media (max-width: 991px) {
            .sticky-sidebar {
                position: static;
                margin-top: 30px;
            }
            
            .col-lg-4 {
                margin-top: 30px;
            }
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

    .list-group-item {
        padding: 15px;
    }
    
    .list-group-item img {
        width: 40px !important;
        height: 40px !important;
    }
    
    .card-header h5 {
        font-size: 1.1rem;
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
    @include('components.headerberita')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-4">Berita Desa Watesnegoro</h1>
    
                <!-- Filter Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="GET" action="{{ route('berita') }}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Filter by Kategori</label>
                                        <select name="category" class="form-select">
                                            <option value="all">Semua Kategori</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Filter by Tahun</label>
                                        <select name="year" class="form-select">
                                            <option value="all">Semua Tahun</option>
                                            @foreach($years as $year)
                                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    
                <!-- News List -->
                <div class="row">
                    @forelse($news as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 news-card">
                            <img src="{{ asset('storage/' . $item->featured_image) }}" 
                                 class="card-img-top" alt="{{ $item->title }}" 
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <span class="badge bg-{{ $item->category->color }} mb-2">{{ $item->category->name }}</span>
                                <h5 class="card-title">{{ Str::limit($item->title, 60) }}</h5>
                                <p class="card-text">{{ Str::limit($item->excerpt, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>
                                    <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-sm btn-outline-primary">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-newspaper fa-3x mb-3"></i>
                            <h4>Tidak ada berita yang ditemukan</h4>
                            <p>Silakan coba dengan filter yang berbeda.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
    
                <!-- Pagination -->
                @if($news->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
                @endif
            </div>
    
            <div class="col-lg-4">
                <!-- Sidebar -->
                <div class="sticky-sidebar">
                    <!-- Categories -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-tags me-2"></i>Kategori Berita</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            @foreach($categories as $category)
                            <a href="{{ route('berita', ['category' => $category->slug]) }}" 
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3">
                                <span class="d-flex align-items-center">
                                    <span class="badge bg-{{ $category->color }} me-2" 
                                          style="width: 12px; height: 12px; border-radius: 50%;"></span>
                                    {{ $category->name }}
                                </span>
                                <span class="badge bg-{{ $category->color }} rounded-pill">{{ $category->news_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
            
                    <!-- Recent News -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-history me-2"></i>Berita Terbaru</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            @php
                                $recentNews = \App\Models\News::with('category')
                                    ->where('is_published', true)
                                    ->latest()
                                    ->take(5)
                                    ->get();
                            @endphp
                            @foreach($recentNews as $recent)
                            <a href="{{ route('berita.show', $recent->slug) }}" class="list-group-item list-group-item-action p-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $recent->featured_image) }}" 
                                         alt="{{ $recent->title }}" 
                                         class="rounded me-3"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 text-dark">{{ Str::limit($recent->title, 40) }}</h6>
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            {{ $recent->created_at->locale('id')->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <a href="{{ route('berita') }}" class="btn btn-sm btn-outline-primary">
                                Lihat Semua Berita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</script>

</html>