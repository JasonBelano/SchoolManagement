<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        $course = Course::all();
        return $course;
    }

    public function show($id)
    {
         $course = Course::find($id);
         return $course;
    }

    public function create(Request $request)
    {
     $course = Course::create([
         'name'=>$request->name,
     ]);
 
     return $course;
    }

    public function update($id,Request $request)
    {
         $course = Course::find($id);
 
 
         $course->update([
             'name'=>$request->name,
         ]);
 
         return $course;
         
    }

    public function delete($code)
    {
         $course = Course::find($code);
 
         $course->delete();
         return $course;
 
    }
 

}