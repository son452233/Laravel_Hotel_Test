<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'check_in',
        'check_out',
        'guest_name',
        'guest_email',
    ];
        protected function rooms(){
            return $this->belongsTo(Booking::class);    }

            protected $primaryKey = 'room_id'; // Định nghĩa lại tên cột khoá chính
}
