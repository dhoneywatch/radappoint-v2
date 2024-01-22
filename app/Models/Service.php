<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'modality_code',
        'procedure_code',
        'procedure_name',
        'price',
    ];

     public function slot()
     {
        return $this->hasMany(Slot::class);
     }

     public function appointment()
     {
        return $this->belongsToMany(Appointment::class);
     }
}
