<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalRegistrationAddon extends Model
{
     protected $primaryKey = 'registration_addon_id';

     protected $fillable = ['medical_registration_id' , 'patient_instructions' , 'patient_documents'];

     public function registration(){
       return $this->belongsTo(MedicalRegistration::class);
     }
}
