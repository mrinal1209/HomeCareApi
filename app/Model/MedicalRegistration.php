<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalRegistration extends Model
{
    protected $primaryKey = 'medical_registration_id';

    protected $fillable = [
        'service_plan_id' , 'user_id' , 'patient_first_name' , 'patient_last_name' , 'patient_email' , 'patient_phone_number',
        'patient_residence' , 'patient_city' , 'patient_country' , 'patient_age' , 'patient_gender' , 'patient_dob' ,
        'medical_registration_is_active'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function addon(){
      return $this->hasMany(MedicalRegistrationAddon::class);
    }

    public function plans(){
      return $this->belongsTo(ServicePlan::class);
    }
}
