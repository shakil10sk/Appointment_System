<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Dashboard
    public function Dashboard(){
        return view('admin.index');
    }

    //Login
    public function Login(){
        return view('admin.login');
    }
}
