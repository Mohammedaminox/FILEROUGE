<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_number',
        'image',
        'room_type',
        'floor',
        'description',
        'status',
        'availability',
        'price',
        'max_occupancy',
        'check_in_date',
        'check_out_date',
        'category_id',
        'service_id',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }


    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function isAvailableForBooking($checkInDate, $checkOutDate)
    {
        $booked = $this->bookings()
            ->where('check_out_date', '>', $checkInDate)
            ->where('check_in_date', '<', $checkOutDate)
            ->exists();

        return !$booked;
    }
}
