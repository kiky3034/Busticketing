<!-- resources/views/admin/tickets/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Tiket</h1>
        <!-- Tombol Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
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
                        <th>Nama Pemesan</th>
                        <th>Nama Bis</th>
                        <th>Jadwal</th>
                        <th>Nomor Kursi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->schedule->bus->name }} ({{ $ticket->schedule->bus->capacity }} seats)</td>
                        <td>{{ $ticket->schedule->departure_time }}</td>
                        <td>{{ $ticket->seat_number }}</td>
                        <td class="text-center">
                            <!-- Form untuk hapus ticket dengan ikon -->
                            <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
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
