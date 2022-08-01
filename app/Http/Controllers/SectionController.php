<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function index()
    {
        $section = Section::all();
        return $section;
    }

    public function show($id)
    {
        $section = Section::find($id);
        return $section;

    }

    public function update($id,Request $request)
    {
         $section = Section::find($id);
 
 
         $section->update([
             'name'=>$request->name,
         ]);
 
         return $section;
         
    }

    public function delete($code)
    {
         $section = Section::find($code);
         $section->delete();
         return $section;
 
    }
}
