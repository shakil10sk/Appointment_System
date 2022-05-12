<?php

namespace App\Http\Controllers\Mentor;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\PaymentSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class MentorController extends Controller
{
    //Dashboard
    public function Dashboard(){
        return view('mentor.index');
    }

    //Login
    public function Login(Request $request){

        if(Auth::guard('mentor')->attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect('mentor/dashboard');
        }else{
            return view('mentor.login');
        }
        return view('mentor.login');
    }

    //Registration
    public function Registration(){
        return view('mentor.registration');
    }

    //RegistrationStore
    public function RegistrationStore(Request $request){

        // return $request->all();

        $spacialist = json_encode($request['spacialist']);
        $available_day = json_encode($request['available_day']);


        //document insert
        if($request->file('document')){
            $file= $request->file('document');

            $filename= rand(111,999).$file->getClientOriginalName();

            $file-> move(public_path('images/mentor/documents'), $filename);

        }


        //image insert
        if($request->file('image')){
            $file= $request->file('image');

            $filename2= rand(111,999).$file->getClientOriginalName();

            $file-> move(public_path('images/mentor/photos'), $filename2);

        }

        $mentor = new Mentor;
        $mentor->name = $request['name'];
        $mentor->phone = $request['phone'];
        $mentor->email = $request['email'];
        $mentor->address = $request['address'];
        $mentor->category = $request['category'];
        $mentor->spacialist = $spacialist;
        $mentor->expirenced = $request['expirenced'];
        $mentor->documents = $filename;
        $mentor->image = $filename2;
        $mentor->available_day = $available_day;
        $mentor->password = Hash::make($request['password']);
        $mentor->save();
        return redirect('/mentor');
    }

    //AppointLists
    public function AppointLists(){
        $mentor_id = Auth::guard('mentor')->user()->id;
        $appoints = Appointment::with('user')->latest()->where('mentor_id',$mentor_id)->get();
        return view('mentor.appointment_lists',compact('appoints'));
    }

    //Logout
    public function Logout(){
        Auth::guard('mentor')->logout();
        return redirect('/mentor');
    }

    //AppointInfo
    public function AppointInfo($id){
        $appoint = Appointment::where('id',$id)->first();
        return $appoint;
    }

    //AppointmentPending
    public function AppointmentPending($id){
        $appoint = Appointment::where('id',$id)->first();
        $appoint->is_approved = 1;
        $appoint->save();
        return redirect()->back();

    }

    //AppointmentReject
    public function AppointmentReject($id){
        $appoint = Appointment::where('id',$id)->first();
        $appoint->is_approved = 2;
        $appoint->save();
        return redirect()->back();
    }

    //AppointmentAccepted
    public function AppointmentAccepted($id){
        $appoint = Appointment::where('id',$id)->first();
        $appoint->is_approved = 3;
        $appoint->save();
        return redirect()->back();
    }

    //CommunicationId
    public function CommunicationId($id){
        return $id;
    }

    //CommunicationStore
    public function CommunicationStore(Request $request){
        $appoint = Appointment::where('id',$request['hiddenid'])->first();
        $appoint->details = $request['details'];
        $appoint->save();
        return redirect()->back();
    }

    //PaymentsInfo
    public function PaymentsInfo(){
        $payments = PaymentSystem::with('user')->get();
        return view('mentor.payment_info',compact('payments'));
    }

    //PaymentAccept
    public function PaymentAccept($id){
        $payments = PaymentSystem::where('id',$id)->first();
        $payments->status = 1;
        $payments->save();
        return redirect()->back();
    }

    //PaymentReject
    public function PaymentReject($id){
        $payments = PaymentSystem::where('id',$id)->first();
        $payments->status = 2;
        $payments->save();
        return redirect()->back();
    }


}
