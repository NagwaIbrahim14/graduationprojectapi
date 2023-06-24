<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function patientregister(REQUEST $request){
      $patient=Patient::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'phone'=>$request->phone,
        'gender'=>$request->gender,

      ]);
      if($patient){
        return response()->json([$patient,'status'=>true]);
      }
      else{
        return response()->json(['status'=>false]);
      }
    }

    public function patientlog(REQUEST $request){
        $credentials = request(['email', 'password']);

        if (! $token = auth()->guard('patient_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    //Store the token in a cookie with a name of "token" and an expiration time of 1 hour
    $cookie = cookie('token', $token, 60);

    //Return a response with the token and cookie attached
    return response()->json(['token' => $token])->cookie($cookie);

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function patientme()
    {
        return response()->json(auth()->guard('patient_api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function patientlogout()
    {
        auth()->guard('patient_api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
