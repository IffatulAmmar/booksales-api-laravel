<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSales - Toko Buku Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            background: linear-gradient(135deg, #eef2f7, #dbe9f4);
            padding: 100px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .features .icon {
            font-size: 3rem;
            color: #0d6efd;
        }
        footer {
            background-color: #f8f9fa;
            padding: 40px 0;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang di <span class="text-primary">BookSales</span></h1>
            <p class="lead">Toko buku online terbaik untuk semua genre dan penulis favorit Anda.</p>
            <a href="{{ url('/books') }}" class="btn btn-primary btn-lg mt-3">Jelajahi Buku</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="icon mb-3">📚</div>
                    <h5>Ribuan Judul Buku</h5>
                    <p>Koleksi lengkap dari berbagai kategori dan genre populer.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon mb-3">🚚</div>
                    <h5>Pengiriman Cepat</h5>
                    <p>Pengiriman ke seluruh Indonesia dengan proses yang cepat dan aman.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon mb-3">💳</div>
                    <h5>Pembayaran Aman</h5>
                    <p>Dukungan berbagai metode pembayaran online yang terpercaya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Genre Highlight -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Genre Populer</h2>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-3 mb-3">
                    <div class="border p-3 rounded">Fiksi</div>
                </div>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="border p-3 rounded">Non-Fiksi</div>
                </div>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="border p-3 rounded">Bisnis</div>
                </div>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="border p-3 rounded">Anak & Remaja</div>
                </div>
            </div>
            <a href="{{ url('/genres') }}" class="btn btn-outline-primary mt-3">Lihat Semua Genre</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-muted">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} BookSales. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
