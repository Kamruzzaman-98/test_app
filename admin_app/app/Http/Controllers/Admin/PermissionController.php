<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully!');
    }

    public function edit($id)
    {
        return Permission::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')
            ->with('success', 'Permission updated successfully!');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return back()->with('success', 'Permission deleted successfully');
    }
}
