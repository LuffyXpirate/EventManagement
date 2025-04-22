<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'organizer_id',
        'category_id',
        'venue_id',
        'title',
        'description',
        'start_time',
        'end_time',
        'price',
        'max_attendees',
        'photo',
        'status',
        'is_approved'
    ];
    protected $attributes = [
        'status' => 'pending',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venues::class);
    }

    // app/Models/Event.php
    public function bookings()
    {
        return $this->hasMany(Payment::class);
    }

    public function availableSeats()
    {
        return $this->max_attendees - $this->bookings()->sum('quantity');
    }

}
