<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HospitalDepartment extends Model
{
   protected $primaryKey = 'hospital_department_id';
  protected $fillable = ['hospital_department_name','hospital_department_is_active'];

  public function services(){
     return $this->hasMany(MedicalService::class);
 }

 public function contacts(){
   return $this->hasMany(MedicalDepartmentContact::class);
 }


}
