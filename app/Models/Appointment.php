<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'maladie',
        'date_of_birth',
        'CIN',
        'gender',
        'blood_type',
        'status',
        'phone',
        'appointment_date',
        'allergies',
        'CNSS Number',
    ];
}
