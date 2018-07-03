<?php

namespace App\Http\Controllers;

use App\Model\MedicalRegistrationAddon;
use App\Model\MedicalRegistration;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedicalRegistrationAddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicalRegistration $registration)
    {
        return response(MedicalRegistrationAddon::where('medical_registration_id',$registration->medical_registration_id)->get(),200);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , MedicalRegistration $registration)
    {
        $obj = new MedicalRegistrationAddon;
        $obj->medical_registration_id = $registration->medical_registration_id;
        $obj->patient_instructions = $request->patient_instructions;
        $obj->patient_documents = $request->patient_documents;
        $obj->save();
        return response([
          'registration_addon_id' => $obj->registration_addon_id,
          'status' => "Created successfully"
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\MedicalRegistrationAddon  $medicalRegistrationAddon
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRegistration $registration , MedicalRegistrationAddon $addon)
    {
        return response(MedicalRegistrationAddon::findOrFail($addon->registration_addon_id),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MedicalRegistrationAddon  $medicalRegistrationAddon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalRegistration $registration , MedicalRegistrationAddon $addon)
    {
        $addon->update($request->all());
        return response([
            'registration_addon_id' => $addon->registration_addon_id,
            'status' => "Update successfull"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\MedicalRegistrationAddon  $medicalRegistrationAddon
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRegistration $registration , MedicalRegistrationAddon $addon)
    {
        $addon->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
