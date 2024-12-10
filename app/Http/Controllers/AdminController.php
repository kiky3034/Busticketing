<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Ganti dengan nama view yang sesuai
    }


    // Bus Management
    public function indexBus()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function createBus()
    {
        return view('admin.buses.create');
    }

    public function storeBus(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        // Menyimpan data bus
        Bus::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        // Redirect ke halaman list bus dengan pesan sukses
        return redirect()->route('admin.buses.index')->with('success', 'Bus added successfully.');
    }


    public function editBus($id)
    {
        $bus = Bus::findOrFail($id);
        return view('admin.buses.edit', compact('bus'));
    }

    public function updateBus(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
        ]);

        $bus->update($request->only(['name', 'capacity']));
        return redirect()->route('admin.buses.index')->with('success', 'Bus updated successfully.');
    }

    public function deleteBus($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        return redirect()->route('admin.buses.index')->with('success', 'Bus deleted successfully.');
    }

    // Schedule Management
    public function indexSchedule()
    {
        $schedules = Schedule::with('bus')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function createSchedule()
    {
        $buses = Bus::all(); // Ambil daftar bus untuk pilihan dropdown
        return view('admin.schedules.create', compact('buses'));
    }

    public function storeSchedule(Request $request)
{
    // Validasi input
    $request->validate([
        'bus_id' => 'required|exists:buses,id',
        'departure_time' => 'required|date',
        'destination' => 'required|string',
        'from' => 'required|string', // Menambahkan validasi untuk 'from'
        'price' => 'required|numeric|min:0',
    ]);

    // Menyimpan data schedule termasuk 'from', 'destination', dan 'price'
    Schedule::create([
        'bus_id' => $request->bus_id,
        'departure_time' => $request->departure_time,
        'from' => $request->from, // Menambahkan 'from'
        'destination' => $request->destination,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.schedules.index')->with('success', 'Schedule added successfully.');
}

    public function editSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $buses = Bus::all(); // Ambil daftar bus untuk pilihan dropdown
        return view('admin.schedules.edit', compact('schedule', 'buses'));
    }

    public function updateSchedule(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'departure_time' => 'required|date',
            'from' => 'required|string',
            'destination' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Mencari jadwal berdasarkan ID
        $schedule = Schedule::findOrFail($id);

        // Mengupdate jadwal dengan data dari formulir
        $schedule->update([
            'bus_id' => $request->bus_id,
            'departure_time' => $request->departure_time,
            'from' => $request->from,
            'destination' => $request->destination,
            'price' => $request->price,
        ]);

        // Redirect ke halaman list schedule dengan pesan sukses
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully.');
    }


    public function deleteSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully.');
    }

    // Ticket Management
    public function indexTicket()
    {
        $tickets = Ticket::with(['user', 'schedule'])->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function destroyTicket($id)
    {
        // Temukan tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        // Hapus tiket
        $ticket->delete();

        // Redirect kembali ke daftar tiket dengan pesan sukses
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been deleted successfully.');
    }

}
