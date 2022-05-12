<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menotr;
use App\User;
use App\Appointment;
use App\PaymentSystem;
use Carbon\Carbon;
use Auth;
use DB;
class EnterprenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_list = DB::table('menotrs')->select('category')->groupBy('category')->get();
        $mentor_list = Menotr::orderBy('id','DESC')->take(50)->get();

        return view('enterprener.mentor_list',[
            'mentor_list' => $mentor_list,
            'category_list' => $category_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDoctor($id)
    {
        $mentor_info = Menotr::findOrFail($id);

        return view('enterprener.book',[
            'mentor_info' => $mentor_info,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $request->validate([
            'payment_system' => 'required',
            'acc_no' => 'required',
            'details' => 'required',
        ]);

        $payment = new PaymentSystem();

        $payment['user_id'] = Auth::user()->id;
        $payment['type'] = $request->payment_system;
        $payment['account_no'] = $request->acc_no;
        $payment['detals'] = $request->details;
        $payment['status'] = 0;
        $payment['created_at'] = Carbon::now();

        if($payment->save()){

            $appointment = Appointment::where('user_id',Auth::user()->id)->update(['is_paid'=>1]);

            if($appointment){
                // return response()->json([
                //     'status' => 'success',
                //     'msg' => 'Payment Success',
                // ]);
                return redirect()->back()->with('message','Payment Success');
            }else{
                // return response()->json([
                //     'status' => 'error',
                //     'msg' => 'Payment Status Not updated',
                // ]);
                return redirect()->back()->with('message','Payment Status not updated ');
            }

        }else{
            return redirect()->back()->with('message','Payment Not Success');

            // return response()->json([
            //     'status' => 'error',
            //     'msg' => 'Payment Not Success',
            // ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Profile($id)
    {
        $profile_info = User::findOrFail($id);
        $appointment = Appointment::where(['user_id' => $id,'is_approved'=> 1,'is_paid'=> 0])->first() ?? null;
        $mentor_info = null;
        if(!is_null($appointment)){
            $mentor_info = Menotr::findOrFail($appointment->mentor_id);
        }
        return view('enterprener.profile',[
            'profile_info' => $profile_info,
            'appointment' => $appointment,
            'mentor_info' => $mentor_info,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
