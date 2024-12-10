<!-- resources/views/admin/schedules/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Jadwal</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.schedules.update', $schedule->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="bus_id" class="form-label">Nama Bis</label>
                    <select name="bus_id" id="bus_id" class="form-select" required>
                        @foreach($buses as $bus)
                            <option value="{{ $bus->id }}" {{ $bus->id == $schedule->bus_id ? 'selected' : '' }}>
                                {{ $bus->name }} (Capacity: {{ $bus->capacity }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="departure_time" class="form-label">Waktu Keberangkatan</label>
                    <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" 
                        value="{{ \Carbon\Carbon::parse($schedule->departure_time)->format('Y-m-d\TH:i') }}" required>
                </div>

                <div class="mb-3">
                    <label for="from" class="form-label">Dari</label>
                    <input type="text" class="form-control" id="from" name="from" 
                        value="{{ old('from', $schedule->from) }}" required>
                </div>

                <div class="mb-3">
                    <label for="destination" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="destination" name="destination" 
                        value="{{ old('destination', $schedule->destination) }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="price" name="price" 
                        value="{{ old('price', $schedule->price) }}" required step="0.01" min="0">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Perbarui Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
