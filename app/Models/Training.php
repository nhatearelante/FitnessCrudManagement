<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'difficulty;', 'start_time', 'end_time', 'trainer_id'];
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
