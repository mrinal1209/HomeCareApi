<?php

namespace App\Http\Controllers;

use App\Model\ServicePlan;
use App\Model\MedicalService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicalService $service)
    {
        return response(ServicePlan::where('medical_service_id',$service->medical_service_id)->get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , MedicalService $service)
    {
        $obj = new ServicePlan;
        $obj->service_plan_name = $request->service_plan_name;
        $obj->service_plan_price = $request->service_plan_price;
        $obj->service_plan_services = $request->service_plan_services;
        $obj->medical_service_id = $service->medical_service_id;
        $obj->save();
        return response([
          'service_plan_id' => $obj->service_plan_id,
          'status' => "Created successfully"
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ServicePlan  $servicePlan
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalService $service , ServicePlan $plan)
    {
        return response(ServicePlan::findOrFail($plan->service_plan_id),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ServicePlan  $servicePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , MedicalService $service , ServicePlan $plan)
    {
        $plan->update($request->all());
        return response([
            'service_plan_id' => $plan->service_plan_id,
            'status' => "Update successfull"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ServicePlan  $servicePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalService $service  , ServicePlan $plan)
    {
      $plan->delete();
      return response(null,Response::HTTP_NO_CONTENT);
    }
}
