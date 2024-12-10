<!-- resources/views/user/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Dashboard Header -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="display-4">Halaman Pengguna</h1>
        <p class="lead">Selamat Datang, {{ auth()->user()->name }}! Kamu Masuk Sebagai Pengguna.</p>
    </div>

    <!-- Dashboard Content (Manage Schedules and Tickets) -->
    <div class="row">
        <!-- View Schedules Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm" style="max-width: 26rem; margin: auto;">
                <img src="{{ asset('Images/schedule.png') }}" class="card-img-top" alt="Schedules" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Tersedia Saat Ini</h5>
                    <a href="{{ route('user.schedules.index') }}" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-calendar-check me-2"></i> Lihat Jadwal Yang Tersedia Saat Ini
                    </a>
                </div>
            </div>
        </div>

        <!-- View My Tickets Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm" style="max-width: 26rem; margin: auto;">
                <img src="{{ asset('Images/ticket.png') }}" class="card-img-top" alt="Tickets" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Tiket Saya</h5>
                    <a href="{{ route('user.tickets.index') }}" class="btn btn-primary w-100">
                        <i class="fas fa-ticket-alt me-2"></i> Lihat Tiket Saya
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
