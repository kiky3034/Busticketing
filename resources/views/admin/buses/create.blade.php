@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Tambah Bis Baru</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.buses.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Bis</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Bis" required>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Masukkan Kapasitas Bis" required>
                </div>

                <div class="d-flex justify-content-end">
                    <!-- Tombol Batal dengan ikon -->
                    <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <!-- Tombol Tambah Bis dengan ikon -->
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Tambah Bis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
