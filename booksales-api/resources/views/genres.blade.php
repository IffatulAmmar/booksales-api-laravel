<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Buku - BookSales</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Macam-Macam Genre Buku</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <ul class="list-group">
                    @if ($genres->count())
                        @foreach ($genres as $item)
                            <li class="list-group-item">
                                <strong>Nama Genre:</strong> {{ $item->name }} <br>
                                <strong>Deskripsi:</strong> {{ $item->description }}
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item text-center text-muted">
                            Belum ada genre yang tersedia.
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
