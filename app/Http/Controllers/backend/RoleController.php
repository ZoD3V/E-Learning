<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|sekolah']);
    }
    public function index()
    {
        $role = Role::all();
        return view('backend.admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('backend.admin.role.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.role.index')->withErrors($validator)->withInput();
        } else {
            Role::create($request->all());
            return redirect()->route('b.manage.role.index')->with('succes', "The Role <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.role.index')->with('error', 'The ID is empty!');
        } else {
            $role = Role::find($id);
            $permission = Permission::all();

            if ($role) {
                return view('backend.admin.role.edit', compact('role', 'permission'));
            } else {
                return redirect()->route('b.manage.role.index')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.role.index')->withErrors($validator)->withInput();
        } else {
            Role::where('id', $request->id)
                ->update(([
                    'name'         => $request->name,
                ]));
            return redirect()->route('b.manage.role.index')
                ->with('success', "The Role <strong>{$request->name}</strong> updated successfully");
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        $role->delete();

        return redirect()->route('b.manage.role.index')->with('success', "The Role <strong>{$role->name}</strong> deleted successfully");
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->name)) {
            return back()->with('message', 'Permission exist');
        }
        $role->givePermissionTo($request->name);
        return back()->with('message', 'Permission added');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked');
        }
        return back()->with('message', 'Permission not exist');
    }
}
