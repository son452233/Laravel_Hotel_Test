<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('hotels')->insert([
                'name' => 'Hotel ' . $i,
                'address' => 'Address ' . $i,
                'phone' => '123-456-789' . $i,
                'email' => 'hotel' . $i . '@example.com',
                'image' => 'image_' . $i . '.jpg', // Giả sử tên hình ảnh được lưu dưới dạng image_1.jpg, image_2.jpg, ...
                'description' => 'Description for Hotel ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
