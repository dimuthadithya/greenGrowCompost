<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GreenGrow Compost - Organic Fertilizer</title>
    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset("assets/images/favicon_io/apple-touch-icon.png") }}" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}" />
    <link rel="manifest" href="/assets/images/favicon_io/site.webmanifest" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap"
        rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <!-- Navigation -->
    <x-front.navigation />

    <!-- Content  -->
    @yield('content')

    <!-- Footer -->
    <x-front.footer />

    <!-- Back to Top Button -->
    <button
        id="back-to-top"
        class="btn btn-success rounded-circle position-fixed bottom-0 end-0 me-4 mb-4"
        style="width: 48px; height: 48px; display: none">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/index.js') }}"></script>
    @stack('scripts')
</body>

</html>