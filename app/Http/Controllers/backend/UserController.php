<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('backend.admin.users.index', compact('user'));
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.user.index')->with('error', 'The ID is empty!');
        } else {
            $role = Role::all();
            $permissions = Permission::find($id);
            $user = User::find($id);

            if ($role) {
                return view('backend.admin.users.edit', compact('role', 'permissions', 'user'));
            } else {
                return redirect()->route('b.manage.user.index')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'sekolah' => 'required',
            'email' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'sekolah.required' => 'The field <strong>sekolah</strong> is required!',
            'email.required' => 'The field <strong>email</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            // return redirect()->route('b.manage.role.index')->withErrors($validator)->withInput();
            return back()->with('message', $validator);
        } else {
            User::where('id', $request->id)
                ->update(([
                    'name'         => $request->name,
                    'sekolah'         => $request->sekolah,
                    'email'         => $request->email,
                ]));
            // return redirect()->route('b.manage.role.index')
            //     ->with('success', "The Role <strong>{$request->name}</strong> updated successfully");
            return back()->with('message', 'User Updated');
        }
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->assignRole($request->name)) {
            return back()->with('message', 'Role exist');
        }
        $user->assignRole($request->name);
        return back()->with('message', 'Role added');
    }

    public function removeRole(Request $request, User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role revoked');
        }
        return back()->with('message', 'Role not exist');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        $role->delete();

        return redirect()->route('b.manage.role.index')->with('success', "The Role <strong>{$role->name}</strong> deleted successfully");
    }
}
