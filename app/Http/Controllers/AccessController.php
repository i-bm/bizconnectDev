<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Alert;
use Illuminate\Support\Facades\Validator;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('created_at','desc')->get();
        $permissions = Permission::orderBy('created_at','desc')->get();
        $roleperm = Role::with('permissions')->get();
        return view('backend.access.index', compact('permissions', 'roles', 'roleperm'));
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

    // Alert::toast('Print Receipt', 'success');
    // Alert::success('Success', 'Product Sales Completed');
    public function addrole(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:100|unique:roles',
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again', 'error');
            return redirect()->back();
        } else {
            if(Role::create(['name' => $request->name])){

                Alert::toast('Role added', 'success');
                return redirect()->route('access.index');
            }
        }

    }

    public function addpermission(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:100|unique:permissions',
        ]);
        
        if ($validator->fails()) {
            Alert::toast('Opps... Unable to save. try again', 'error');
            return redirect()->back();
        } else {
            if(Permission::create(['name' => $request->name])){
                Alert::toast('Permission added', 'success');
                return redirect()->route('access.index');
            }
        }

    }


    public function rolepermission(Request $request, $id){
        $perm = $request->permissions;
        $role = Role::findById($id);

        // foreach($perm as $p){
        //     $role->givePermissionTo($p);
        // }
        $role->syncPermissions($perm);

        Alert::toast('Permissions have been assigned to the role', 'success');
        return redirect()->route('access.index');
      
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
}