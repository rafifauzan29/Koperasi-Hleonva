<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Koperasi Hleonva</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Custom styles for Koperasi Hleonva */
        .navbar-brand {
            font-weight: bold;
            color: #333; /* Dark color */
        }
        .navbar-brand img {
            width: 40px; /* Adjust as needed */
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: #555; /* Darker gray for links */
        }
        .navbar-nav .nav-link:hover {
            color: #007bff; /* Blue on hover */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href={{ route("welcome.home") }}>
            <img src="{{ asset('images/logo.png') }}" alt="Koperasi Hleonva Logo"> Koperasi Hleonva
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
