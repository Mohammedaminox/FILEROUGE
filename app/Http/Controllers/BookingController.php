<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking', compact('bookings'));
    }

    public function book(Request $request, $room_id)
    {
        // Validate the form data
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        // Create a new booking
        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->room_id = $room_id;
        $booking->check_in_date = $request->check_in_date;
        $booking->check_out_date = $request->check_out_date;
        $booking->total_price = $request->total_price; // Total price should come from the form
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->back()->with('success', 'Room booked successfully!');
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('bookings.index', ['bookings' => $bookings]);
    }
}
