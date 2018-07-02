<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_first_name', 'user_last_name', 'user_email', 'user_password' ,'user_phone_number',
        'user_profile_picture','user_residence' , 'user_city' , 'user_country' , 'user_is_active'
    ];

    public function registration(){
        return $this->hasMany(MedicalRegistration::class);
    }

}
