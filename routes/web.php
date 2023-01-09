<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\RoleController;
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

Route::group(['middleware' => ['role:admin|sekolah|guru']], function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('b.manage.admin.index');
    Route::get('/admin/role', [RoleController::class, 'index'])->name('b.manage.role.index');
});
