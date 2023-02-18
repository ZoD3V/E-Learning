<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $kelas = Kelas::all();
            $guru = User::whereHas("roles", function ($q) {
                $q->where("name", "guru");
            })->distinct()->count();
            $siswa = User::whereHas("roles", function ($q) {
                $q->where("name", "siswa");
            })->distinct()->count();
        } else {
            $idSekolah = Auth::user()->sekolah_id;
            $kelas = Kelas::where('sekolah_id', $idSekolah)->get();
            $guru = User::whereHas("roles", function ($q) {
                $q->where("name", "guru");
            })->where('sekolah_id', $idSekolah)->distinct()->count();
            $siswa = User::whereHas("roles", function ($q) {
                $q->where("name", "siswa");
            })->where('sekolah_id', $idSekolah)->distinct()->count();
        }
        return view('backend.admin.index', compact('guru', 'kelas', 'siswa'));
    }
}
