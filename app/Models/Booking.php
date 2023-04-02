<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Training;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = ['member_id', 'training_id', 'booking_time'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
