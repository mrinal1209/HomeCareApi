<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalDepartmentContact extends Model
{
  public function department(){
     return $this->belongsTo(HospitalDepartment::class);
 }

  public function cases(){
  return $this->hasMany(CaseReservation::class);
}

}
