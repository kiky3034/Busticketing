<!-- resources/views/user/schedules/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Tombol Dashboard -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Daftar Jadwal Tersedia</h1>
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-home"></i> Beranda
        </a>
    </div>

    <!-- Tabel Schedules -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Bis</th>
                <th>Waktu Keberangkatan</th>
                <th>Tujuan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->bus->name }}</td>
                    <td>{{ $schedule->departure_time }}</td>
                    <td>{{ $schedule->destination }}</td>
                    <td>${{ $schedule->price }}</td>
                    <td>
                        <form action="{{ route('user.tickets.book') }}" method="POST">
                            @csrf
                            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                            <input type="number" name="seat_number" class="form-control" placeholder="Nomor Kursi" required>
                            <button type="submit" class="btn btn-primary mt-2">Pesan Tiket</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
