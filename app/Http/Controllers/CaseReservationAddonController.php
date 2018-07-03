<?php

namespace App\Http\Controllers;

use App\Model\CaseReservationAddon;
use App\Model\CaseReservation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseReservationAddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CaseReservation $case)
    {
        return response(CaseReservationAddon::where('case_reservation_id',$case->case_reservation_id)->get(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , CaseReservation $case)
    {
      $obj = new CaseReservationAddon;
      $obj->case_reservation_id = $case->case_reservation_id;
      $obj->case_instructions = $request->case_instructions;
      $obj->case_documents = $request->case_documents;
      $obj->save();
      return response([
        'reservation_addon_id' => $obj->reservation_addon_id,
        'status' => "Created successfully"
      ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CaseReservationAddon  $caseReservationAddon
     * @return \Illuminate\Http\Response
     */
    public function show(CaseReservation $case , CaseReservationAddon $addon)
    {
        return response(CaseReservationAddon::findOrFail($addon->reservation_addon_id),200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CaseReservationAddon  $caseReservationAddon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaseReservation $case , CaseReservationAddon $addon)
    {
      $addon->update($request->all());
      return response([
          'reservation_addon_id' => $addon->reservation_addon_id,
          'status' => "Update successfull"
      ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CaseReservationAddon  $caseReservationAddon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaseReservation $case , CaseReservationAddon $addon)
    {
      $addon->delete();
      return response(null,Response::HTTP_NO_CONTENT);
    }
}
