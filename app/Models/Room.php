<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'capacity',
    ];

    /**
     * A Room may have multiple Bookings.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
