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
                    @forelse ($genres as $item)
                        <li class="list-group-item">
                            <strong>ID:</strong> {{ $item['id'] }} <br>
                            <strong>Nama Genre:</strong> {{ $item['name'] }}
                        </li>
                    @empty
                        <li class="list-group-item text-center text-muted">
                            Belum ada genre yang tersedia.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
