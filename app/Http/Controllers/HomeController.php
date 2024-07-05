<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
    public function downloadPdf($id){
        
        
        // dd("test");
        $appointment = Appointment::find($id);
        $user = User::find($appointment->patient_id);
        $pdf = Pdf::loadView("pdf",['appointment' => $appointment,'user'=>$user]);
        return $pdf->download('doanload.pdf');
    }


    public function appValidation($id){
        try{

        
        if(Auth::user()->role == 4){
            return response()->json(['error'=>'Fordiddn'],403);
        }

        $appointment = Appointment::find($id);

        $appointment->status = 'validee';

        $update  = $appointment->update();

        if($update){
            return response()->json([
                "date" => $appointment
            ], Response::HTTP_OK);
        }
        else{
            return response()->json([
                "data"=>"data not found"
            ], Response::HTTP_NOT_FOUND);
        }


        }


        catch (\Exception $e){
            // Handle any exceptions that may occur
            return response()->json([
                'message' => 'An error occurred during validation: ' . $e->getMessage()
            ], 500);
            }
        }
}
