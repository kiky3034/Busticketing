<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('bus')->where('departure_time', '>=', now())->get();
        return view('user.schedules.index', compact('schedules'));
    }

    public function viewTicket()
    {
        $tickets = Ticket::where('user_id', auth()->id())->with('schedule')->get();
        return view('user.tickets.index', compact('tickets'));
    }

    public function bookTicket(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_number' => 'required|integer|min:1',
        ]);

        // Pastikan seat yang dipilih belum dipesan
        $schedule = Schedule::findOrFail($request->schedule_id);
        if (Ticket::where('schedule_id', $schedule->id)->where('seat_number', $request->seat_number)->exists()) {
            return redirect()->back()->withErrors(['seat_number' => 'This seat is already taken.']);
        }

        // Membuat tiket
        Ticket::create([
            'user_id' => auth()->id(),
            'schedule_id' => $request->schedule_id,
            'seat_number' => $request->seat_number,
        ]);

        return redirect()->route('user.tickets.index')->with('success', 'Ticket booked successfully.');
    }

    public function showTicket($ticketId)
    {
        // Temukan tiket berdasarkan ID, termasuk jadwal dan bus yang terkait
        $ticket = Ticket::with('schedule.bus')->findOrFail($ticketId);

        // Kirim data tiket ke view
        return view('user.tickets.show', compact('ticket'));
    }


    // Tambahkan method dashboard untuk user
    public function dashboard()
    {
        return view('user.dashboard'); // Ganti dengan nama view yang sesuai
    }
}
