<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the Roles.
     */
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', compact('roles'));
    }
    /**
     * Show the form for creating a new Role.
     */
    public function create()
    {
        return view('role-permission.role.create');
    }
    /**
     * Store a newly created Role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);
        Role::create(['name' => $request->name]);
        return redirect()->route('role.index')->withCreate('Role Created Successfully! 🌟');
    }
    /**
     * Display the specified Role.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified Role.
     */
    public function edit(Request $request, Role $role)
    {
        return view('role-permission.role.edit', [
                    'role' => $role
        ]);
    }
    /**
     * Update the specified Role in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required','string','unique:roles,name,' . $role->id]
        ]);
        $role->update(['name' => $request->name]);
        return redirect()->route('role.index')->withUpdate('Role Updated Successfully! 🎉');
    }
    /**
     * Remove the specified Role from storage.
     */
    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return back()->withDelete('Role Deleted Successfully! 🗑️');
    }
    // This method will show permission page and  Permission checkbox 
    public function AddPermissionToRoles($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id',
                    'role_has_permissions.permission_id')
            ->all();
        return view('role-permission.role.add-permission', [
            'permissions' => $permissions,
            'role' => $role,
            'rolePermissions' => $rolePermissions,
        ]);
    }
    // This method will Give permission
    public function GivePermissionToRoles(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return back()->withCreate('Permission Granted');
    }
}
