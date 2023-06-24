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
    //Store the token in a cookie with a name of "token" and an expiration time of 1 hour
    $cookie = cookie('token', $token, 60);
    $x= response()->json(auth()->guard('doctor_api')->user());

    //Return a response with the token and cookie attached
    return response()->json(['token' => $token,'info'=>$x])->cookie($cookie);


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
    // public function doctorlogout()
    // {
    //     auth()->guard('doctor_api')->logout();

    //     return response()->json(['message' => 'Successfully logged out']);
    // }
    public function patientlogout()
    {
        auth()->guard('doctor_api')->logout();

        // Remove the 'token' cookie by creating a new cookie with an empty value and an expiration time in the past
        $cookie = cookie('token', '', -1);

        // Return a JSON response indicating that the logout was successful, with the 'token' cookie included to remove it from the client's browser
        return response()->json(['message' => 'Successfully logged out'])->withCookie($cookie);
    }
}