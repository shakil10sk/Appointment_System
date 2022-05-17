<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use App\User;
use App\Appointment;
use App\PaymentSystem;
use App\Category;
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
    public function index(Request $request)
    {

        $category_list = Category::all();

        $mentor_list = Mentor::with('category','available_days')
                                ->when(isset($request->district_id),function($q) use($request){
                                    $q->where('district_id',$request->district_id);
                                })
                                ->when(isset($request->thana_id),function($q) use($request){
                                    $q->where('thana_id',$request->thana_id);
                                })
                                ->when(isset($request->category),function($q) use($request){
                                    $q->where('category_id',$request->category);
                                })
                                ->take(20)
                                ->get();


        $district = DB::table('bd_locations')
                                ->where('type',2)
                                ->wherein('parent_id',[1,2,3,4,5,6,7,8])
                                ->orderBy('id','ASC')
                                ->get();

        return view('enterprener.mentor_list',[
            'mentor_list' => $mentor_list,
            'category_list' => $category_list,
            'district' => $district,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDoctor($id)
    {
        // $mentor_info = Mentor::findOrFail($id);
        $mentor_info = DB::table('mentors AS MN')
                        ->join('categories AS CAT','CAT.id','MN.category_id')
                        ->select('MN.*','CAT.category_name as category')
                        ->where('MN.id',$id)
                        ->first();

        $avilable_day = DB::table('avilable_days')->where('mentor_id',$mentor_info->id)->get() ?? null;

        return view('enterprener.book',[
            'mentor_info' => $mentor_info,
            'avilable_days' => $avilable_day,
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
        $payment['mentor_id'] = $request->mentor_id;
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
        $appointment = Appointment::where(['user_id' => $id])->first() ?? null;
        $mentor_info = null;
        if(!is_null($appointment)){
            $mentor_info = Mentor::findOrFail($appointment->mentor_id);
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
