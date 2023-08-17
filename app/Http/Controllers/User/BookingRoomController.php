<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Room; // Import the Room model
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class BookingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function booking()
    {
        // Lấy danh sách các phòng từ bảng "hotels"
        $rooms = room::get();
        // Truyền biến $rooms vào view booking.blade.php
        return view('user.booking', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.booking');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        
        $room_id = $request->input('room_id'); //lay name tu request form gui len
        $check_in = $request->input('check_in'); //lay description tu request form gui len
        $check_out = $request->input('check_out');
        $guest_name =$request->input('guest_name');
        $guest_email =$request->input('guest_email');

        //tao data de luu vao db
        $data = [
            'room_id' => $room_id,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'guest_name' => $guest_name,
            'guest_email' => $guest_email,
        ];

        Booking::create($data); //tao ban ghi co du lieu la $data

        return redirect()->route('user.booking')
            ->with('success','Book thanh cong.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
