<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'name', 'email', 'check_in_date', 'check_out_date'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
