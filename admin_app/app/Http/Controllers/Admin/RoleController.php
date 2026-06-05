<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully!');
    }


    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully!');
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }


    public function editPermissions($id)
    {
        $role = Role::findById($id);

        $permissions = Permission::all();

        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.roles.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function updatePermissions(Request $request, $id)
    {
        $role = Role::findById($id);

        $role->syncPermissions($request->permissions ?? []);

        return back()->with('success', 'Permissions updated successfully');
    }
}
