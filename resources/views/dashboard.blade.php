

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { margin-bottom: 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card { border: none; box-shadow: 0 0 15px rgba(0,0,0,0.05); }
        .table thead { background-color: #007bff; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">📚 Perpus-App</a>
            <div class="ms-auto">
                <span class="text-white me-3">Selamat Datang, <strong>{{ Auth::user()->name }}</strong></span>
                <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4">
                    <h5 class="mb-3">Tambah Buku Baru</h5>
                    <form action="{{ url('/books/store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Laskar Pelangi" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="0" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan Buku</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-4">
                    <h5 class="mb-3">Daftar Koleksi Buku</h5>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $b)
                                <tr>
                                    <td class="align-middle">{{ $b->judul }}</td>
                                    <td class="align-middle">{{ $b->penulis }}</td>
                                    <td class="text-center align-middle">
                                        <span class="badge bg-info text-dark">{{ $b->stok }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/books/delete/' . $b->id) }}" 
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('Hapus buku ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>