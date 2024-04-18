<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index()
    {
        $user = session('user_id');
        $rooms = Room::all();
        $categories = Category::all();
        $services = Service::all();


        return view('rooms', [
            'rooms' => $rooms,
            'user' => $user,
            'categories' => $categories,
            'services' => $services
        ]);
    }
    public function frontIndex()
    {
        $rooms = Room::all();
        $categories = Category::all();
        $services = Service::all();


        return view('frontOffice.index', [
            'rooms' => $rooms,
            'categories' => $categories,
            'services' => $services
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|unique:rooms|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',  // Ensure valid image format
            'room_type' => 'required|string|max:255|in:single,double,suite',  // Limit to specific types
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

        $image = $request->file('image');
        if ($image) {
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Pback/assets/images'), $uniqueFileName);

            $roomData['image'] = $uniqueFileName;
        }

        // Create the room record
        $room = Room::create($roomData);

        return redirect('room')->with('success', 'Room stored successfully.');
    }

    public function update(Request $request, Room $room)
    {
        // Update the room attributes
        $room->fill($request->only(['room_type', 'floor', 'description', 'status', 'price', 'max_occupancy', 'category_id']));

        $image = $request->file('image');
        if ($image) {
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Pback/assets/images'), $uniqueFileName);
            // Update the image field in $roomData
            $room->image = $uniqueFileName;
        }

        $room->save();

        return redirect('room')->with('success', 'Room updated successfully.');
    }


    public function destroy(Room $room)
    {
        if ($room->image) {
            $imagePath = 'Pback/assets/images/' . $room->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }
        $room->delete();
        return redirect('room')
            ->with('success', 'room deleted successfully.');
    }
}
