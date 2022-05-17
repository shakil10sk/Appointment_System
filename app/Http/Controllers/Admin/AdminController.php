<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Mentor;
use App\User;
use DB;
class AdminController extends Controller
{
    //Dashboard
    public function Dashboard(){
        $mentors= Mentor::orderBy('id', 'DESC')->get();
        return view('admin.index', compact('mentors'));
    }

    //Login
    public function Login(Request $request){
        //  dd($request->all());

        if(Auth::guard('admin')->attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');

    }
    public function Logout(){
        if(Auth::guard('admin')->logout());
        return view('admin.login');
    }

    public function mentorList(){
        $mentors= Mentor::orderBy('id', 'DESC')->get();
        return view('admin.mentorList', compact('mentors'));
    }

    public function acceptStatus($id){

        // $status=Mentor::select('status')->where('id',$id)->first();
        $status= DB::table('Mentors')->where('id',$id)->first()->status;
        // dd($status);

        // dd($status);
        if($status==2){
            $status=1;
        }elseif($status==0){
            $status=1;
        }
        else{
            $status =0;
        }
        Mentor::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();

    }
    public function rejectStatus($id){

        // $status=Mentor::select('status')->where('id',$id)->first();
        $status= DB::table('mentors')->where('id',$id)->first()->status;

        if($status==2){
            $status=0;
        }
        else{
            $status =0;
        }
        Mentor::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();

    }



    public function userList(){
        $users= User::orderBy('id', 'DESC')->get();
        return view('admin.userList', compact('users'));
    }

    public function enableStatus($id){


        $status= DB::table('users')->where('id',$id)->first()->status;
        // dd($status);

        // dd($status);
        if($status==0){
            $status=1;
        }
        User::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();

    }

    public function disableStatus($id){


        $status= DB::table('users')->where('id',$id)->first()->status;
        // dd($status);

        // dd($status);
        if($status==1){
            $status=0;
        }
        User::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();

    }
}
