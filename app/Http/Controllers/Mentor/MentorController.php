<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    //Dashboard
    public function Dashboard(){
        return view('mentor.index');
    }

    //Login
    public function Login(){

        return view('mentor.login');
    }
}
