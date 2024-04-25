<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
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
        // Get the room
        $room = Room::findOrFail($room_id);
        $bookings = Booking::where('room_id', $room_id)->get();
       
        // Check if the room is available for booking
        foreach ($bookings as $booking) {
            if (!$room->isAvailableForBooking($request->check_in_date, $request->check_out_date) && $booking->status != "canceled") {
                return redirect()->back()->with(['failed' => 'The room is not available for the selected dates.']);
            }
        }



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
        $user = session('user_id');
        $bookings = Booking::where('user_id', $user)->where('status', 'confirmed')->get();
        return view('frontOffice.profil', ['bookings' => $bookings]);
    }

    public function cancelBooking(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        if ($booking) {
            $booking->status = 'canceled';
            $booking->save();
        }
        return redirect()->route('myBookings')->with('success', 'Booking canceled successfully');
    }

    public function destroy(Booking $id)
    {
        $id->delete();

        return redirect()->back()->with('success', 'booking deleted successfully');
    }
}
