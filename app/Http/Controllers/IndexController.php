<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menotr;

class IndexController extends Controller
{

    public function home(){

        return view('layouts.enterprener.home');
    }

}
