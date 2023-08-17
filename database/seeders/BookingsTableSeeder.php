<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookingsTableSeeder extends Seeder
{
        /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Số lượng bản ghi bạn muốn tạo
        $numBookings = 20;

        for ($i = 0; $i < $numBookings; $i++) {
            DB::table('bookings')->insert([
                'room_id' => $faker->numberBetween(1, 10), // Thay 10 bằng số lượng phòng bạn có trong bảng "rooms"
                'check_in' => $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                'check_out' => $faker->dateTimeBetween('+2 days', '+1 month')->format('Y-m-d'),
                'guest_name' => $faker->name,
                'guest_email' => $faker->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

