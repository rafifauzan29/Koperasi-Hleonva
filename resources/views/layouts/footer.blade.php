\<!-- resources/views/layouts/footer.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Hleonva</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS for Navbar -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 140vh;

        }

        .content {
            flex: 1;
        }

        .footer {
            background-color: #343a40; /* Warna latar belakang footer */
            color: white; /* Warna teks footer */
            padding: 20px 0;
            text-align: center;
            width: 100%;
        }

        .footer .social-icons a {
            margin-right: 10px;
            color: white; /* Warna ikon media sosial */
        }

        .footer .social-icons a:hover {
            color: #007bff; /* Warna ikon media sosial saat hover */
        }
    </style>
</head>
<body>

    <div class="content">
        <!-- Konten utama aplikasi Anda di sini -->
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Koperasi Hleonva</h5>
                    <p>Koperasi terpercaya untuk kebutuhan finansial Anda.</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-telephone"></i> +62 123 456 789</li>
                        <li><i class="bi bi-envelope"></i> info@hleonva.com</li>
                        <li><i class="bi bi-geo-alt"></i> Jalan Koperasi No. 123, Bandung</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <span>© {{ date('Y') }} Koperasi Hleonva. All rights reserved.</span>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
