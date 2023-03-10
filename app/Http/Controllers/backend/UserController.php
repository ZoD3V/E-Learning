<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }


    public function index()
    {
        $user = User::all();
        return view('backend.admin.users.index', compact('user'));
    }

    public function create()
    {
        // $sekolah = User::distinct()->get(['sekolah']);
        $sekolah = Sekolah::all();
        return view('backend.admin.users.create', compact('sekolah'));
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'sekolah' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'email.required' => 'The field <strong>email</strong> is required!',
            'sekolah.required' => 'The field <strong>sekolah</strong> is required!',
            'password.required' => 'The field <strong>password</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.user.index')->withErrors($validator)->withInput();
        } else {
            User::create([
                'name'         => $request->name,
                'email' => $request->email,
                'sekolah_id' => $request->sekolah,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('b.manage.user.index')->with('succes', "The User <strong>{$request->name}</strong> created successfully");
        }
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
                    'sekolah_id'         => $request->sekolah,
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
        $user = User::find($id);

        $user->delete();

        return redirect()->route('b.manage.user.index')->with('success', "The Role <strong>{$user->name}</strong> deleted successfully");
    }
}
