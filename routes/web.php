<?php

use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $kecamatan = Kecamatan::all()->whereIn('kabupaten_id',[3516,3576]);
    return view('pasien', compact('kecamatan'));
})->middleware('visitor');
Route::get('/blank', function () {
    return view('admin.blank');
})->name('blank');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
Route::get('/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/pasien', [App\Http\Controllers\HomeController::class, 'pasien'])->name('pasien');
Route::post('/pasienPost', [App\Http\Controllers\PasienController::class, 'pasienPost'])->name('pasien.post');
Route::post('/', [App\Http\Controllers\PasienController::class, 'kelurahan'])->name('kelurahan');
Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
Route::put('/profile/password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.update.password');
Route::put('/profile/image/{id}', [App\Http\Controllers\UserController::class, 'updateImage'])->name('profile.update.image');