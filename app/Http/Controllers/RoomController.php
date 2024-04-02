<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index()
    {
        $user = session('user_id');
        $rooms = Room::all();
        $categories = Category::all();


        return view('rooms', [
            'rooms' => $rooms,
            'user' => $user,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|unique:rooms|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',  // Ensure valid URL format
            'room_type' => 'required|string|max:255|in:simple,double,suite',  // Limit to specific types
            'floor' => 'required|integer|min:1',  // Minimum floor of 1
            'description' => 'nullable|string|max:1000',  // Reasonable description length limit
            'status' => 'required|string|in:vacant,occupied,under_maintenance',
            'availability' => 'boolean',
            'price' => 'required|numeric',  // Minimum price of 0.01
            'max_occupancy' => 'required|integer|min:1',  // Minimum occupancy of 1
            'check_in_date' => 'nullable|date_format:Y-m-d H:i:s',  // Allow nullable date with specific format
            'check_out_date' => 'nullable|date_format:Y-m-d H:i:s',  // Allow nullable date with specific format
            'category_id' => 'required|exists:categories,id|integer',  // Ensure existing category ID
            'user_id' => 'exists:users,id|integer',  // Ensure existing user ID
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $roomData = $request->all();

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('Pback/assets/images'), $imageName);
        }

        // Create the room record
        $room = Room::create($roomData);
    }
}
