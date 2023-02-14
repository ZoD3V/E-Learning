<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }


    public function index()
    {
        $sekolah = Sekolah::all();
        return view('backend.admin.sekolah.index', compact('sekolah'));
    }

    public function create()
    {
        // $sekolah = User::distinct()->get(['sekolah']);
        $sekolah = Sekolah::all();
        return view('backend.admin.sekolah.create', compact('sekolah'));
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
            return redirect()->route('b.manage.sekolah.index')->withErrors($validator)->withInput();
        } else {
            Sekolah::create([
                'name' => $request->name,
            ]);
            return redirect()->route('b.manage.sekolah.index')->with('succes', "The Sekolah <strong>{$request->name}</strong> created successfully");
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.sekolah.index')->with('error', 'The ID is empty!');
        } else {
            $sekolah = Sekolah::find($id);

            if ($sekolah) {
                return view('backend.admin.sekolah.edit', compact('sekolah'));
            } else {
                return redirect()->route('b.manage.sekolah.index')->with('error', "The #ID {$id} not found in Database!");
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
            // return redirect()->route('b.manage.role.index')->withErrors($validator)->withInput();
            return back()->with('message', $validator);
        } else {
            Sekolah::where('id', $request->id)
                ->update(([
                    'name'         => $request->name,
                ]));
            // return redirect()->route('b.manage.role.index')
            //     ->with('success', "The Role <strong>{$request->name}</strong> updated successfully");
            return back()->with('message', 'Sekolah Updated');
        }
    }


    public function destroy($id)
    {
        $user = Sekolah::find($id);

        $user->delete();

        return redirect()->route('b.manage.sekolah.index')->with('success', "The sekolah <strong>{$user->name}</strong> deleted successfully");
    }
}
