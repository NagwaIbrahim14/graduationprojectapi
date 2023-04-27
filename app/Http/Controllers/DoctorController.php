<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function doctorregister(REQUEST $request){
      $doctor=Doctor::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'phone'=>$request->phone,
        'gender'=>$request->gender,
        'description'=>$request->description

      ]);
      if($doctor){
        return response()->json([$doctor,'status'=>true]);
      }
      else{
        return response()->json(['status'=>false]);
      }
    }

    public function doctorlog(REQUEST $request){
        $credentials = request(['email', 'password']);

        if (! $token = auth()->guard('doctor_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $token;

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function doctorme()
    {
        return response()->json(auth()->guard('doctor_api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function doctorlogout()
    {
        auth()->guard('doctor_api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
