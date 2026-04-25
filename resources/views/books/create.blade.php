@extends('layouts.app')

@section('content')
<div class="col-md-6 mx-auto">
    <div class="card shadow">
        <div class="card-header">Tambah Buku</div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection