<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|sekolah|guru']);
    }

    public function index()
    {
        $idSekolah = Auth::user()->sekolah_id;
        $kelas = Kelas::where('sekolah_id', $idSekolah)->get();

        if (auth()->user()->roles->pluck('name')->first() == 'admin') {
            $kelas = Kelas::all();
        } else {
            $idSekolah = Auth::user()->sekolah_id;
            $kelas = Kelas::where('sekolah_id', $idSekolah)->get();
        }

        // $kelas = Kelas::all();
        return view('backend.admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        // $sekolah = User::distinct()->get(['sekolah']);
        $kelas = Kelas::all();
        $sekolah = Sekolah::all();
        return view('backend.admin.kelas.create', compact('kelas', 'sekolah'));
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            return redirect()->route('b.manage.kelas.index')->withErrors($validator)->withInput();
        } else {
            $idSekolah = Auth::user()->sekolah_id;

            if (auth()->user()->roles->pluck('name')->first() == 'admin') {
                $idSekolah = $request->sekolah_id;
            } else {
                $idSekolah = Auth::user()->sekolah_id;
            }

            Kelas::create([
                'name' => $request->name,
                'sekolah_id' => $idSekolah,
            ]);


            return redirect()->route('b.manage.kelas.index')->with(
                'success',
                "Kelas <strong>{$request->name}</strong> created successfully"
            );
        }
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.kelas.index')->with('error', 'The ID is empty!');
        } else {
            $kelas = Kelas::find($id);
            $user = User::find($id);
            $sekolah = Sekolah::all();
            if ($kelas) {
                return view('backend.admin.kelas.edit', compact('kelas', 'sekolah', 'user'));
            } else {
                return redirect()->route('b.manage.kelas.index')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'field <strong>name</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            // return redirect()->route('b.manage.role.index')->withErrors($validator)->withInput();
            return back()->with('message', $validator);
        } else {
            Kelas::where('id', $request->id)
                ->update(([
                    'name'         => $request->name,
                ]));
            return redirect()->route('b.manage.kelas.index')
                ->with('success', "Kelas <strong>{$request->name}</strong> updated successfully");
        }
    }


    public function destroy($id)
    {
        $user = Kelas::find($id);

        $user->delete();

        return redirect()->route('b.manage.kelas.index')->with('success', "kelas <strong>{$user->name}</strong> deleted successfully");
    }
}
