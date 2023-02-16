<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaHomeController extends Controller
{
    public function index()
    {
        return view('frontend.siswa.index');
    }
    public function detail()
    {
        return view('frontend.siswa.detail');
    }
}
