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
        $guru = User::whereHas("roles", function ($q) {
            $q->where("name", "guru");
        })->distinct()
            ->count();
        if (auth()->user()->hasRole('admin')) {
            $kelas = Kelas::all();
        } else {
            $idSekolah = Auth::user()->sekolah_id;
            $kelas = Kelas::where('sekolah_id', $idSekolah)->get();
        }
        return view('backend.admin.index', compact('guru', 'kelas'));
    }
}
