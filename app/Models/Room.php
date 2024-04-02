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
}
