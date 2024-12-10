@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Tambah Jadwal Baru</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.schedules.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="bus_id" class="form-label">Nama Bis</label>
                    <select name="bus_id" id="bus_id" class="form-control" required>
                        @foreach($buses as $bus)
                            <option value="{{ $bus->id }}">{{ $bus->name }} Kapasitas {{ $bus->capacity }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="departure_time" class="form-label">Waktu Keberangkatan</label>
                    <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" required>
                </div>

                <div class="mb-3">
                    <label for="from" class="form-label">Dari</label>
                    <input type="text" class="form-control" id="from" name="from" required>
                </div>

                <div class="mb-3">
                    <label for="destination" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="destination" name="destination" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" required step="0.01" min="0">
                </div>

                <div class="d-flex justify-content-end">
                    <!-- Tombol Batal dengan ikon -->
                    <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <!-- Tombol Tambah Jadwal dengan ikon -->
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Tambah Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
