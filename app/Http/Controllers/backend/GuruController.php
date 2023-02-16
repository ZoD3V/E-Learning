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

class GuruController extends Controller
{
    public function index()
    {
        $guru = User::whereHas("roles", function ($q) {
            $q->where("name", "guru");
        })->get();
        return view('backend.admin.guru.index', compact('guru'));
    }

    public function create()
    {
        // $sekolah = User::distinct()->get(['sekolah']);
        $sekolah = Sekolah::all();
        return view('backend.admin.guru.create', compact('sekolah'));
    }

    public function store(Request $request)
    {

        if (auth()->user()->hasRole('admin')) {
            $rule = [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:8',
            ];

            $messages = [
                'name.required' => 'The field <strong>name</strong> is required!',
                'email.required' => 'The field <strong>email</strong> is required!',
                'password.required' => 'The field <strong>Password</strong> is required!',
            ];

            $validator = Validator::make($request->all(), $rule, $messages);

            if ($validator->fails()) {
                return redirect()->route('b.manage.guru.index')->withErrors($validator)->withInput();
            } else {
                $idSekolah = $request->sekolah_id;
            }
        } else {
            $rule = [
                'name' => 'required',
                'email' => 'required',
            ];

            $messages = [
                'name.required' => 'The field <strong>name</strong> is required!',
                'email.required' => 'The field <strong>email</strong> is required!',
            ];

            $validator = Validator::make($request->all(), $rule, $messages);

            if ($validator->fails()) {
                return redirect()->route('b.manage.guru.index')->withErrors($validator)->withInput();
            } else {
                $idSekolah = Auth::user()->sekolah_id;
            }
        }

        if ($request->password) {
            $user = User::create([
                'name'         => $request->name,
                'sekolah_id'         => $idSekolah,
                'email'         => $request->email,
                'password'         => Hash::make($request->password),
            ]);
            $user->assignRole('guru');
        } else {
            $user = User::create([
                'name'         => $request->name,
                'sekolah_id'         => $idSekolah,
                'email'         => $request->email,
                'password'         => Hash::make($request->password),
            ]);
            $user->assignRole('guru');
        }

        // if ($validator->fails()) {
        //     return redirect()->route('b.manage.guru.index')->withErrors($validator)->withInput();
        // } else {
        //     if (auth()->user()->roles->pluck('name')->first() == 'admin') {
        //         $idSekolah = $request->sekolah_id;
        //     } else {
        //         $idSekolah = Auth::user()->sekolah_id;
        //     }

        //     if ($request->password) {
        //         $user = User::create([
        //             'name'         => $request->name,
        //             'sekolah_id'         => $idSekolah,
        //             'email'         => $request->email,
        //             'password'         => Hash::make($request->password),
        //         ]);
        //         $user->assignRole('guru');
        //     } else {
        //         $user = User::create([
        //             'name'         => $request->name,
        //             'sekolah_id'         => $idSekolah,
        //             'email'         => $request->email,
        //             'password'         => Hash::make($request->password),
        //         ]);
        //         $user->assignRole('guru');
        //     }

        return redirect()->route('b.manage.guru.index')->with('succes', "<strong>{$request->name}</strong> created successfully");
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
                return view('backend.admin.guru.edit', compact('role', 'permissions', 'user'));
            } else {
                return redirect()->route('b.manage.user.index')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'email.required' => 'The field <strong>email</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.guru.index')->withErrors($validator)->withInput();
            // return back()->with('message', $validator);
        } else {

            if (auth()->user()->roles->pluck('name')->first() == 'admin') {
                $idSekolah = $request->sekolah_id;
            } else {
                $idSekolah = Auth::user()->sekolah_id;
            }

            if ($request->password) {
                User::where('id', $request->id)
                    ->update(([
                        'name'         => $request->name,
                        'sekolah_id'         => $idSekolah,
                        'email'         => $request->email,
                        'password'         => Hash::make($request->password),
                    ]));
            } else {
                User::where('id', $request->id)
                    ->update(([
                        'name'         => $request->name,
                        'sekolah_id'         => $idSekolah,
                        'email'         => $request->email,
                    ]));
            }


            return redirect()->route('b.manage.guru.index')
                ->with('success', "<strong>{$request->name}</strong> updated successfully");
            // return back()->with('message', 'User Updated');
        }
    }

    public function destroy($id)
    {
        $guru = User::find($id);

        $guru->delete();

        return redirect()->route('b.manage.guru.index')->with('success', "Guru <strong>{$guru->name}</strong> deleted successfully");
    }
}
