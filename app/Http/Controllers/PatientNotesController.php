<?php

namespace App\Http\Controllers;

use App\PatientNotes;
use App\Patients;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $patient = Patients::find($request->get('id'));
        return view('patients.patientNotesCreate', ['patient'=>$patient]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @todo Change $notes->created_by to current staff id
     * @body Currently $notes->created_by has an hardcoded value. This has to be changed immediately after implementing a way to view, edit, and delete staff.
     */
    public function store(Request $request)
    {
        $patient = Patients::where('mrn',$request->post('mrn'))->first();
        $patientID = $patient->id;
        $note = new PatientNotes();
        $note->mrn = $request->post('mrn');
        $note->note = $request->post('note');
        $note->created_by = 987950;
        $dt = new \DateTime();
        $note->date = $dt->format('Y-m-d');

        $note->save();
        return redirect(url('patients/'.$patientID))->with('toast_success', 'Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * API call for ajax when getting notes in patient info.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function pnget($id){
        $notes = PatientNotes::find($id);

        return response()->json($notes);
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


    /**
     * Searches for a patient and returns a json
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
                    $output .= "<a onclick=\"
                                    document.getElementById('mrn').value = {$row->mrn}; document.getElementById('name').value = '{$row->name}'; const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'success',
                            title: 'Patient selected'
                        })\"><li class=\"list-group-item search-patient-result-item\">
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
