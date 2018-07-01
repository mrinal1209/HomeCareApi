<?php

namespace App\Http\Controllers;

use App\Model\MedicalDepartmentContact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedicalDepartmentContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response(MedicalDepartmentContact::all(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new MedicalDepartmentContact;
        $obj->med_dep_contact_first_name = $request->med_dep_contact_first_name;
        $obj->med_dep_contact_last_name = $request->med_dep_contact_last_name;
        $obj->med_dep_contact_phone = $request->med_dep_contact_phone;
        $obj->med_dep_contact_email = $request->med_dep_contact_email;
        $obj->med_dep_contact_password = $request->med_dep_contact_password;
        $obj->med_dep_contact_api_token = md5($request->med_dep_contact_email . $request->med_dep_contact_password . time());
        $obj->med_dep_contact_profile_picture = $request->med_dep_contact_profile_picture;
        $obj->med_dep_contact_residence = $request->med_dep_contact_residence;
        $obj->med_dep_contact_city = $request->med_dep_contact_city;
        $obj->med_dep_contact_country = $request->med_dep_contact_country;
        $obj->hospital_department_id = $request->hospital_department_id;
        $obj->save();
        return response([
          'med_dep_contact_id' => $obj->med_dep_contact_id,
          'status' => "Created successfully"
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\MedicalDepartmentContact  $medicalDepartmentContact
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalDepartmentContact $contact)
    {
        return response(MedicalDepartmentContact::findOrFail($contact->med_dep_contact_id),200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MedicalDepartmentContact  $medicalDepartmentContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalDepartmentContact $contact)
    {
        $contact->update($request->all());
        return response([
            'med_dep_contact_id' => $contact->med_dep_contact_id,
            'status' => "Update successfull"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\MedicalDepartmentContact  $medicalDepartmentContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalDepartmentContact $contact)
    {
        $contact->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
