<?php

namespace App\Http\Controllers;

use App\Model\MedicalService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedicalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(MedicalService::all() , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\MedicalService  $medicalService
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalService $service)
    {        
        return response(MedicalService::findOrFail($service->medical_service_id), 200);
    }

     /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $obj = new MedicalService;
            $obj->medical_service_name = $request->medical_service_name;
            $obj->hospital_department_id = $request->hospital_department_id;
            $obj->save();
            return response([
              'medical_service_id' => $obj->medical_service_id,
              'status' => "Created successfully"
            ],Response::HTTP_CREATED);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MedicalService  $medicalService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalService $service)
    {
        $service->update($request->all());
        return response([
            'medical_service_id' => $service->medical_service_id,
            'status' => "Update successfull"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\MedicalService  $medicalService
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalService $service)
    {
        $service->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
