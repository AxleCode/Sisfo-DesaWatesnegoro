<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo_mojokerto.png">
    <title>Pemerintah Desa Watesnegoro || Sisfo Desa Watesnegoro</title>

    <!-- My Own Styles -->
    {{-- <link rel="stylesheet" href="css/style.css"> --}}

    <!-- Bootstrap 5 + FontAwesome -->
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap-5.3.7-dist/css/bootstrap.min.css') }}">--}}
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
            height: 80vh;
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
    </style>
</head>
<body id="home">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex flex-column align-items-start" href="#">
                <img src="images/FElogo.png" class="mb-1" alt="Logo" width="200px">
                <span class="fs-5">
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
    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('images/gambar_header1.png');">
                    <div class="carousel-caption">
                        <h2>Selamat Datang di Website Desa Watesnegoro</h2>
                        <p>Website resmi pemerintah Desa Watesnegoro untuk memberikan informasi terbaru kepada masyarakat</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1567016376408-22d2b7dfc7b9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="carousel-caption">
                        <h2>Desa yang Maju dan Mandiri</h2>
                        <p>Bersama membangun desa untuk kesejahteraan masyarakat</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1517486808906-6ca8b3f8e1c1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="carousel-caption">
                        <h2>Pelayanan Terbaik untuk Masyarakat</h2>
                        <p>Kami berkomitmen memberikan pelayanan terbaik untuk kenyamanan masyarakat</p>
                    </div>
                </div>
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

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <h2 class="section-title">Tentang Desa Kami</h2>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1540957903151-7e766663e0d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Desa Watesnegoro" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h3>Desa Watesnegoro</h3>
                    <p>Desa Watesnegoro adalah sebuah desa yang terletak di kecamatan yang subur dengan pemandangan alam yang indah. Desa kami memiliki berbagai potensi dalam bidang pertanian, peternakan, dan kerajinan tangan.</p>
                    <p>Masyarakat Desa Watesnegoro hidup rukun dan damai dengan gotong royong yang masih kuat dijaga. Berbagai kegiatan kemasyarakatan rutin diselenggarakan untuk mempererat tali silaturahmi antar warga.</p>
                    <p>Visi kami adalah "Mewujudkan Desa Watesnegoro yang Mandiri, Sejahtera, dan Berbudaya". Sedangkan misi kami adalah meningkatkan kualitas sumber daya manusia, mengembangkan potensi lokal, dan meningkatkan pelayanan publik.</p>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="text-center">
                            <h4 class="text-primary">5,247</h4>
                            <p>Jumlah Penduduk</p>
                        </div>
                        <div class="text-center">
                            <h4 class="text-primary">12</h4>
                            <p>Dusun</p>
                        </div>
                        <div class="text-center">
                            <h4 class="text-primary">25</h4>
                            <p>RT</p>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="col-md-6">
                    <div class="download-item">
                        <h4><i class="far fa-file-pdf text-danger me-2"></i> Formulir Pengajuan KTP</h4>
                        <p>Formulir untuk mengajukan pembuatan Kartu Tanda Penduduk (KTP)</p>
                        <a href="#" class="btn btn-sm btn-outline-danger">Download PDF</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="download-item">
                        <h4><i class="far fa-file-word text-primary me-2"></i> Formulir Pengajuan KK</h4>
                        <p>Formulir untuk mengajukan pembuatan Kartu Keluarga (KK)</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Download DOC</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="download-item">
                        <h4><i class="far fa-file-excel text-success me-2"></i> Data Penduduk 2023</h4>
                        <p>Data kependudukan Desa Watesnegoro per Oktober 2023</p>
                        <a href="#" class="btn btn-sm btn-outline-success">Download XLS</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="download-item">
                        <h4><i class far fa-file-pdf text-danger me-2"></i> Laporan Keuangan Desa</h4>
                        <p>Laporan realisasi anggaran pendapatan dan belanja desa tahun 2023</p>
                        <a href="#" class="btn btn-sm btn-outline-danger">Download PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4>Desa Watesnegoro</h4>
                    <p>Jl. Raya Gempol - Mojokerto</p>
                    <p>Kecamatan Ngoro, Kabupaten Mojokerto</p>
                    <p>Provinsi Jawa Timur, Indonesia</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4>Kontak Kami</h4>
                    <p><i class="fas fa-phone me-2"></i> (021) 1234-5678</p>
                    {{-- <p><i class="fas fa-envelope me-2"></i> info@desamakmur.id</p> --}}
                    <p><i class="fas fa-clock me-2"></i> Senin - Jumat: 08:00 - 16:00</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h4>Follow Kami</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="mt-3 d-flex flex-column align-items-start">
                        <img src="images/FElogo.png" class="mb-1" alt="Logo Desa" width="250px" class="img-fluid">
                        <span class="fs-4">
                           Pemerintah Desa Watesnegoro
                        </span>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p>&copy; 2025 Pemerintah Desa Watesnegoro. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

{{-- <script src="{{ asset('bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js') }}"></script> --}}
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

</script>



</html>