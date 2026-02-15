<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Koperasi Hleonva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add any custom styles here */
    </style>
</head>
<body>

@extends('home.main')

@section('content')
<div id="selamat-datang" class="container pt-5">
    <div id="" class="jumbotron text-center mt-5 pt-5">
        <h1 class="display-4">Selamat Datang di Koperasi Hleonva</h1>
        <p class="lead">Bersama kami, capai kesejahteraan finansial dengan berbagai layanan koperasi unggulan.</p>
        <hr class="my-4">
        <p>Temukan produk-produk kami yang membantu Anda dalam mencapai tujuan finansial Anda.</p>
        <a class="btn btn-primary btn-lg" href="#produk-kami" role="button">Lihat Produk Kami</a>
    </div>

    <section id="tentang-kami" class="pt-5">
        <h2 class="text-center pt-5">Tentang Koperasi Hleonva</h2>
        <div class="row my-4">
            <div class="col-md-6">
                <img src="{{ asset('images/tim.png') }}" style="max-width: 100%; height: 100%; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;" alt="Tentang Kami">
            </div>
            <div class="col-md-6">
                <p>
                    Koperasi Hleonva berdiri dengan tujuan untuk mendukung anggotanya dalam mencapai stabilitas keuangan dan kesejahteraan melalui prinsip gotong royong. Kami menyediakan berbagai layanan keuangan seperti simpanan wajib, pinjaman, dan investasi yang dirancang untuk membantu anggota kami mencapai tujuan finansial mereka.
                </p>
                <p>
                    <strong>Visi kami</strong> adalah menjadi koperasi terdepan yang dikenal dengan transparansi, integritas, dan pelayanan yang unggul. Kami ingin menjadi mitra terpercaya bagi anggota dalam mencapai tujuan finansial mereka dan membangun masa depan yang lebih baik bersama.
                </p>
                <p>
                    <strong>Misi kami</strong> adalah untuk menyediakan solusi keuangan yang inovatif dan berkelanjutan yang dirancang untuk memenuhi kebutuhan unik setiap anggota kami. Kami berkomitmen untuk mendukung kesejahteraan ekonomi anggota kami melalui layanan simpanan, pinjaman, dan investasi yang dapat diandalkan.
                </p>
            </div>
        </div>
    </section>

    <section id="produk-kami" class="pt-5">
        <h2 class="text-center pt-5">Produk Kami</h2>
        <div class="row my-4">
            <!-- Simpanan Wajib -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-piggy-bank fa-3x mb-3"></i>
                        <h4 class="card-title">Simpanan Wajib</h4>
                        <p class="card-text">
                            Simpanan wajib adalah simpanan yang harus dibayar oleh setiap anggota secara berkala. Ini adalah kontribusi tetap yang membantu koperasi dalam mendanai berbagai aktivitas dan program untuk kesejahteraan anggotanya.
                        </p>
                        <ul class="list-unstyled">
                            <li>Keterlibatan langsung dalam koperasi</li>
                            <li>Keuntungan dari hasil usaha koperasi</li>
                        </ul>
                        <a class="btn btn-secondary" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
            <!-- Pinjaman -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-hand-holding-usd fa-3x mb-3"></i>
                        <h4 class="card-title">Pinjaman</h4>
                        <p class="card-text">
                            Kami menawarkan berbagai produk pinjaman dengan suku bunga kompetitif dan proses yang mudah. Pinjaman ini dapat digunakan untuk kebutuhan pribadi, usaha, atau pendidikan.
                        </p>
                        <ul class="list-unstyled">
                            <li>Suku bunga yang bersaing</li>
                            <li>Proses cepat dan mudah</li>
                            <li>Fleksibilitas dalam penggunaan dana</li>
                        </ul>
                        <a class="btn btn-secondary" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
            <!-- Investasi -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-3x mb-3"></i>
                        <h4 class="card-title">Investasi</h4>
                        <p class="card-text">
                            Investasikan dana Anda dengan kami untuk mendapatkan keuntungan yang optimal. Kami menawarkan berbagai pilihan investasi yang aman dan terpercaya.
                        </p>
                        <ul class="list-unstyled">
                            <li>Pengembalian yang menguntungkan</li>
                            <li>Investasi yang aman dan terpercaya</li>
                            <li>Berbagai pilihan produk investasi</li>
                        </ul>
                        <a class="btn btn-secondary" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="my-5">
        <h2 class="text-center">Testimoni Anggota</h2>
        <div id="carouselTestimonials" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial text-center">
                        <p class="lead">
                            "Bergabung dengan Koperasi Hleonva memberikan saya banyak kesempatan untuk mengembangkan usaha kecil saya melalui akses ke pinjaman yang mudah dan dukungan komunitas yang kuat."
                        </p>
                        <h5>- Budi Santoso</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial text-center">
                        <p class="lead">
                            "Investasi saya di Koperasi Hleonva memberikan pengembalian yang luar biasa dan sangat membantu dalam menyiapkan dana pendidikan anak-anak saya."
                        </p>
                        <h5>- Siti Aminah</h5>
                    </div>
                </div>
                <!-- Tambahkan lebih banyak item testimoni jika diperlukan -->
            </div>
            <a class="carousel-control-prev" href="#carouselTestimonials" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselTestimonials" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section id="hubungi-kami" class="pt-5 pb-5">
        <h2 class="text-center pt-5">Hubungi Kami</h2>
        <div class="row my-4">
            <div class="col-md-6">
                <h4>Alamat:</h4>
                <p>Jl. Contoh No. 123, Kota Contoh, Provinsi Contoh</p>
                <h4>Email:</h4>
                <p>info@koperasihleonva.com</p>
                <h4>Telepon:</h4>
                <p>+62 123 4567 890</p>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" id="pesan" rows="3" placeholder="Masukkan pesan Anda"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script untuk scroll ke bagian atas -->
<script>
    $(document).ready(function() {
        // Smooth scroll to top when page reloads or navigates
        $('html, body').animate({ scrollTop: $('#top').offset().top }, 'slow');
    });
</script>

</body>
</html>
