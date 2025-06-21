<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-leaf fs-4"></i>
                    <span class="h4 mb-0 fw-bold">GreenGrow</span>
                </div>
                <p class="text-muted mb-4">Natural. Sustainable. Powerful. Transform your garden with our 100% organic compost fertilizer.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}" class="text-muted text-decoration-none">Products</a></li>
                    <li class="mb-2"><a href="{{ route('track.order') }}" class="text-muted text-decoration-none">Track Order</a></li>
                    <li class="mb-2"><a href="{{ route('cart') }}" class="text-muted text-decoration-none">Cart</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4">Support</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-muted text-decoration-none">Contact Us</a></li>
                    <li class="mb-2"><a href="{{ route('faq') }}" class="text-muted text-decoration-none">FAQs</a></li>
                    <li class="mb-2"><a href="{{ route('shipping') }}" class="text-muted text-decoration-none">Shipping Info</a></li>
                    <li class="mb-2"><a href="{{ route('returns') }}" class="text-muted text-decoration-none">Returns</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4">Legal</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('privacy') }}" class="text-muted text-decoration-none">Privacy Policy</a></li>
                    <li class="mb-2"><a href="{{ route('terms') }}" class="text-muted text-decoration-none">Terms of Service</a></li>
                    <li class="mb-2"><a href="{{ route('refund') }}" class="text-muted text-decoration-none">Refund Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="mb-4">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-muted"><i class="fas fa-map-marker-alt me-2"></i>123 Green Street</li>
                    <li class="mb-2 text-muted"><i class="fas fa-phone me-2"></i>(555) 123-4567</li>
                    <li class="mb-2 text-muted"><i class="fas fa-envelope me-2"></i>info@greengrow.com</li>
                </ul>
            </div>
        </div>
        <div class="border-top border-secondary mt-4 pt-4 text-center text-muted">
            <p class="mb-0">&copy; {{ date('Y') }} GreenGrow Compost. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="btn btn-success rounded-circle position-fixed bottom-0 end-0 me-4 mb-4" style="width: 48px; height: 48px; display: none">
    <i class="fas fa-arrow-up"></i>
</button>