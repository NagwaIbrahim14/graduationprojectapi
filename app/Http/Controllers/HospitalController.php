<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\HospitalResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Hospital;


class HospitalController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(){
        // $posts=Post::get();

        $hospitals=HospitalResource::collection(Hospital::get());
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
        return $this->ApiResponse($hospitals,"all done",200);

    }

    public function show($id){

        // $post=Post::find($id);

        $hospital=Hospital::find($id);

        if($hospital){
            return $this->ApiResponse(new HospitalResource($hospital),"all done",200);
        }
        return $this->ApiResponse(null,"hospital not found",404);

    }

    public function store(REQUEST $request){
        //validation
        $validator=Validator::make($request->all(),[
           'name'=>'required|max:255',
           'email'=>'required|unique:hospitals',
           'contactno'=>'required'
        ]);
        if($validator->fails()){
            return $this->ApiResponse(null,$validator->errors(),400);

        }


        $hospitals=Hospital::create($request->all());
        if($hospitals){
            return $this->ApiResponse(new HospitalResource($hospitals),"hospital created successfully",201);
         }
         return $this->ApiResponse(null,"hospital not saved",400);


    }

    // public function update(REQUEST $request,$id){
    //        //validation
    //        $validator=Validator::make($request->all(),[
    //         'name'=>'required|max:255',
    //        'email'=>'required',
    //        'contactno'=>'required'
    //      ]);
    //      if($validator->fails()){
    //          return $this->ApiResponse(null,$validator->errors(),400);
    //      }
    //      $hospital=Hospital::find($id);
    //      if(!$hospital){
    //         return $this->ApiResponse(null,"hospital not found",400);
    //     }

    //     $hospital->update($request->all());
    //      if($hospital){
    //         return $this->ApiResponse(new HospitalResource($hospital),"hospital updated successfully",201);

    //      }
    // }

    public function destroy($id){
        $hospital=Hospital::find($id);
        if(!$hospital){
            return $this->ApiResponse(null, "hospital not found",404);
        }
        $hospital->delete($id);

        if($hospital){
            return $this->ApiResponse(new HospitalResource($hospital),"hospital deleted successfully",200);
        }
    }
}