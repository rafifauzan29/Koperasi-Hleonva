<!-- guest_navbar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Hleonva</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" alt="Nama Logo" height="40" class="d-inline-block align-text-right">
                Koperasi Hleonva
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#selamat-datang" onclick="scrollToSection('#selamat-datang')">
                            <i class="bi bi-speedometer2"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang-kami" onclick="scrollToSection('#tentang-kami')">
                            <i class="bi bi-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk-kami" onclick="scrollToSection('#produk-kami')">
                            <i class="bi bi-archive"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hubungi-kami" onclick="scrollToSection('#hubungi-kami')">
                            <i class="bi bi-telephone"></i> Kontak
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="login">
                            <i class="bi bi-box-arrow-right"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
    .navbar-nav .nav-item .nav-link {
        position: relative;
        padding-bottom: 5px; /* Adjust as needed */
    }

    .navbar-nav .nav-item .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px; /* Thickness of the underline */
        background-color: white; /* Color of the underline */
        transform: scaleX(0); /* Initially hidden */
        transition: transform 0.3s ease; /* Smooth transition */
    }

    .navbar-nav .nav-item .nav-link:hover::after,
    .navbar-nav .nav-item .nav-link:focus::after {
        transform: scaleX(1); /* Show underline on hover or focus */
    }
</style>

    <!-- JavaScript untuk scroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    function scrollToSection(sectionId) {
        $('html, body').animate({
            scrollTop: $(sectionId).offset().top
        }, 800);
    }
    </script>
</body>
</html>
