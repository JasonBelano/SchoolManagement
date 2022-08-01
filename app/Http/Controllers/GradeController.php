<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    public function index()
    {
        $grade = Grade::with('student','subject')->get();
        return $grade;
    }

    public function show($id)
    {
         $grade = Grade::find($id);
         return $grade;
    }

    public function create(Request $request)
    {
       
        $grade = Grade::create([
            'student_id'=>$request->student_id,
            'subject_id'=>$request->subject_id,
            'semester1'=>$request->semester1,
            'semester2'=>$request->semester2,
            'final_remark'=>$request->final_remark,
          
        ]);
    
        return $grade;
    }

    public function update($id,Request $request)
    {
        $grade = Grade::find($id);

        $grade->update([
            'student_id'=>$request->student_id,
            'subject_id'=>$request->subject_id,
            'semester1'=>$request->semester1,
            'semester2'=>$request->semester2,
            'final_remark'=>$request->final_remark,
        ]);

        return $grade;
    }

    public function delete($code)
    {
        $grade = Grade::find($code);
        $grade->delete();
        return $grade;
    }
}
