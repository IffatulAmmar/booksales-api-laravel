<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penulis - Toko BookSales</title>
    <!-- Tambahkan Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Penulis</h1>
        <p class="text-center">Selamat datang di Toko <strong>BookSales</strong></p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <ul class="list-group">
                    @forelse ($authors as $item)
                        <li class="list-group-item">
                            <strong>ID:</strong> {{ $item['id'] }} <br>
                            <strong>Nama:</strong> {{ $item['name'] }}
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center">Belum ada data penulis tersedia.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS (Opsional jika butuh interaksi) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
