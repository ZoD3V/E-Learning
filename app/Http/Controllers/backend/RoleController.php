<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
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

            if ($role) {
                return view('backend.admin.role.edit', compact('role'));
            } else {
                return redirect()->route('b.manage.role.index')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }
}
