<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalReportResource extends JsonResource
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
             'Obstructive HCM'=>$this->Obstructive_HCM,
             'Gender'=>$this->Gender,
             'Syncope'=>$this->Syncope,
             'Dyspnea'=>$this->Dyspnea,
             'Fatigue'=>$this->Fatigue,
             'Presyncope'=>$this->Presyncope,
             'NYHA_Class'=>$this->NYHA_Class,
             'Atrial_Fibrillation'=>$this->Atrial_Fibrillation,
             'Hypertension'=>$this->Hypertension,
             'Beta_blocker'=>$this->Beta_blocker,
             'Ca_Channel_Blockers'=>$this->Ca_Channel_Blockers,
             'ACEI_ARB'=>$this->ACEI_ARB,
             'Coumadin'=>$this->Coumadin,
             'ACEI_ARB'=>$this->ACEI_ARB,
             'Max_Wall_Thick'=>$this->Max_Wall_Thick,
             'Septal_Anterior_Motion'=>$this->Septal_Anterior_Motion,
             'Mitral_Regurgitation'=>$this->Mitral_Regurgitation,
             'Ejection_Fraction'=>$this->Ejection_Fraction,
             'Hospital_id'=>$this->hospital_id,
            'patient_id'=>$this->patient_id

        ];
    }
}

// Schema::create('medical_reports', function (Blueprint $table) {
    // $table->id();
    // $table->Integer('Obstructive HCM');
    // $table->Integer('Gender');
    // $table->Integer('Syncope');
    // $table->Integer('Dyspnea');
    // $table->Integer('Fatigue');
    // $table->Integer('Presyncope');
    // $table->Integer('NYHA_Class');
    // $table->Integer('Atrial_Fibrillation');
    // $table->Integer('Hypertension');
    // $table->Integer('Beta_blocker');
    // $table->Integer('Ca_Channel_Blockers');
    // $table->Integer('ACEI_ARB');
    // $table->Integer('Coumadin');
    // $table->Integer('Max_Wall_Thick');
    // $table->Integer('Septal_Anterior_Motion');
    // $table->Integer('Mitral_Regurgitation');
    // $table->double('Ejection_Fraction');
    // $table->bigInteger('Hospital_id')->unsigned();
    // $table->foreign('Hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
    // $table->bigInteger('patient_id')->unsigned();
    // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
    // $table->timestamps();
