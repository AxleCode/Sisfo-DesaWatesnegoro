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
.sticky-sidebar {
    position: sticky;
    top: 90px; /* Adjust based on your navbar height */
    z-index: 99;
    max-height: calc(100vh - 100px);
    overflow-y: auto;
}

/* Custom scrollbar for sidebar */
.sticky-sidebar::-webkit-scrollbar {
    width: 4px;
}

.sticky-sidebar::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.sticky-sidebar::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.sticky-sidebar::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Ensure navbar has higher z-index */
.navbar {
    z-index: 1000 !important;
}

/* Responsive behavior */
@media (max-width: 991px) {
    .sticky-sidebar {
        position: static;
        max-height: none;
        margin-top: 20px;
    }
}

/* Hover effects */
.list-group-item-action:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
    transition: all 0.3s ease;
}

.card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
}
    </style>
</head>
<body id="home">

    @include('components.headerberita')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a></li>
                        <li class="breadcrumb-item active">{{ $news->title }}</li>
                    </ol>
                </nav>
    
                <!-- Article Content -->
                <article>
                    <h1 class="mb-3">{{ $news->title }}</h1>
                    
                    <div class="d-flex align-items-center mb-4 text-muted">
                        <span class="badge bg-{{ $news->category->color }} me-3">{{ $news->category->name }}</span>
                        <small class="me-3"><i class="far fa-user me-1"></i> {{ $news->user->name }}</small>
                        <small class="me-3"><i class="far fa-clock me-1"></i> {{ $news->getReadingTime() }}</small>
                        <small><i class="far fa-eye me-1"></i> {{ $news->views }} views</small>
                    </div>
    
                    <img src="{{ asset('storage/' . $news->featured_image) }}" 
                         alt="{{ $news->title }}" 
                         class="img-fluid rounded mb-4 w-100" 
                         style="max-height: 400px; object-fit: cover;">
    
                    <div class="news-content">
                        {!! $news->content !!}
                    </div>
    
                    <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                        <div>
                            <small class="text-muted">
                                <i class="far fa-calendar me-1"></i>
                                Dipublikasikan pada {{ $news->published_at->format('d F Y') }}
                            </small>
                        </div>
                        <div class="share-buttons">
                            <!-- Add social share buttons here -->
                        </div>
                    </div>
                </article>
    
                <!-- Related News -->
                @if($relatedNews->count() > 0)
                <div class="mt-5">
                    <h3 class="mb-4">Berita Terkait</h3>
                    <div class="row">
                        @foreach($relatedNews as $related)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                     class="card-img-top" alt="{{ $related->title }}" 
                                     style="height: 150px; object-fit: cover;">
                                <div class="card-body">
                                    <span class="badge bg-{{ $related->category->color }} mb-2">{{ $related->category->name }}</span>
                                    <h6 class="card-title">{{ Str::limit($related->title, 60) }}</h6>
                                    <a href="{{ route('berita.show', $related->slug) }}" class="btn btn-sm btn-outline-primary mt-2">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
    
            <div class="col-lg-4">
                <!-- Latest News Sidebar -->
                <div class="sticky-sidebar">
                    <div class="card mb-4 sidebar-card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-newspaper me-2"></i>Berita Terbaru</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            @foreach($latestNews as $latest)
                            <a href="{{ route('berita.show', $latest->slug) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $latest->featured_image) }}" 
                                        alt="{{ $latest->title }}" 
                                        style="width: 60px; height: 60px; object-fit: cover;" 
                                        class="rounded me-3">
                                    <div>
                                        <h6 class="mb-1">{{ Str::limit($latest->title, 50) }}</h6>
                                        <small class="text-muted">{{ $latest->created_at->locale('id')->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Categories Sidebar -->
                    <div class="card sidebar-card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-tags me-2"></i>Kategori</h5>
                        </div>
                        <div class="list-group list-group-flush">
                            @php
                                $categories = \App\Models\Category::withCount(['news' => function($query) {
                                    $query->where('is_published', true);
                                }])->where('is_active', true)->get();
                            @endphp
                            @foreach($categories as $category)
                            <a href="{{ route('berita', ['category' => $category->slug]) }}" 
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $category->name }}
                                <span class="badge bg-{{ $category->color }} rounded-pill">{{ $category->news_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- News Slider Section -->
    @if($latestNews->count() > 0)
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title mb-4">Semua Berita Terbaru</h2>
            <div class="news-slider">
                <div class="row">
                    @foreach($latestNews as $newsItem)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $newsItem->featured_image) }}" 
                                 class="card-img-top" alt="{{ $newsItem->title }}" 
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <span class="badge bg-{{ $newsItem->category->color }} mb-2">{{ $newsItem->category->name }}</span>
                                <h6 class="card-title">{{ Str::limit($newsItem->title, 60) }}</h6>
                                <p class="card-text small">{{ Str::limit($newsItem->excerpt, 80) }}</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('berita.show', $newsItem->slug) }}" class="btn btn-sm btn-outline-primary w-100">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

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