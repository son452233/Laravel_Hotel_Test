<?php

// HotelController.php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HotelControllerAPI extends Controller
{
    protected $Hotel;
    public function __construct()
    {
        $this->Hotel = new Hotel();
    }
    public function index()
    {
        // Phương thức GET để lấy danh sách các khách sạn
        $hotels = $this->Hotel->get();
        return response()->json($hotels);
    }

    public function store(Request $request)
    {
        // Phương thức POST để tạo một khách sạn mới

        $name = $request->input('name'); //lay name tu request form gui len
        $address = $request->input('address'); //lay description tu request form gui len
        $phone = $request->input('phone');
        $email = $request->input('email');
        $des = $request->input('description');
        $image = $request->file('image')->getClientOriginalName(); //lay ten file
        $request->file('image')->storeAs('storage/images', $image);

        //tao data de luu vao db
        $data = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'image' => $image,
            'description' => $des,
        ];

        $hotel = Hotel::create($data); //tao ban ghi co du lieu la $data

        return response()->json($hotel);
    }

    public function show(Hotel $hotel)
    {
        // Phương thức GET để lấy thông tin một khách sạn cụ thể
        return response()->json($hotel);
    }

    public function update(Request $request, Hotel $hotel)
    {
        // $id = Hotel::find($id);
        $name = $request->input('name'); // lay input name moi
        $des = $request->input('description'); //lay input description moi
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');

        // $image = $request->hasFile('image')?$request->file('image')->getClientOriginalName():$hotel->image;
        // if($image){
        //     $request->file('image')->storeAs('public/images', $image);
        // }
        $data = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'description' => $des,
        ];

        if ($request->file('image') !== null) {
            $image = $request->file('image')->getClientOriginalName(); //lay ten file
            $request->file('image')->storeAs('public/images', $image); //luu file vao duong dan public/images voi ten $logo

            $data['image'] = $image;
        }

        $hotel->update($data);
        // dd($hotel);
        return response()->json([
            "massage" => 'Update success',
            $data
        ]);
    }

    public function destroy(Hotel $hotel)
    {
        // Phương thức DELETE để xóa một khách sạn
        $image = $hotel->image;
        Storage::delete('public/images/' . $image); //xoa file cu
        $hotel->delete();

        return response()->json(['message' => 'Delete successfully']);
    }
}
