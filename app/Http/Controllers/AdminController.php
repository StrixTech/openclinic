<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffCount = Staff::count();
        app('debugbar')->info($staffCount);

        return view('admin.adminHome', ['staff'=>$staffCount]);
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

    /**
     * Displays a listing of roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        $role = Role::all();

        return view('admin.adminRoleShow', ['roles'=>$role]);
    }

    /**
     * Displays a listing of roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleGet($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();

        return view('admin.adminRoleEdit', ['role'=>$role, 'permissions'=>$permissions]);
    }

    public function roleCreate(Request $request)
    {
        $name = $request->post('name');

        Role::create(['name' => $name]);
        $html = view('admin.adminRoleShowTable', ['roles'=>Role::all()])->render();

        return response()->json(['success'=>true, 'name'=>$name, 'html'=>$html]);
    }

    public function roleDelete($id)
    {
        $role = Role::findById($id);
        $role->delete();

        return \redirect()->back()->with('toast_success', 'Role deleted.');
    }

    /**
     * Edit a role.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function roleEdit(Request $request, $id)
    {
        $role = Role::findById($id);

        if ($role->name === 'admin') {
            $role->syncPermissions(Permission::all());

            return redirect()->back();
        }

        for ($x = 1; $x <= Permission::all()->count(); $x++) {
            $perm = Permission::findById($x);

            if ($request->get($x) === 'on') {
                $role->givePermissionTo($perm->name);
            } else {
                $role->revokePermissionTo($perm->name);
            }
        }

        return redirect()->back();

        //var_dump($request->all());
    }

    public function settings() {
        $settings = settings()->all($fresh = true);

        //print_r($settings['darkMode']);
        return view('admin.adminSettings', ['settings'=>$settings]);
    }

    public function settingSave(Request $request){
        print_r($request->all());

        $post = $request->post();
        while($setting = current($post)){
            if(key($post) != '_token') {
                print(key($post) ."/".$setting."</br>");
                settings()->set(key($post), $setting);
            }
            next($post);
        }

        return \redirect()->route('admin.settings');
    }
}
