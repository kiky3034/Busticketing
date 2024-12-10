<!-- resources/views/admin/buses/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Bis</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.buses.update', $bus->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Bis</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $bus->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" name="capacity" id="capacity" value="{{ $bus->capacity }}" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <!-- Tombol Cancel dengan ikon -->
                    <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <!-- Tombol Update dengan ikon -->
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Perbarui Bis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
