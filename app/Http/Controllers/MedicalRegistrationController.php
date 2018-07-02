<?php

namespace App\Http\Controllers;

use App\Model\MedicalRegistration;
use Illuminate\Http\Request;

class MedicalRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(MedicalRegistration::all(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new MedicalRegistration;
        $obj->patient_first_name = $request->patient_first_name;
        $obj->patient_last_name = $request->patient_last_name;
        $obj->patient_email = $request->patient_email;
        $obj->patient_phone_number = $request->patient_phone_number;
        $obj->patient_residence = $request->patient_residence;
        $obj->patient_city = $request->patient_city;
        $obj->patient_country = $request->patient_country;
        $obj->patient_age = $request->patient_age;
        $obj->patient_gender = $request->patient_gender;
        $obj->patient_dob = $request->patient_dob;
        $obj->user_id = $request->user_id;
        $obj->service_plan_id = $request->service_plan_id;
        $obj->save();
        return response([
          'medical_registration_id' => $obj->medical_registration_id,
          'status' => "Created successfully"
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\MedicalRegistration  $medicalRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRegistration $registration)
    {
        return response(MedicalRegistration::findOrFail($registration->medical_registration_id) , 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MedicalRegistration  $medicalRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalRegistration $registration)
    {
        $registration->update($request->all());
        return response([
            'medical_registration_id' => $registration->medical_registration_id,
            'status' => "Update successfull"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\MedicalRegistration  $medicalRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRegistration $registration)
    {
        $registration->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
