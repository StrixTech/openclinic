<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\PatientNotes;
use App\Patients;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::paginate(10);

        return view('patients', ['patients'=>$patients]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patients::find($id);
        $appointments = Appointments::where('mrn',$patient->mrn)->get();
        $notes = PatientNotes::where('mrn',$patient->mrn)->get();
        return view('patientsEdit', ['patients'=>$patient, 'appointments'=>$appointments, 'notes'=>$notes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patients $patients)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('query');
        $output = '';
        $result = DB::table('patients')->where('mrn','like',$search.'%')->get();

        if($search == ""){
            $output = "";
        }else{
            if($result->count() > 0) {
                foreach ($result as $row) {
                    $output .= "<a href='".url('patients')."/".$row->id."'><li class=\"list-group-item search-patient-result-item\">
                                    <h6 class=\"p-t-10 mb-2\">".$row->name."</h6>
                                    <span><span class=\"icon-phone\"></span> ".$row->phone." | <span class=\"icon-people\"></span>  ".$row->mrn."</span>
                                </li></a>";
                }
            }
            else{
                $output .= "<li class=\"list-group-item\">
                                    <h6 class=\"p-t-10\">No Patient Found</h6>
                                    <span>NULL | NULL</span>
                                </li>";
            }
        }


        $result = array(
            'table'  => $output
        );

        return response()->json($result);

    }
}
