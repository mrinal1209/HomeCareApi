<?php

namespace App\Http\Controllers;

use App\Model\CaseReservation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return response(CaseReservation::all(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new CaseReservation;
        $obj->medical_registration_id = $request->medical_registration_id;
        $obj->med_dep_contact_id = $request->med_dep_contact_id;
        $obj->case_reservation_status = $request->case_reservation_status;        
        $obj->save();
        return response([
          'case_reservation_id' => $obj->case_reservation_id,
          'status' => "Created successfully"
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CaseReservation  $caseReservation
     * @return \Illuminate\Http\Response
     */
    public function show(CaseReservation $case)
    {
        return response(CaseReservation::findOrFail($case->case_reservation_id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CaseReservation  $caseReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseReservation $case)
    {
        $case->update($request->all());
        return response([
            'case_reservation_id' => $case->case_reservation_id,
            'status' => "Update successfull"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CaseReservation  $caseReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseReservation $case)
    {
        $case->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
