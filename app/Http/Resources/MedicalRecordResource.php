<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
    //id name  percentageofmodel  percentageofdoctor  Hospital_id  patient_id

        return [
            // 'xx'=>$this->id,
            'id'=>$this->id,
             'name'=>$this->name,
             'percentageofmodel'=>$this->percentageofmodel,
             'percentageofdoctor'=>$this->percentageofdoctor,
             'Hospital_id'=>$this->hospital_id,
             'patient_id'=>$this->patient_id,
            //  'date'=>$this->date,
            // 'doctor_id'=>$this->doctor_id,
            // 'hospital_id'=>$this->hospital_id,
            // 'patient_id'=>$this->patient_id,
            //  'gender'=>$this->gender
        ];
    }
}
