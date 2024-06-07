<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function CreateAccount(Request $request){

        if ($request->user()->role == 2 || $request->user()->role == 3 || $request->user()->role == 4) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        
        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role'=>'required'

        ]);
        try{
            $user = User::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role')
            ]);
            if ($user){

                return response()->json([
                    'message' => 'User registered successfuly',
                    'user' => $user
                ],201);

            }
            else{
                return response()->json([
                    'message' => 'User registration failed, Please try again.'
                ],400);
            }
        }
        catch (\Exception $e){
            // Handle any exceptions that may occur
            return response()->json([
                'message' => 'An error occurred during registration: ' . $e->getMessage()
            ], 500);
        }
    }

    public function EditAccount(Request $request, $id){

        if ($request->user()->role == 2 || $request->user()->role == 3 || $request->user()->role == 4) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $request->validate([
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role'=>'required'
        ]);

        $user = User::find($id);

        // $update = $user->update($request->all());
        $update = $user->update(['role' => $request->role]);

        if($update){
            return response()->json([
                "data"=>$user
            ],Response::HTTP_OK);
        }
        else{
            return response()->json([
                "date"=>"date not found"
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    public function DeleteAccount($id){
        if(Auth::user()->role == 2 || Auth::user()->role == 3  || Auth::user()->role == 3){
            return response()->json(['error' => 'Forbidden'], 403);
        }


        $user = User::find($id);

        if (!$user){
            return response()->json([
                'error' => "user not found"
            ], Response::HTTP_NOT_FOUND);
        }

        $delete = $user->delete();

        if($delete){
            return response()->json(['message' => 'user deleted successfuly'], Response::HTTP_OK);
        }
        else{
            return response()->json(['message' => 'bad Request'],Response::HTTP_BAD_REQUEST);
        }
    }
}
