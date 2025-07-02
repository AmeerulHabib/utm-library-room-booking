<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'capacity',
        'type',
        'description',
    ];

    // Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
