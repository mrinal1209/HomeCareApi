<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CaseReservation extends Model
{
    protected $primaryKey = 'case_reservation_id';

    protected $fillable = ['medical_registration_id' , 'med_dep_contact_id' , 'case_reservation_status' , 'case_reservation_is_active'];

    public function contact(){
      return $this->belongsTo(MedicalDepartmentContact::class);
    }
    
    public function addon(){
      return $this->hasMany(CaseReservationAddon::class);
    }
}
