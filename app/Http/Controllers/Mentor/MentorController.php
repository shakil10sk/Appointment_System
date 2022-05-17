<?php

namespace App\Http\Controllers\Mentor;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\bd_location;
use App\category;
use DB;
use Carbon\Carbon;
use App\avilableDay;
use App\PaymentSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class MentorController extends Controller
{
    //Dashboard
    public function Dashboard(){
        $mentor_id = Auth::guard('mentor')->user()->id;
        $pendding = Appointment::where('mentor_id',$mentor_id)->where('is_approved',0)->count();
        $accept = Appointment::where('mentor_id',$mentor_id)->where('is_approved',1)->count();
        $reject = Appointment::where('mentor_id',$mentor_id)->where('is_approved',2)->count();
        $complete = Appointment::where('mentor_id',$mentor_id)->where('is_approved',3)->count();
        return view('mentor.index',compact('pendding','accept','reject','complete'));
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

        $district_location = DB::table('bd_locations')
                                ->where('type',2)
                                ->wherein('parent_id',[1,2,3,4,5,6,7,8])
                                ->orderBy('id','ASC')
                                ->get();

        $category = Category::orderBy('id','ASC')->get();
        // $upazila_location = bd_location::where(['type'=> 2,'parent_id' => null])->orderBy('id','ASC')->get();
        // dd($category);
        return view('mentor.registration',compact('district_location','category'));
    }

    //RegistrationStore
    public function RegistrationStore(Request $request){

        $specialist = $request->specialist[0];

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

        DB::beginTransaction();
        try {
            $mentor = new Mentor;
            $mentor->full_name = $request['full_name'];
            $mentor->phone = $request['phone'];
            $mentor->email = $request['email'];
            $mentor->address = $request['address'];
            $mentor->district_id = $request['district_id'];
            $mentor->thana_id = $request['thana_id'];
            $mentor->category_id = $request['category_id'];
            $mentor->specialist = $specialist;
            $mentor->time_limit = $request['time_limit'];
            $mentor->fee = $request['fee'];
            $mentor->time_limit = $request['time_limit'];
            $mentor->documents = $filename;
            $mentor->image = $filename2;
            $mentor->password = Hash::make($request['password']);
            $mentor->save();
            $last_id = $mentor->id;

            $avilable = [];
            if(!is_null($request->avilable_day)){
                for ($i=0; $i < count($request->avilable_day); $i++) {
                    avilableDay::create([
                        'mentor_id' => $last_id,
                        'date' => Carbon::today(),
                        'day' => $request->avilable_day[$i],
                        'from_time' => $request->start_time[$i],
                        'to_time' => $request->end_time[$i],
                        'created_at' => Carbon::now(),
                    ]);
                }
            }

            DB::commit();
            return redirect('/mentor')->with('success','Registration success');

        } catch (\Throwable $th) {
            DB::rollback();
            //throw $th;
            dd($th);
            return redirect()->back()->with('error','Data Inserted Failed. Please try again !!! ' . $th);
        }

    }

    //AppointLists
    public function AppointLists(){
        $mentor_id = Auth::guard('mentor')->user()->id;
        $appoints = Appointment::with('user')->latest()->where('mentor_id',$mentor_id)->get();
        // return $appoints;
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
        $mentor_id = Auth::guard('mentor')->user()->id;

        $payments = PaymentSystem::with('user')->where('mentor_id',$mentor_id)->get();
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

    //PasswordChange
    public function PasswordChange(){
        return view('mentor.password_change');
    }

    //PasswordStore
    public function PasswordStore(Request $request){
        $mentor_id = Auth::guard('mentor')->user()->id;
        $mentor = Auth::guard('mentor')->user()->findOrFail($mentor_id);

        $check = Hash::check($request['old_password'],$mentor['password']);
        if($check){
            $mentor->password = Hash::make($request['new_password']);
            $mentor->save();
            return redirect('/mentor/dashboard');
        }else{
            return redirect()->back();
        }

    }

    public function getThana(Request $request){

        $getThana = bd_location::where(['parent_id'=> $request->id,'type'=>3])->get();
       if($getThana){
        return response()->json([
            'status' => 'success',
            'msg' => 'successfully data found',
            'data' => $getThana,
        ]);
       }else{
        return response()->json([
            'status' => 'error',
            'msg' => 'data not found',
            'data' => "",
        ]);
       }

    }


}
