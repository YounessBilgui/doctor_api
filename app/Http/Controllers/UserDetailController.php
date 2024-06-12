<?php

namespace App\Http\Controllers;

use App\Models\User_detail;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class UserDetailController extends Controller
{
    public function index(){



    }

    public function store(Request $request){

        $user = Auth::user();

        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "address" => "required",
            "maladie" => "required",
            "date_of_birth" => "required|date",
            "CIN" => "required",
            "gender" => "required|in:m,f",
            "blood_type" => "nullable|in:O-,O+,A+,A-,B+,B-,AB+,AB-",
            "status" => "required",
            "phone" => "required", // replace table_name with your actual table name
            "appointment_date" => "required|date",
            "allergies" => "nullable",
            "CNSS Number" => "nullable"
        ]);

        $user_details = new User_detail();


        $user_details->user_id = $user->id;
        $user_details->firstname = $request->firstname;
        $user_details->lastname = $request->lastname;
        $user_details->address = $request->address;
        $user_details->maladie = $request->maladie;
        $user_details->date_of_birth = $request->date_of_birth;
        $user_details->CIN = $request->CIN;
        $user_details->gender = $request->gender;
        $user_details->blood_type = $request->blood_type;
        $user_details->status = $request->status;
        $user_details->phone = $request->phone;
        $user_details->appointment_date = $request->appointment_date;
        $user_details->allergies = $request->allergies;
        $user_details->CNSS_Number = $request->CNSS_Number;

        $save = $user_details->save();

        if($save){
            return response()->json([
                "data"=>$user_details
            ],Response::HTTP_CREATED);
        }
        else{
            return response()->json([
                "dategot"=>"date not found"
            ],Response::HTTP_BAD_REQUEST);
        }


    }
}
