<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id'); // Khóa chính duy nhất để xác định từng phòng.
            $table->unsignedBigInteger('hotel_id'); // Khóa ngoại liên kết với bảng "hotels".
            $table->string('room_number'); // Số phòng của khách sạn.
            $table->string('room_type'); // Loại phòng (Single, Double, Suite, ...).
            $table->decimal('price_per_night', 10, 2); // Giá thuê mỗi đêm của phòng.
            $table->string('room_image')->nullable(); // Đường dẫn hình ảnh của phòng (có thể null).
            $table->timestamps(); // Thêm hai trường thời gian: 'created_at' và 'updated_at'.
            $table->softDeletes(); //them xoa mem
            // Tạo liên kết khóa ngoại với bảng "hotels"
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
