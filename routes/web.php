<?php

use App\Models\album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/album', App\Http\Controllers\AlbumController::class);
Route::resource('/foto', App\Http\Controllers\FotoController::class);
Route::get('/album/{album:id}', function(album $album){
    if ($album ->user_id !== auth()->user()->id){
        abort(401);
    }
    return view('foto.index',[
        'foto' => $album->foto->where('user_id', auth()->user()->id)
    ]);
});
