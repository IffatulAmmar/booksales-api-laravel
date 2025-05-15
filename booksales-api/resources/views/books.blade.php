<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Buku - BookSales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Daftar Buku</h1>
        <p class="text-center">Selamat datang di <strong>Toko BookSales</strong></p>

        <div class="row">
            @if ($books->isEmpty())
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada data buku yang tersedia.
                    </div>
                </div>
            @else
            @foreach ($books as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text text-muted">{{ $item->description }}</p>
                        <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        <p><strong>Stok:</strong> {{ $item->stock }}</p>
                        <p><strong>Penulis:</strong> {{ $item->author->name ?? 'Tidak diketahui' }}</p>
                        <p><strong>Genre:</strong> {{ $item->genre->name ?? 'Tidak diketahui' }}</p>
                    </div>

                </div>
            </div>
        @endforeach

            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
