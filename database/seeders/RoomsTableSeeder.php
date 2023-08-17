<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rooms')->insert([
                'hotel_id' => rand(1, 5), // Giả sử có 5 khách sạn (hotel_id từ 1 đến 5)
                'room_number' => 'Room ' . $i,
                'room_type' => 'Type ' . $i,
                'price_per_night' => rand(100, 500), // Giá thuê mỗi đêm ngẫu nhiên từ 100 đến 500
                'room_image' => 'image_' . $i . '.jpg', // Giả sử tên hình ảnh được lưu dưới dạng image_1.jpg, image_2.jpg, ...
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}