<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CaseReservationAddon extends Model
{
    protected $primaryKey = 'reservation_addon_id';

    protected $fillable = ['case_reservation_id' , 'case_instructions' , 'case_documents'];

    public function case(){
      return $this->belongsTo(CaseReservation::class);
    }
}
