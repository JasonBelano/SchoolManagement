<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index($id,Request $request)
    {
        // $role = Role::where('name', $request->name)->get();
        // $permission = Permission::find($id);
        // $role->permissions()->attach($permission);
        // return $role;
    }

    public function create($id,Request $request)
    {   
        $role = Role::create([
            'name'=>$request->name
        ]);
        $permission = Permission::find($id);
        $role->permissions()->attach($permission);
        return $role;
    }
}
