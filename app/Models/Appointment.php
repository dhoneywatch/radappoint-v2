<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'slot_id',
        'request_image',
        'status',
        'patient_id',
        'payment_image',
        'is_paid'
    ];

    public function slot()
    {
        return $this->belongsTo(Slot::class, 'slot_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
