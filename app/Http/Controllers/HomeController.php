<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        return view('home.index');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function __invoke(){
        return 'This is Shawon';
    }
}
