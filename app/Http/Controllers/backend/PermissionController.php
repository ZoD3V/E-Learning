<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.admin.permission.create');
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
            return redirect()->route('b.manage.permission.index')->withErrors($validator)->withInput();
        } else {
            Permission::create($request->all());
            return redirect()->route('b.manage.permission.index')->with('succes', "The Role <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.permission.index')->with('error', 'The ID is empty!');
        } else {
            $permission = Permission::find($id);

            if ($permission) {
                return view('backend.admin.permission.edit', compact('permission'));
            } else {
                return redirect()->route('b.manage.permission.index')->with('error', "The #ID {$id} not found in Database!");
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
            return redirect()->route('b.manage.permission.index')->withErrors($validator)->withInput();
        } else {
            Permission::where('id', $request->id)
                ->update(([
                    'name'         => $request->name,
                ]));
            return redirect()->route('b.manage.permission.index')
                ->with('success', "The Permission <strong>{$request->name}</strong> updated successfully");
        }
    }

    public function destroy($id)
    {
        $role = Permission::find($id);

        $role->delete();

        return redirect()->route('b.manage.role.index')->with('success', "The Role <strong>{$role->name}</strong> deleted successfully");
    }
}
