<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        $Name = 'Sample La Ini';
    return view('home' ,['first' => $Name, 'last'=>'Delete']);
    }

    public function about()
    {
        $Name = 'No One';
    return view('about',['first'=>$Name, 'last'=>'EREF']);
    }

    public function contact()
    {
        $Name = 'Sample La Ini';
        return view('contact',['first' => $Name, 'last'=>'Delete']);
    }

    public function login()
    {
        return view('login');
    }

    public function forgot()
    {
        return view('forgot');
    }
}
