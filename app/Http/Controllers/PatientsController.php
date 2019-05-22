<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\PatientNotes;
use App\Patients;
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

        return view('patients.patients', ['patients'=>$patients]);
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

        return view('patients.patientsShow', ['patients'=>$patient, 'appointments'=>$appointments, 'notes'=>$notes]);
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

        $result = Patients::MRN($search)->orWhere->name($search)->get();

        if($search == ""){
            $output = "";
        }else{
            if($result->count() > 0) {
                foreach ($result as $row) {
                    $output .= view('patients.components.patientSearchResult',['isNull'=>false,'row'=>$row]);
                }
            }
            else{
                $output .= view('patients.components.patientSearchResult',['isNull'=>true]);
            }
        }

        $result = array(
            'table'  => $output
        );

        return response()->json($result);
    }
}
