<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //
    public function index()
    {
        $class = Classes::with('course','students','user','subject','section','room')->get();
        return $class;
    }

    public function show($id)
    {
        $class = Classes::find($id)->with('students','course','user','subject','section','room')->get();
        return $class;
    }

    public function create($id, Request $request)
    {
        $student = Student::find($id);
        $class =$student->classes()->create([
            'time' => $request->time,
            'course_id' => $request->course_id,
            'user_id'=> $request->user_id,
            'subject_id'=> $request->subject_id,
            'section_id'=> $request->section_id,
            'room_id'=> $request->room_id
        ]);
         return response()->json(['classes'=>$class],200);
    }

    public function update($id, Request $request)
    {
        $classes = Classes::find($id);
        $class = $classes->update([
            'time' => $request->time,   
            'course_id' => $request->course_id,
            'user_id'=> $request->user_id,
            'subject_id'=> $request->subject_id,
            'section_id'=> $request->section_id,
            'room_id'=> $request->room_id
        ]);
         return response()->json(['classes'=>$class],200);
    }

    public function updateStudent($id, Request $request)
    {
        $classes = Classes::find($id);
        $classes->students()->update([
                'student_id' => $request->students[0],
            ]);
            return response()->json(['classes'=>$classes],200);
    }

    public function delete($code)
    {
        $course = Classes::find($code);
        $course->delete();
        return $course;
    }
}
