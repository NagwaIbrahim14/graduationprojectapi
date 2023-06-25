<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $fillable=['name','percentageofmodel','percentageofdoctor','Hospital_id','patient_id'];
    //علاقه   المستشفيات والداكتره
    public function hospitals()
    {
        return $this->hasMany('App\Models\hospitals', 'Hospital_id');
    }

    public function patients()
    {
        return $this->hasMany('App\Models\patients', 'patient_id');
    }
}


// // علاقه دكتور و ميعاد
// public function appointments()
// {
//     return $this->hasMany('App\Models\appointments', 'appointment_id');
// }





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
