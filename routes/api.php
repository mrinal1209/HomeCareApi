<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/v1/api/medical/department','HospitalDepartmentController');
Route::apiResource('/v1/api/medical/service','MedicalServiceController');
Route::apiResource('/v1/api/medical/service/{service}/plan','ServicePlanController');
Route::apiResource('/v1/api/medical/contact','MedicalDepartmentContactController');
Route::apiResource('/v1/api/medical/user','UserController');
Route::apiResource('/v1/api/medical/patient/registration','MedicalRegistrationController');
Route::apiResource('/v1/api/medical/patient/registration/{registration}/addon','MedicalRegistrationAddonController');
Route::apiResource('/v1/api/medical/patient/case','CaseReservationController');
Route::apiResource('/v1/api/medical/patient/case/{case}/addon','CaseReservationAddonController');
