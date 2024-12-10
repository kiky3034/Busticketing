<!-- resources/views/user/tickets/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Tiket Saya</h1>
        <!-- Tombol Dashboard -->
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-home"></i> Beranda
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Semua Tiket</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Jadwal</th>
                        <th>Nomor Kursi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->schedule->bus->name }} ({{ $ticket->schedule->departure_time }})</td>
                        <td>{{ $ticket->seat_number }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a> <!-- Optional View Button -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
