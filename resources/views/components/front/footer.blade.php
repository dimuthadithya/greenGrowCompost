<footer class="bg-dark py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-leaf fs-4 text-success"></i>
                    <span class="h4 mb-0 fw-bold text-success">GreenGrow</span>
                </div>
                <p class="text-light mb-4">Natural. Sustainable. Powerful. Transform your garden with our 100% organic compost fertilizer.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-success hover-lift"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-success hover-lift"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-success hover-lift"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4 text-success">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-light text-decoration-none hover-success">Home</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}" class="text-light text-decoration-none hover-success">Products</a></li>
                    <li class="mb-2"><a href="{{ route('cart') }}" class="text-light text-decoration-none hover-success">Cart</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-light text-decoration-none hover-success">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4 text-success">Support</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-light text-decoration-none hover-success">Contact Us</a></li>
                    <li class="mb-2"><a href="{{ route('faqs') }}" class="text-light text-decoration-none hover-success">FAQs</a></li>
                    <li class="mb-2"><a href="{{ route('shipping') }}" class="text-light text-decoration-none hover-success">Shipping Info</a></li>
                    <li class="mb-2"><a href="{{ route('returns') }}" class="text-light text-decoration-none hover-success">Returns</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4 text-success">Legal</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="{{ route('privacy') }}" class="text-light text-decoration-none hover-success">Privacy Policy</a></li>
                    <li class="mb-2"><a href="{{ route('terms') }}" class="text-light text-decoration-none hover-success">Terms of Service</a></li>
                    <li class="mb-2"><a href="{{ route('refund') }}" class="text-light text-decoration-none hover-success">Refund Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4 text-success">Contact</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-3 text-light"><i class="fas fa-map-marker-alt me-2 text-success"></i>123 Green Street,Sri Lanka</li>
                    <li class="mb-3 text-light"><i class="fas fa-phone me-2 text-success"></i>077717277</li>
                    <li class="mb-3 text-light"><i class="fas fa-envelope me-2 text-success"></i>info@greengrow.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-white border-top border-secondary mt-4 pt-4 text-center text-muted">
        <p class="mb-0 text-white">&copy; {{ date('Y') }} GreenGrow Compost. All rights reserved.</p>
    </div>
    </div>
</footer>

@push('styles')
<style>
    .hover-success {
        transition: color 0.2s ease-in-out;
    }

    .hover-success:hover {
        color: #198754 !important;
    }

    .hover-lift {
        transition: transform 0.2s ease-in-out;
    }

    .hover-lift:hover {
        transform: translateY(-3px);
    }
</style>
@endpush


<!-- Back to Top Button -->
<button id="back-to-top" class="btn btn-success rounded-circle position-fixed bottom-0 end-0 me-4 mb-4" style="width: 48px; height: 48px; display: none">
    <i class="fas fa-arrow-up"></i>
</button>