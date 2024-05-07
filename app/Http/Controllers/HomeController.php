<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class HomeController extends Controller
{
    public function home()
    {
        return view('welcome');

    }

    public function singup(){
        return view('singup');
    }



}
