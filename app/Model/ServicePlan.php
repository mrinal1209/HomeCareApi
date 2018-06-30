<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    protected $primaryKey = 'service_plan_id';
    protected $fillable = ['service_plan_name', 'service_plan_price' , 'service_plan_services' , 'medical_service_id' , 'service_plan_is_active'];

    public function services(){
      return $this->belongsTo(MedicalService::class);
    }
}
