<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::get();

        return view('admin.hotel.index' , ['hotels' => $hotels]);
    }
    public function create()
    {
        return view('admin.hotel.create');
    }
        public function store(StoreHotelRequest $request)
    {

        $name = $request->input('name'); //lay name tu request form gui len
        $address = $request->input('address'); //lay description tu request form gui len
        $phone = $request->input('phone');
        $email =$request->input('email');
        $des =$request->input('description');
        $image = $request->file('image')->getClientOriginalName(); //lay ten file
        $request->file('image')->storeAs('public/images', $image);

        //tao data de luu vao db
        $data = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'image' => $image,
            'description' => $des,
        ];

        Hotel::create($data); //tao ban ghi co du lieu la $data

        return redirect()->route('hotels.index')
            ->with('success','Hotel add thanh cong.');
    }
    public function edit(Hotel $hotel){
        return view('admin.hotel.edit', compact('hotel'));
    }
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $name = $request->input('name'); // lay input name moi
        $des = $request->input('description'); //lay input description moi
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $hotel->fill([
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'description' => $des,
        ])->save();

        if ($request->file('image') !== null) {
            $image = $request->file('image')->getClientOriginalName(); //lay ten file
            $request->file('image')->storeAs('public/images', $image); //luu file vao duong dan public/images voi ten $logo
        
            $hotel->fill([
                'image' => $image,
            ])->save();
        }

        return redirect()->route('hotels.index')
            ->with('success', 'Hotel update successfully');
    }
    public function destroy(Hotel $hotel)
    {
        //
        $hotel->delete();

        return redirect()->route('hotels.index')
            ->with('success', 'Delete Hotel Thanh cong');
    }
}
