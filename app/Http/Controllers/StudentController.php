<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Foundation\Exceptions\Whoops\WhoopsExceptionRenderer;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $student = Student::with('classes')->get();
        return $student;
    }

    public function show($id)
    {
         $student = Student::find($id);
         return $student;
    }

    public function showPivot($id)
    {
        $student =  Student::with('classes')->where('id', $id)->get();

        return $student;
        // $student = Student::find($id)->get();
        // foreach($student->classes as $pivot)
        // {
        //     echo $pivot->pivot->student_id;
        // }
    }

    public function create(Request $request)
    {
        $student = Student::create([
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
    
        return $student;
    }

    public function update($id,Request $request)
    {
        $student = Student::find($id);

        $student->update([
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return $student;
    }

    public function delete($code)
    {
        $student = Student::find($code);
        $student->delete();
        return $student;
    }
}
