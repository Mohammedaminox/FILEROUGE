<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\room_service;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
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

    public function room_details($id)
    {
        $room = Room::find($id);
        $service = Service::all();
        return view('frontOffice.room_details',[
            'room' => $room,
            'service' => $service,
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|unique:rooms|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'room_type' => 'required|string|max:255|in:single,double,suite',
            'floor' => 'required|integer|min:1',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|string|in:vacant,occupied,under_maintenance',
            'availability' => 'boolean',
            'price' => 'required|numeric|min:0.01',
            'max_occupancy' => 'required|integer|min:1',
            'check_in_date' => 'nullable|date_format:Y-m-d H:i:s',
            'check_out_date' => 'nullable|date_format:Y-m-d H:i:s',
            'category_id' => 'required|exists:categories,id|integer',
            'user_id' => 'exists:users,id|integer',
        ]);

        $roomData = $validatedData;

        $image = $request->file('image');
        if ($image) {
            $uniqueFileName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('Pback/assets/images'), $uniqueFileName);
            $roomData['image'] = $uniqueFileName;
        }

        // Create room
        $room = Room::create($roomData);

        if ($room) {
            // Check if services are provided in the request
            if ($request->has('service_id')) {
                // Prepare room services data
                $roomServices = [];
                foreach ($request->input('service_id') as $serviceId) {
                    $roomServices[] = ['room_id' => $room->id, 'service_id' => $serviceId];
                }

                // Insert room services
                $inserted = DB::table('room_service')->insert($roomServices);

                if ($inserted) {
                    return back()->with('success', 'Room created successfully');
                } else {

                    $room->delete();
                    return back()->with('error', 'Room creation failed');
                }
            } else {
                return back()->with('success', 'Room created successfully');
            }
        } else {
            return back()->with('error', 'Room creation failed');
        }
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
