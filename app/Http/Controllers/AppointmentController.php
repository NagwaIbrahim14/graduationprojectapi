<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(){
        // $posts=Post::get();

        $appointments=AppointmentResource::collection(Appointment::get());
        //way 1
        // $array=[
        //     'data'=>$posts,
        //     'message'=>"ok",
        //     'status'=>200
        // ];
        // return response($array);

        //way 2
        // $msg=["ok"];
        // return response($posts,$status=200,$msg);

        //way 3
        return $this->ApiResponse($appointments,"all done",200);

    }

    public function show($id){

        // $post=Post::find($id);

        $appointments=Appointment::find($id);

        if($appointments){
           return $this->ApiResponse(new AppointmentResource($appointments),"all done",200);
        }
        return $this->ApiResponse(null,"appointment not found",404);

    }

    public function store(REQUEST $request){
        //validation
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
            'phone'=>'required',
            // 'date'=>'required',
            'gender'=>'required'
        ]);
        if($validator->fails()){
            return $this->ApiResponse(null,$validator->errors(),400);
        }


        $appointments=Appointment::create($request->all());
        if($appointments){
            return $this->ApiResponse(new AppointmentResource($appointments),"appointments created successfully",201);
         }
         return $this->ApiResponse(null,"appointments not saved",400);


    }

    public function update(REQUEST $request,$id){
           //validation
           $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
           'phone'=>'required',
        //    'date'=>'required',
        //    'doctor_id'=>'required',
        //    'hospital_id'=>'required',
        //    'patient_id'=>'required',
           'gender'=>'required'
         ]);
         if($validator->fails()){
             return $this->ApiResponse(null,$validator->errors(),400);
         }
         $appointment=Appointment::find($id);
         if(!$appointment){
            return $this->ApiResponse(null,"appointment not found",400);
        }

        $appointment->update($request->all());
         if($appointment){
            return $this->ApiResponse(new AppointmentResource($appointment),"appointment updated successfully",201);

         }
    }

    public function destroy($id){
        $appointment=Appointment::find($id);
        if(!$appointment){
            return $this->ApiResponse(null, "appointment not found",404);
        }
        $appointment->delete($id);

        if($appointment){
            return $this->ApiResponse(new AppointmentResource($appointment),"appointment deleted successfully",200);
        }
    }
}
