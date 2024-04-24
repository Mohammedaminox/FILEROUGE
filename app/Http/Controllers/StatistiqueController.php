<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Room;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function Statistique()
    {
        $users = User::all()->where('role','user')->count();
        $services = Service::all()->count();
        $rooms = Room::all()->count();
        $bookings = Booking::all()->count();
        $cancelBookings = Booking::all()->where('status','canceled')->count();
        $confirmeBookings = Booking::all()->where('status','confirmed')->count();
        $categories = Category::all()->count();


        return view('statistique',[
                'users' => $users,
                'services' => $services,
                'rooms' => $rooms,
                'bookings' => $bookings,
                'cancelBookings' => $cancelBookings,
                'confirmeBookings' => $confirmeBookings,
                'categories' => $categories,
        ]);
    }
}
