<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id(); // Khóa chính duy nhất để xác định từng khách sạn.
            $table->string('name'); // Tên của khách sạn.
            $table->string('address'); // Địa chỉ của khách sạn.
            $table->string('phone'); // Số điện thoại liên hệ của khách sạn.
            $table->string('email')->unique(); // Địa chỉ email của khách sạn (duy nhất).
            $table->string('image'); // Trường hình ảnh sau trường tên.
            $table->text('description')->nullable(); // Trường mô tả (có thể null).
            $table->timestamps(); // Thêm hai trường thời gian: 'created_at' và 'updated_at'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
