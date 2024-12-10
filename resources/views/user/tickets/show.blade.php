<!-- resources/views/user/tickets/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Ticket Details Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Tiket</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Bis</th>
                    <td>{{ $ticket->schedule->bus->name }}</td>
                </tr>
                <tr>
                    <th>Waktu Keberangkatan</th>
                    <td>{{ $ticket->schedule->departure_time }}</td>
                </tr>
                <tr>
                    <th>Nomor Kursi</th>
                    <td>{{ $ticket->seat_number }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{ $ticket->schedule->price }}</td>
                </tr>
                <tr>
                    <th>Dari</th>
                    <td>{{ $ticket->schedule->from }}</td>
                </tr>
                <tr>
                    <th>Tujuan</th>
                    <td>{{ $ticket->schedule->destination }}</td>
                </tr>
            </table>

            <!-- Back Button with Icon -->
            <a href="{{ route('user.tickets.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Tiket Saya
            </a>
        </div>
    </div>
</div>
@endsection
