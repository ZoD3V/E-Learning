<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.admin.permission.create');
    }
}
