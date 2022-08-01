<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function index()
    {
        $subject = Subject::all();
        return $subject;
    }

    public function show($id)
    {
        $subject = Subject::find($id);
        return $subject;

    }

    public function update($id,Request $request)
    {
         $subject = Subject::find($id);
 
 
         $subject->update([
             'name'=>$request->name,
         ]);
 
         return $subject;
         
    }

    public function delete($code)
    {
         $subject = Subject::find($code);
         $subject->delete();
         return $subject;
 
    }
 
}
