<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the Permissions.
     */
    public function index()
    {
        $permissions=Permission::get();
        return view('role-permission.permission.index',compact('permissions'));
    }
    /**
     * Show the form for creating a new Permission.
     */
    public function create()
    {
        return view('role-permission.permission.create');
    }
    /**
     * Store a newly created Permission in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|unique:permissions,name'
        ]);
        Permission::create(['name' => $request->name]);
        return redirect()->route('permission.index')
                         ->withCreate('Permission Created Successfully');
    }
    /**
     * Display the specified Permission.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified Permission.
     */
    public function edit(Request $request,Permission $permission)
    {
        return view('role-permission.permission.edit',[
            'permission'=>$permission
        ]);
    }
    /**
     * Update the specified Permission in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
                    ]
        ]);
        $permission->update([
            'name' => $request->name
        ]);
        return redirect()->route('permission.index')
                         ->withUpdate('Permission Updated Successfully');
    }
    /**
     * Remove the specified Permission from storage.
     */
    public function destroy($permissionId)
    {
        $permission=Permission::find($permissionId);
        $permission->delete();
        return back()->withDelete('Permission Deleted Successfully');
    }
}