<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $rooms->load(
            'hotel',
            // 'category',
            );
        return view('admin.room.index', ['rooms' => $rooms]);
    }
    public function create(){
        $hotels = Hotel::get(); // Lấy tất cả các bản ghi từ bảng hotels

        return view('admin.room.create', ['hotels' => $hotels]);
    }
  
    public function store(StoreRoomRequest $request)
    {
        $hotel_id = $request->input('hotel_id');
        $roomNum = $request->input('room_number');
        $roomType = $request->input('room_type');
        $price = $request->input('price_per_night');
    
        // Kiểm tra xem phòng đã tồn tại trong cơ sở dữ liệu hay chưa
        $existingRoom = Room::where('room_number', $roomNum)
                             ->where('room_type', $roomType)
                             ->first();
    
        if ($existingRoom) {
            // Nếu phòng đã tồn tại, cập nhật dữ liệu mới
            $existingRoom->price_per_night = $price;
            if ($request->hasFile('room_image')) {
                $image = $request->file('room_image')->getClientOriginalName();
                $request->file('room_image')->storeAs('public/images', $image);
                $existingRoom->room_image = $image;
            }
            $existingRoom->save();
    
            return redirect()->route('room.index')
                             ->with('success', 'Room has been updated successfully.');
        } else {
            // Nếu phòng không tồn tại, tạo bản ghi mới
            if ($request->hasFile('room_image')) {
                $image = $request->file('room_image')->getClientOriginalName();
                $request->file('room_image')->storeAs('public/images', $image);
            } else {
                $image = null;
            }
    
            $data = [
                'hotel_id' => $hotel_id,
                'room_image' => $image,
                'price_per_night' => $price,
                'room_type' => $roomType,
                'room_number' => $roomNum,
            ];
    
            Room::create($data);
    
            return redirect()->route('rooms.index')
                             ->with('success', 'Room has been created successfully.');
        }
    }
    public function update(Request $request, $roomId)
    {
        // Lấy dữ liệu từ form
        $hotel_id = $request->input('hotel_id');
        $room_number = $request->input('room_number');
        $room_type = $request->input('room_type');
        $price_per_night = $request->input('price_per_night');
    
        // Kiểm tra và cập nhật phòng
        $room = Room::find($roomId);
        if (!$room) {
            return redirect()->route('rooms.index')->with('error', 'Room not found.');
        }
    
        // Kiểm tra trùng lặp
        $existingRoom = Room::where('room_number', $room_number)
                            ->where('room_type', $room_type)
                            ->where('room_id', '<>', $roomId) // Loại trừ bản ghi hiện tại
                            ->first();
    
        if ($existingRoom) {
            return redirect()->back()->withInput()->with('error', 'Room already exists.');
        }
    
        $room->hotel_id = $hotel_id;
        $room->room_number = $room_number;
        $room->room_type = $room_type;
        $room->price_per_night = $price_per_night;
        $room->save();
    
        return redirect()->route('rooms.index')->with('success', 'Room has been updated successfully.');
    }
    public function edit(Room $room){
        $hotels = Hotel::all();
        return view('admin.room.edit', compact('room', 'hotels'));
    }
}
