<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex flex-column align-items-start" href="{{ url('/') }}">
            @if(setting('site_logo'))
                <img src="{{ asset('storage/' . setting('site_logo')) }}" class="mb-1" alt="Logo" width="170px">
            @else
                <img src="{{ asset('images/logo_mojokerto.png') }}" class="mb-1" alt="Logo" width="170px">
            @endif
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
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita*') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<style>
.navbar {
    background-color: var(--primary-color) !important;
    padding: 10px 0;
}

.navbar-brand {
    color: white !important;
}

.navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.8) !important;
    transition: color 0.3s ease;
    margin: 0 10px;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: white !important;
    text-decoration: underline;
    text-underline-offset: 5px;
}

.navbar-toggler {
    border: none;
}

.navbar-toggler:focus {
    box-shadow: none;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.dropdown-item {
    transition: background-color 0.3s ease;
}

/* Smooth scroll for anchor links */
html {
    scroll-behavior: smooth;
}

/* Responsive styles */
@media (max-width: 991px) {
    .navbar-nav {
        text-align: center;
        padding: 20px 0;
    }
    
    .navbar-nav .nav-item {
        margin: 5px 0;
    }
    
    .navbar-collapse {
        background-color: var(--primary-color);
        padding: 20px;
        border-radius: 10px;
        margin-top: 10px;
    }
}
</style>

<script>
// Add smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80; // Adjust for fixed header
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Update URL without refreshing
                history.pushState(null, null, targetId);
            }
        });
    });
});
</script>