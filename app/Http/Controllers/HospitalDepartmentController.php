<?php

namespace App\Http\Controllers;

use App\Model\HospitalDepartment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class HospitalDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response(HospitalDepartment::all(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new HospitalDepartment;
        $obj->hospital_department_name = $request->hospital_department_name;
        $obj->save();
        return response([
          'hospital_department_id' => $obj->hospital_department_id,
          'status' => "Created successfully"
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\HospitalDepartment  $HospitalDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(HospitalDepartment $department)
    {
         return response(HospitalDepartment::findOrFail($department->hospital_department_id) , 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\HospitalDepartment  $HospitalDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,HospitalDepartment $department)
    {
        $department->update($request->all());
      return response([
          'hospital_department_id' => $department->hospital_department_id,
          'status' => "Update successfull"
      ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\HospitalDepartment  $HospitalDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(HospitalDepartment $department)
    {
      $department->delete();
      //DB::delete('delete from hospital_departments where hospital_department_id = ?',[$id]);
      return response(null,Response::HTTP_NO_CONTENT);
    }
}
