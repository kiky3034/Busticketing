<!-- resources/views/admin/schedules/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Daftar Jadwal</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('admin.schedules.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Jadwal Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Semua Jadwal</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Bis</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->bus->name }} ({{ $schedule->bus->capacity }} kursi)</td>
                            <td>{{ $schedule->departure_time }}</td>
                            <td>{{ $schedule->from }}</td>
                            <td>{{ $schedule->destination }}</td>
                            <td>Rp {{ number_format($schedule->price, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this schedule?')">
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
