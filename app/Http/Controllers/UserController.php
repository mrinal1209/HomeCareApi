<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(User::all(),200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $obj = new User;
      $obj->user_first_name = $request->user_first_name;
      $obj->user_last_name = $request->user_last_name;
      $obj->user_email = $request->user_email;
      $obj->user_password = $request->user_password;
      $obj->user_api_token = md5($request->user_email . $request->user_password . time());
      $obj->user_phone_number = $request->user_phone_number;
      $obj->user_profile_picture = $request->user_profile_picture;
      $obj->user_residence = $request->user_residence;
      $obj->user_city = $request->user_city;
      $obj->user_country = $request->user_country;
      $obj->save();
      return response([
        'user_id' => $obj->user_id,
        'status' => "Created successfully"
      ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response(User::findOrFail($user->user_id),200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $user->update($request->all());
      return response([
          'user_id' => $user->user_id,
          'status' => "Update successfull"
      ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
