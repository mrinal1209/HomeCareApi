<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalService extends Model
{
  public function department(){
     return $this->belongsTo(HospitalDepartment::class);
 }

  public function plans(){
   return $this->hasMany(ServicePlan::class);
 }
}
