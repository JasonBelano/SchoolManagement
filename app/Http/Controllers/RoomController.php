<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function index()
    {
        $room = Room::all();
        return $room;
    }

    public function show($id)
    {
        $room = Room::find($id);
        return $room;

    }

    public function update($id,Request $request)
    {
         $room = Room::find($id);
 
 
         $room->update([
             'name'=>$request->name,
         ]);
 
         return $room;
         
    }

    public function delete($code)
    {
         $room = Room::find($code);
         $room->delete();
         return $room;
 
    }
}
