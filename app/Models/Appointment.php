<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded=[];
        //name   id  phone patient_id doctor_id  hospital_id gender

}

// //علاقه السجل والمريض
// public function medical_records()
// {
//     return $this->hasMany('App\Models\MedicalRecord', 'MedicalRecord_id');
// }

// //علاقه الميعاد والمريض
// public function appointments()
// {
//     return $this->hasMany('App\Models\appointments', 'appointment_id');
// }


// علاقه المستشفيات والمريض
// public function hospitals()
// {
//     return $this->hasMany('App\Models\hospitals', 'Hospital_id');
// }
// // doctors
//  //علاقه  الدكاتره والمريض
// public function doctors()
// {
//     return $this->hasMany('App\Models\doctors', 'doctor_id');
// }
