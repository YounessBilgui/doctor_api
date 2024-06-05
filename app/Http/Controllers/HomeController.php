<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
}
