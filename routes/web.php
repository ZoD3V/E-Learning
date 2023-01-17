<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SiswaController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController as Home;
use App\Http\Controllers\frontend\DaftarSekolahController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Home::class, 'index'])->name("frontend.home.index");
Route::get('/daftar-sekolah', [DaftarSekolahController::class, 'index'])->name("frontend.sekolah.index");

Auth::routes();

// Route::get('/admin/home', [HomeController::class, 'index'])->name('home');
Route::get('/siswa/home', [SiswaController::class, 'index'])->name('b.manage.siswa.index');

Route::group(['middleware' => ['role:admin|sekolah|guru']], function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('b.manage.admin.index');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/role', [RoleController::class, 'index'])->name('b.manage.role.index');
    Route::get('/admin/users', [UserController::class, 'index'])->name('b.manage.user.index');
    Route::get('/admin/permission', [PermissionController::class, 'index'])->name('b.manage.permission.index');

    Route::get('/admin/user/edit/{id?}', [UserController::class, 'edit'])->name('b.manage.user.edit');
    Route::post('/backend/user/edit/process/{id?}', [UserController::class, 'edit_process'])->name('backend.user.edit.process');
    Route::post('/backend/user/edit/assign/role/{id?}', [UserController::class, 'assignRole'])->name('backend.user.edit.assign.role');
    Route::delete('/backend/user/{user?}/delete/role/{role?}', [UserController::class, 'removeRole'])->name('backend.user.delete.role');





    Route::get('/admin/role/create', [RoleController::class, 'create'])->name('b.manage.role.create');
    Route::post('/admin/role/create/process', [RoleController::class, 'store'])->name('b.manage.role.create.process');
    Route::get('/admin/role/edit/{id?}', [RoleController::class, 'edit'])->name('b.manage.role.edit');

    Route::post('/admin/role/{role}/edit/permission', [RoleController::class, 'givePermission'])->name('b.manage.role.permission.edit');
    Route::delete('/admin/role/{role}/edit/permission/{permission}', [RoleController::class, 'revokePermission'])->name('b.manage.role.permission.revoke');

    Route::post('/backend/role/process/{id?}', [RoleController::class, 'edit_process'])->name('backend.role.edit.process');
    Route::delete('/backend/role/delete/{id?}', [RoleController::class, 'destroy'])->name('backend.role.delete');

    Route::get('/admin/permission/create', [PermissionController::class, 'create'])->name('b.manage.permission.create');
    Route::post('/admin/permission/create/process', [PermissionController::class, 'store'])->name('b.manage.permission.create.process');
    Route::get('/admin/permission/edit/{id?}', [PermissionController::class, 'edit'])->name('b.manage.permission.edit');
    Route::post('/backend/permission/process/{id?}', [PermissionController::class, 'edit_process'])->name('backend.permission.edit.process');
    Route::delete('/backend/permission/delete/{id?}', [PermissionController::class, 'destroy'])->name('backend.permission.delete');
});
