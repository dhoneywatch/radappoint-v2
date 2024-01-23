<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'appointment_id',
        'radiologist_id',
        'room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function radiologist()
    {
        return $this->belongsTo(Radiologist::class);
    }
}
