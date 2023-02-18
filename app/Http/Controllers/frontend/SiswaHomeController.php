<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:siswa']);
    }

    public function index()
    {
        return view('frontend.siswa.index');
    }
}
