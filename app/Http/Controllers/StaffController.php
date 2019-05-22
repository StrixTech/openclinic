<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::paginate(15);

        return view('admin.adminStaffShow',['staffs'=>$staff]);
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function show(Request $request, $id)
    {
        $staff = Staff::find($id);

        if($request->ajax()) {
            return response()->json(['html' => view('admin.adminStaffInfoAjax', ['staff' => $staff])->render()]);
        }else{
            return view('admin.adminStaffInfo', ['staff' => $staff]);
        }
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

    /**
     * Searches for a staff and returns a json
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function search(Request $request)
    {
        $search = $request->get('query');
        $output = '';

        $result = Staff::staffID($search)->orWhere->name($search)->get();

        if($search == ""){
            $output = "";
        }else{
            if($result->count() > 0) {
                foreach ($result as $row) {
                    $output .= view('admin.components.adminStaffSearchResult',['isNull'=>false, 'row'=>$row])->render();
                }
            }
            else{
                $output .= view('admin.components.adminStaffSearchResult',['isNull'=>true])->render();
            }
        }

        $result = array(
            'table'  => $output
        );

        return response()->json($result);
    }
}
