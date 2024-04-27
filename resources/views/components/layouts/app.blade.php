<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#ffffff">

        <!-- Favicon -->
        <link href="{{ asset('favicon.ico') }}" rel="icon">

        {{-- websitemanife file --}}
        <link rel="stylesheet" href="{{ asset('favicon_io/site.webmanifest') }}">

        {{-- meta  --}}
        <meta name="description" content="Tonde Souleymane, Développeur Backend. Autodidacte, passionné par le développement web et mobile, specialist en design d'architecture logicielle.">
        <meta name="Author" content="Tonde Souleymane">
        <meta name="keywords" content="Développeur, Backend, PHP, Laravel, Symfony, MongoDB, MySQL, PostgreSQL, API, REST, Web, Mobile, Android,  Flutter,  Autodidacte, Passionné, Design, Architecture, Logicielle">
        <meta name="robots" content="index, follow">
        <meta name="revisit-after" content="1 days">
        <meta name="language" content="fr">
        {{-- opengraph, twitter --}}
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:locale" content="fr_FR">
        <meta property="og:title" content="{{ config('app.name') }}">
        <meta property="og:description" content="Tonde Souleymane, Développeur Backend. Autodidacte, passionné par le développement web et mobile, specialist en design d'architecture logicielle.">
        <meta property="og:image" content="{{ asset('favicon_io/favicon-32x32.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ config('app.name') }}">
        <meta name="twitter:description" content="Tonde Souleymane, Développeur Backend. Autodidacte, passionné par le développement web et mobile, specialist en design d'architecture logicielle.">
        <meta name="twitter:image" content="{{ asset('favicon_io/favicon-32x32.png') }}">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:site" content="@hultimatumgiver"> 
        <meta name="twitter:creator" content="@hultimatumgiver">



        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <x-shared.spinner />
        <!-- Spinner End -->

        @yield('content')

        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/lib/typed/typed.min.js') }}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Contact Javascript File -->

        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
