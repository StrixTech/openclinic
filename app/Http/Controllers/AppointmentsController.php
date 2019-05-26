<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAppointments = DB::table('appointments')->select('id', 'mrn as title', 'date as start')->get();

        $appointments = $allAppointments->toJson(JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        return view('appointment', ['appointments' => $appointments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        app('debugbar')->info($request->all());

        $date = DateTime::createFromFormat('d/m/Y H:i', $request->input('date'));
        $date->format('D M d Y H:i:s \G\M\TO (T)');

        DB::table('appointments')->insertGetId(
            ['mrn'=>$request->input('mrn'), 'department_id'=>1, 'room'=>1, 'date'=>$date]
        );

        return redirect('/appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = DB::table('appointments')->where('id', $id)->get()->first();
        $patient = DB::table('patients')->where('mrn', $appointment->mrn)->get()->first();

        return view('components.appointmentInfo', ['appointment' => $appointment, 'patient' => $patient]);
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
