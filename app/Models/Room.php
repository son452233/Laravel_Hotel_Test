<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_number',
        'room_type',
        'price_per_night',
        'room_image',
    ];
    protected $table = 'rooms'; // Định nghĩa lại tên bảng nếu cần thiết
    protected $primaryKey = 'room_id'; // Định nghĩa lại tên cột khoá chính
    public $timestamps = false; // Nếu không sử dụng timestamps
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    protected function bookings(){
        return $this->hasMany(Booking::class);
    }
}
