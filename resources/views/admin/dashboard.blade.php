@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="dashboard-header text-center mb-5">
            <h1 class="display-4">Halaman Admin</h1>
            <p class="lead">Selamat Datang, {{ auth()->user()->name }}! Kamu Memiliki Hak Akses Admin.</p>
        </div>

        <div class="row">
            <!-- Manage Buses Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('Images/bus.png')}}" class="card-img-top" alt="Buses">
                    <div class="card-body">
                        <h3 class="card-title">Kelola Bis</h3>
                        <a href="{{ route('admin.buses.index') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-bus"></i> Lihat Bis
                        </a>
                        <a href="{{ route('admin.buses.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-plus-circle"></i> Tambah Bis Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Manage Schedules Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('Images/schedule.png')}}" class="card-img-top" alt="Schedules">
                    <div class="card-body">
                        <h3 class="card-title">Kelola Jadwal</h3>
                        <a href="{{ route('admin.schedules.index') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-calendar-alt"></i> Lihat Jadwal
                        </a>
                        <a href="{{ route('admin.schedules.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-plus-circle"></i> Tambah Jadwal Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Manage Tickets Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('Images/ticket.png')}}" class="card-img-top" alt="Tickets">
                    <div class="card-body">
                        <h3 class="card-title">Kelola Tiket</h3>
                        <a href="{{ route('admin.tickets.index') }}" class="btn btn-primary w-100">
                            <i class="fas fa-ticket-alt"></i> Lihat Tiket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
