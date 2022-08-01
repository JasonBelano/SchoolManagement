<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
        $user = User::all();

        return $user;
   }

   public function show($id)
   {
        $user = User::find($id);
        return $user;
   }

   public function create(Request $request)
   {
    $user = User::create([
        'lastname'=>$request->lastname,
        'firstname'=>$request->firstname,
        'middlename'=>$request->middlename,
        'address'=>$request->address,
        'contact'=>$request->contact,
        'email'=>$request->email,
        'password'=>$request->password,
    ]);

    return $user;
   }

   public function update($id,Request $request)
   {
        $user = User::find($id);


        $user->update([
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return $user;
        
   }

   public function delete($code)
   {
        $user = User::find($code);

        $user->delete();
        return $user;

   }
}
