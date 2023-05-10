<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\GuruController;
use App\Http\Controllers\backend\KelasController;
use App\Http\Controllers\backend\MapelController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SekolahController;
use App\Http\Controllers\backend\SiswaController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController as Home;
use App\Http\Controllers\frontend\DaftarSekolahController;
use App\Http\Controllers\frontend\SiswaHomeController;

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

Auth::routes();

// Route::get('/admin/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin|sekolah|guru']], function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('b.manage.admin.index');
});

Route::get('/admin/role', [RoleController::class, 'index'])->name('b.manage.role.index');
Route::get('/admin/users', [UserController::class, 'index'])->name('b.manage.user.index');
Route::get('/admin/permission', [PermissionController::class, 'index'])->name('b.manage.permission.index');

Route::get('/admin/user/create', [UserController::class, 'create'])->name('b.manage.user.create');
Route::post('/admin/user/create/process', [UserController::class, 'store'])->name('b.manage.user.create.process');
Route::get('/admin/user/edit/{id?}', [UserController::class, 'edit'])->name('b.manage.user.edit');
Route::delete('/admin/user/delete/{id?}', [UserController::class, 'destroy'])->name('b.manage.user.destroy');
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

Route::get('/admin/manage/guru', [GuruController::class, 'index'])->name('b.manage.guru.index');
Route::get('/admin/guru/create', [GuruController::class, 'create'])->name('b.manage.guru.create');
Route::post('/admin/guru/create/process', [GuruController::class, 'store'])->name('b.manage.guru.create.process');
Route::get('/admin/guru/edit/{id?}', [GuruController::class, 'edit'])->name('b.manage.guru.edit');
Route::post('/backend/guru/process/{id?}', [GuruController::class, 'edit_process'])->name('backend.guru.edit.process');
Route::delete('/backend/guru/delete/{id?}', [GuruController::class, 'destroy'])->name('backend.guru.delete');

Route::get('/admin/manage/sekolah', [SekolahController::class, 'index'])->name('b.manage.sekolah.index');
Route::get('/admin/sekolah/create', [SekolahController::class, 'create'])->name('b.manage.sekolah.create');
Route::post('/admin/sekolah/create/process', [SekolahController::class, 'store'])->name('b.manage.sekolah.create.process');
Route::get('/admin/sekolah/edit/{id?}', [SekolahController::class, 'edit'])->name('b.manage.sekolah.edit');
Route::post('/backend/sekolah/process/{id?}', [SekolahController::class, 'edit_process'])->name('backend.sekolah.edit.process');
Route::delete('/backend/sekolah/delete/{id?}', [SekolahController::class, 'destroy'])->name('backend.sekolah.delete');



Route::get('/admin/manage/mapel', [MapelController::class, 'index'])->name('b.manage.mapel.index');
Route::get('/admin/mapel/create', [MapelController::class, 'create'])->name('b.manage.mapel.create');
Route::post('/admin/mapel/create/process', [MapelController::class, 'store'])->name('b.manage.mapel.create.process');
Route::get('/admin/mapel/edit/{id?}', [MapelController::class, 'edit'])->name('b.manage.mapel.edit');
Route::post('/backend/mapela/process/{id?}', [MapelController::class, 'edit_process'])->name('backend.mapel.edit.process');
Route::delete('/backend/mapel/delete/{id?}', [MapelController::class, 'destroy'])->name('backend.mapel.delete');

//KELAS
Route::get('/admin/manage/kelas', [KelasController::class, 'index'])->name('b.manage.kelas.index');
Route::delete('/backend/kelas/delete/{id?}', [KelasController::class, 'destroy'])->name('backend.kelas.delete');

Route::group(['middleware' => ['permission:create kelas']], function () {
    Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('b.manage.kelas.create');
    Route::post('/admin/kelas/create/process', [KelasController::class, 'store'])->name('b.manage.kelas.create.process');
});

Route::group(['middleware' => ['permission:edit kelas']], function () {
    Route::get('/admin/kelas/edit/{id?}', [KelasController::class, 'edit'])->name('b.manage.kelas.edit');
    Route::post('/backend/kelas/process/{id?}', [KelasController::class, 'edit_process'])->name('backend.kelas.edit.process');
});

// Siswa Backend
Route::get('/admin/manage/siswa', [SiswaController::class, 'index'])->name('b.manage.siswa.index');
Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('b.manage.siswa.create');
Route::post('/admin/siswa/create/process', [SiswaController::class, 'store'])->name('b.manage.siswa.create.process');
Route::get('/admin/siswa/edit/{id?}', [SiswaController::class, 'edit'])->name('b.manage.siswa.edit');
Route::post('/backend/siswa/process/{id?}', [SiswaController::class, 'edit_process'])->name('backend.siswa.edit.process');
Route::delete('/backend/siswa/delete/{id?}', [SiswaController::class, 'destroy'])->name('backend.siswa.delete');

// Siswa Frontend
Route::get('/siswa/home', [SiswaHomeController::class, 'index'])->name('f.manage.siswa.index');
Route::get('/siswa/detail', [SiswaHomeController::class, 'detail'])->name('frontend.siswa.detail');
