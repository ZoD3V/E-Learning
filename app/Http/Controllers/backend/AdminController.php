<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $guru = User::whereHas("roles", function ($q) {
            $q->where("name", "guru");
        })->distinct()
            ->count();
        return view('backend.admin.index', compact('guru'));
    }
}
