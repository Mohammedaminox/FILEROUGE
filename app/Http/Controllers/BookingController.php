<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function book(Request $request, $room_id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        // Create a new booking
        $booking = new Booking();
        $booking->room_id = $room_id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->check_in_date = $request->check_in_date;
        $booking->check_out_date = $request->check_out_date;
        $booking->save();

        return redirect()->back()->with('success', 'Room booked successfully!');
    }
}
