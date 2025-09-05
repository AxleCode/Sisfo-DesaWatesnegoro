<footer id="contact" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h4 class="mb-3">{{ setting('site_name', 'Desa Watesnegoro') }}</h4>
                <div class="d-flex align-items-start mb-2">
                    <i class="fas fa-map-marker-alt me-2 mt-1"></i>
                    <div>
                        <p class="mb-0">{{ setting('address', 'Jl. Raya Gempol - Mojokerto') }}</p>
                        <p class="mb-0">Kecamatan Ngoro, Kabupaten Mojokerto</p>
                        <p class="mb-0">Provinsi Jawa Timur, Indonesia</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <h4 class="mb-3">Kontak Kami</h4>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-phone me-2"></i>
                    <span>{{ setting('phone', '(021) 1234-5678') }}</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-envelope me-2"></i>
                    <span>{{ setting('email', 'info@watesnegoro.desa.id') }}</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-clock me-2"></i>
                    <span>{{ setting('working_hours', 'Senin - Jumat: 08:00 - 16:00') }}</span>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <h4 class="mb-3">Follow Kami</h4>
                <div class="social-links mb-3">
                    @php
                        $socialMedia = \App\Models\Setting::getSocialMedia();
                    @endphp
                    <a href="{{ $socialMedia['facebook'] ?? '#' }}" class="social-link" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $socialMedia['twitter'] ?? '#' }}" class="social-link" target="_blank" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $socialMedia['instagram'] ?? '#' }}" class="social-link" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $socialMedia['youtube'] ?? '#' }}" class="social-link" target="_blank" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                
                <div class="footer-brand mt-4">
                    @if(setting('footer_logo'))
                    <img src="{{ asset('storage/' . setting('footer_logo')) }}" 
                         alt="Logo Desa" 
                         width="200" 
                         class="img-fluid mb-2">
                    @else
                    <img src="{{ asset('images/FElogo.png') }}" 
                         alt="Logo Desa" 
                         width="200" 
                         class="img-fluid mb-2">
                    @endif
                    <p class="mb-0 fw-bold">
                        {{ setting('footer_text', 'Pemerintah Desa Watesnegoro') }}
                    </p>
                </div>
            </div>
        </div>
        
        <hr class="my-4 bg-light">
        
        <div class="text-center">
            <p class="mb-0">
                {{ setting('copyright', '© 2025 Pemerintah Desa Watesnegoro. All Rights Reserved.') }}
            </p>
            {{-- <small class="text-muted">
                Developed with <i class="fas fa-heart text-danger"></i> for Desa Watesnegoro
            </small> --}}
        </div>
    </div>
</footer>

<style>
footer {
    background: linear-gradient(135deg, var(--dark-color) 0%, var(--primary-color) 100%);
}

footer h4 {
    color: var(--light-color);
    font-weight: 600;
    border-bottom: 2px solid var(--secondary-color);
    padding-bottom: 10px;
    display: inline-block;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.social-link:hover {
    background: var(--secondary-color);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.footer-brand {
    text-align: center;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-brand img {
    transition: transform 0.3s ease;
}

.footer-brand img:hover {
    transform: scale(1.05);
}

/* Responsive styles */
@media (max-width: 768px) {
    footer {
        text-align: center;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .footer-brand {
        margin-top: 20px;
    }
}
</style>