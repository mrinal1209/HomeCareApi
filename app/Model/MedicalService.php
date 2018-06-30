<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalService extends Model
{
  protected $primaryKey = 'medical_service_id';
  protected $fillable = ['medical_service_name','hospital_department_id','medical_service_is_active'];
  
  public function department(){
     return $this->belongsTo(HospitalDepartment::class);
 }

  public function plans(){
   return $this->hasMany(ServicePlan::class);
 }
}
