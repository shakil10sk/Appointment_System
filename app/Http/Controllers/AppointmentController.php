<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Auth;
use Carbon\Carbon;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'methode' => 'required',
            'appointment_date' => 'required',
        ]);

        $appointment = new Appointment();

        $appointment['user_id'] = Auth::user()->id ?? null;
        $appointment['mentor_id'] = $request->mentor_id;
        $appointment['reson'] = $request->reason;
        $appointment['method'] = $request->methode;
        $appointment['medium'] = $request->medium;
        $appointment['details'] = $request->details;
        $appointment['date'] = $request->appointment_date;
        $appointment['is_paid'] = 0;
        $appointment['is_approved'] = 0;
        $appointment['created_at'] = Carbon::now();

        if($request->hasFile('document')) {
            $destinationPath = public_path( 'assets/document/appointment' );
            $file = $request->document;
            $fileName = time() . '.'.$file->clientExtension();
            $file->move($destinationPath, $fileName );

            $appointment['document'] = $fileName;
        }

        if($appointment->save()){
            return redirect()->back()->with('message','Appointment Request Success');
        }else{
            return redirect()->back()->with('message','Appointment Didnt Send');
        }
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
