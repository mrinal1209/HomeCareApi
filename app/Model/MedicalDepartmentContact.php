<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicalDepartmentContact extends Model
{
  protected $primaryKey = 'med_dep_contact_id';

  protected $fillable = ['hospital_department_id' , 'med_dep_contact_first_name' , 'med_dep_contact_last_name' ,
                         'med_dep_contact_phone' , 'med_dep_contact_email' , 'med_dep_contact_password' ,
                         'med_dep_contact_profile_picture' , 'med_dep_contact_residence' ,'med_dep_contact_city',
                         'med_dep_contact_country' , 'med_dep_contact_is_active'
                        ];

  public function department(){
     return $this->belongsTo(HospitalDepartment::class);
  }

  public function cases(){
  return $this->hasMany(CaseReservation::class);
 }

}
