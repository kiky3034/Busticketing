<!-- resources/views/admin/buses/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Daftar Bis</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('admin.buses.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Bis Baru
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Semua Bis</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kapasitas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buses as $bus)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bus->name }}</td>
                        <td>{{ $bus->capacity }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.buses.edit', $bus->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Form untuk delete bus -->
                            <form action="{{ route('admin.buses.delete', $bus->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
