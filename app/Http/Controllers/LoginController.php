<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller

{
   
    public function userLogin(Request $request)
    {

      $input = $request->all();
       $validation = Validator::make(
        $input,[
            'email' => 'required|email',
            'password' => 'required' 
        ]);

        if($validation->fails())
        {
            return response()->json(['error' => $validation->errors()],422);
        }

            if(Auth::guard('student')->attempt(['email' => $input['email'], 'password' => $input['password']]))
            {
                $user = Auth::guard('student')->user();
                dd($user);
                $token = $user->createToken('Myapp',['student'])->accessToken;
                return response()->json(['token' => $token]);
            }

            else
            { 
                return response()->json(['error' => ['Email and Password are Wrong.']], 200);
            }

    }

    public function details()
    {
        dd(\Request::segments(2));
        // $user = Auth::guard('student')->user();
        // return response()->json(['data' => $user]);
    }


         




}