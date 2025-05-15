<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Penulis - Toko BookSales</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Penulis</h1>
        <p class="text-center">Selamat datang di Toko <strong>BookSales</strong></p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                @if ($authors->isEmpty())
                    <div class="alert alert-info text-center">
                        Belum ada data penulis tersedia.
                    </div>
                @else
                    <ul class="list-group">
                        @foreach ($authors as $author)
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $author->id }} <br>
                                <strong>Nama:</strong> {{ $author->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
