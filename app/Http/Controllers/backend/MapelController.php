<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|sekolah|guru']);
    }

    public function index()
    {

        if (auth()->user()->roles->pluck('name')->first() == 'admin') {
            $mapel = Mapel::all();
        } else {
            $idSekolah = Auth::user()->sekolah_id;
            $mapel = Mapel::where('sekolah_id', $idSekolah)->get();
        }

        return view('backend.admin.mapel.index', compact('mapel'));
    }

    public function create()
    {
        $sekolah = Sekolah::all();


        if (auth()->user()->roles->pluck('name')->first() == 'admin') {
            $kelas = Kelas::all();
            $sekolah = Sekolah::all();
        } else {
            $idSekolah = Auth::user()->sekolah_id;
            $kelas = Kelas::where('sekolah_id', $idSekolah)->get();
        }
        return view('backend.admin.mapel.create', compact('kelas', 'sekolah'));
    }

    public function store(Request $request)
    {

        if (auth()->user()->hasRole('admin')) {
            $rule = [
                'name' => 'required',
                'kelas_id' => 'required',
                'sekolah_id' => 'required',
            ];

            $messages = [
                'name.required' => 'The field <strong>name</strong> is required!',
                'kelas_id.required' => 'The field <strong>kelas</strong> is required!',
                'sekolah_id.required' => 'The field <strong>Sekolah</strong> is required!',
            ];
            $validator = Validator::make($request->all(), $rule, $messages);

            if ($validator->fails()) {
                return redirect()->route('b.manage.mapel.index')->withErrors($validator)->withInput();
            } else {
                $idSekolah = $request->sekolah_id;
            }
        } else {
            $rule = [
                'name' => 'required',
                'kelas_id' => 'required',
            ];

            $messages = [
                'name.required' => 'The field <strong>name</strong> is required!',
                'kelas_id.required' => 'The field <strong>kelas</strong> is required!',
            ];
            $validator = Validator::make($request->all(), $rule, $messages);
            if ($validator->fails()) {
                return redirect()->route('b.manage.mapel.index')->withErrors($validator)->withInput();
            } else {
                $idSekolah = Auth::user()->sekolah_id;
            }
        }

        Mapel::create([
            'name' => $request->name,
            'sekolah_id' => $idSekolah,
            'kelas_id' =>  $request->kelas_id,
        ]);

        return redirect()->route('b.manage.mapel.index')->with('succes', "The mapel <strong>{$request->name}</strong> created successfully");
    }

    public function edit($id)
    {
        if ($id == null) {
            return redirect()->route('b.manage.mapel.index')->with('error', 'The ID is empty!');
        } else {
            $mapel = Mapel::find($id);
            if (auth()->user()->hasRole('admin')) {
                $kelas = Kelas::all();
            } else {
                $idSekolah = Auth::user()->sekolah_id;
                $kelas = Kelas::where('sekolah_id', $idSekolah)->get();
            }

            if ($mapel) {
                return view('backend.admin.mapel.edit', compact('mapel', 'kelas'));
            } else {
                return redirect()->route('b.manage.mapel.index')->with('error', "The #ID {$id} not found in Database!");
            }
        }
    }

    public function edit_process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'kelas_id' => 'required',
            'sekolah_id' => 'required',
        ];

        $messages = [
            'name.required' => 'The field <strong>name</strong> is required!',
            'kelas_id.required' => 'The field <strong>kelas</strong> is required!',
            'sekolah_id.required' => 'The field <strong>sekolah</strong> is required!',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);

        if ($validator->fails()) {
            // return redirect()->route('b.manage.role.index')->withErrors($validator)->withInput();
            return back()->with('message', $validator);
        } else {
            Mapel::where('id', $request->id)
                ->update(([
                    'name'         => $request->name,
                ]));
            // return redirect()->route('b.manage.role.index')
            //     ->with('success', "The Role <strong>{$request->name}</strong> updated successfully");
            return back()->with('message', 'mapel Updated');
        }
    }


    public function destroy($id)
    {
        $user = Mapel::find($id);

        $user->delete();

        return redirect()->route('b.manage.mapel.index')->with('success', "The mapel <strong>{$user->name}</strong> deleted successfully");
    }
}
