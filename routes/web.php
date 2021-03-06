<?php

use App\Models\Kecamatan;
use App\Models\Pasien;
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

Route::get('/blank', function () {
    $pas = Pasien::latest('id')->first();
    dd($pas->id +1);
})->name('blank');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
Route::get('/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/pasien', [App\Http\Controllers\HomeController::class, 'pasien'])->name('pasien');
Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
Route::get('/', [App\Http\Controllers\PasienController::class, 'index'])->name('landingpage')->middleware('visitor');
Route::post('/keluarga-add', [App\Http\Controllers\HomeController::class, 'addKeluarga'])->name('keluarga.add');
Route::post('/pasienPost', [App\Http\Controllers\PasienController::class, 'pasienPost'])->name('pasien.post');
Route::post('/', [App\Http\Controllers\PasienController::class, 'kelurahan'])->name('kelurahan');
Route::get('/data/{pasien}', [App\Http\Controllers\PasienController::class, 'data'])->name('data');
Route::get('/download/{pasien}', [App\Http\Controllers\PasienController::class, 'download'])->name('download');
Route::put('/setting', [App\Http\Controllers\HomeController::class, 'updateSetting'])->name('setting.update');
Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
Route::put('/profile/password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.update.password');
Route::put('/profile/image/{id}', [App\Http\Controllers\UserController::class, 'updateImage'])->name('profile.update.image');
Route::delete('/keluarga-delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteKeluarga'])->name('keluarga.delete');

