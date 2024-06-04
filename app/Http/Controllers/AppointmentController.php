<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $appointments = Appointment::all();
        if ($appointments->isNotEmpty()) {
            return response()->json([
                "data" => $appointments
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "message" => "No appointments found"
            ], Response::HTTP_NOT_FOUND);
        }
        
        // if(!isEmpty($appointments)){
        //     return response()->json([
        //         "data" => $appointments
        //     ],Response::HTTP_OK);
        // }
        // else{
        //     return response()->json([
        //         "message" => "No appointments found"
        //     ],Response::HTTP_NOT_FOUND);
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        // dd($user->id);
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

        $Appointment = new Appointment();


        $Appointment->patient_id = $user->id;
        $Appointment->firstname = $request->firstname;
        $Appointment->lastname = $request->lastname;
        $Appointment->address = $request->address;
        $Appointment->maladie = $request->maladie;
        $Appointment->date_of_birth = $request->date_of_birth;
        $Appointment->CIN = $request->CIN;
        $Appointment->gender = $request->gender;
        $Appointment->blood_type = $request->blood_type;
        $Appointment->status = $request->status;
        $Appointment->phone = $request->phone;
        $Appointment->appointment_date = $request->appointment_date;
        $Appointment->allergies = $request->allergies;
        $Appointment->CNSS_Number = $request->CNSS_Number;

        $save = $Appointment->save();

        if($save){
            return response()->json([
                "data"=>$Appointment
            ],Response::HTTP_CREATED);
        }
        else{
            return response()->json([
                "date"=>"date not found"
            ],Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
