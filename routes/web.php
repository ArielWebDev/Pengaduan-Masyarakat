<?php

use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [
    App\Http\Controllers\HomeController::class, 'index'
])->name('home');

Route::get('/masyarakat/login', [
    'uses' => 'App\Http\Controllers\MasyarakatLoginController@index',
    'as' => 'masyarakat.login'
]);

Route::get('/masyarakat/register', [
    'uses' => 'App\Http\Controllers\MasyarakatLoginController@register',
    'as' => 'masyarakat.register'
]);

Route::post('/masyarakat/action-login', [
    'uses' => 'App\Http\Controllers\MasyarakatLoginController@actionlogin',
    'as' => 'masyarakat.action-login'
]);

Route::post('/masyarakat/action-register', [
    'uses' => 'App\Http\Controllers\MasyarakatLoginController@actionregister',
    'as' => 'masyarakat.action-register'
]);

Route::resource('pengaduan',PengaduanController::class);
Route::resource('masyarakat',App\Http\Controllers\MasyarakatController::class)->middleware(['checkrole:admin']);
Route::resource('user',App\Http\Controllers\UserController::class)->middleware(['checkrole:admin']);
Route::resource('pengaduanadmin',App\Http\Controllers\PengaduanAdminController::class)->middleware(['checkrole:admin,petugas']);

Route::get('/laporan', [
    App\Http\Controllers\LaporanController::class, 'index'
])->name('laporan.index');
// Route::post('/getLaporan', [
//     App\Http\Controllers\LaporanController::class, 'getLaporan'
// ])->name('laporan.getLaporan');
Route::get('/cetak/{from}/{to}', [
    App\Http\Controllers\LaporanController::class, 'cetak'
])->middleware(['checkrole:admin'])->name('laporan.cetak');

Route::post('/tanggapan/createOrUpdate', [
    App\Http\Controllers\TanggapanController::class, 'createOrUpdate'
])->middleware(['checkrole:admin,petugas'])->name('tanggapan.createOrUpdate');
