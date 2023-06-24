<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\MedicalRecordResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;


class MedicalRecordController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(){
        // $posts=Post::get();



        $MedicalRecords=MedicalRecordResource::collection(MedicalRecord::get());
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
        return $this->ApiResponse($MedicalRecords,"all done",200);

    }

    public function show($id){

        // $post=Post::find($id);

        $MedicalRecord=MedicalRecord::find($id);

        if($MedicalRecord){
           return $this->ApiResponse(new MedicalRecordResource($MedicalRecord),"all done",200);
        }
        return $this->ApiResponse(null,"MedicalRecord not found",404);

    }

    //id name  percentageofmodel  percentageofdoctor  Hospital_id  patient_id


    public function store(REQUEST $request){
        //validation
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
            'percentageofmodel'=>'required',
            'percentageofdoctor'=>'required',
            'Hospital_id'=>'required',
            'patient_id'=>'required',
        ]);
        if($validator->fails()){
            return $this->ApiResponse(null,$validator->errors(),400);
        }


        $MedicalRecords=MedicalRecord::create($request->all());
        if($MedicalRecords){
            return $this->ApiResponse(new MedicalRecordResource($MedicalRecords),"MedicalRecord created successfully",201);
        }
         return $this->ApiResponse(null,"MedicalRecord not saved",400);

    }

    public function update(REQUEST $request,$id){
           //validation
           $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
            'percentageofmodel'=>'required',
            'percentageofdoctor'=>'required',
            // 'Hospital_id'=>'required',
            // 'patient_id'=>'required',
         ]);
         if($validator->fails()){
             return $this->ApiResponse(null,$validator->errors(),400);
         }
         $MedicalRecord=MedicalRecord::find($id);
         if(!$MedicalRecord){
            return $this->ApiResponse(null,"MedicalRecord not found",400);
        }

        $MedicalRecord->update($request->all());
         if($MedicalRecord){
            return $this->ApiResponse(new MedicalRecordResource($MedicalRecord),"MedicalRecord updated successfully",201);

         }
    }

    public function destroy($id){
        $MedicalRecord=MedicalRecord::find($id);
        if(!$MedicalRecord){
            return $this->ApiResponse(null, "MedicalRecord not found",404);
        }
        $MedicalRecord->delete($id);

        if($MedicalRecord){
            return $this->ApiResponse(new MedicalRecordResource($MedicalRecord),"MedicalRecord deleted successfully",200);
        }
    }
}
