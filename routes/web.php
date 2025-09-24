<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// file
Route::get('/home', 'App\Http\Controllers\IndexController@index')->name('home');
Route::get('/file/{id}', 'App\Http\Controllers\FileController@index')->name('file');
Route::post('/upload', 'App\Http\Controllers\FileController@upload')->name('file.update');
Route::get('/download/{token}', 'App\Http\Controllers\FileController@download')->name('file.download');

// user
Route::get('/user_list/{page}', 'App\Http\Controllers\UserController@index')->name('user_list');
Route::post('/user/{id}', 'App\Http\Controllers\UserController@edit')->name('user');
Route::post('/user_list/0', 'App\Http\Controllers\UserController@add')->name('user.add');
// project
Route::get('/project_list/{page}', 'App\Http\Controllers\ProjectController@index')->name('project_list');
Route::post('/project/{id}', 'App\Http\Controllers\ProjectController@edit')->name('project');
Route::post('/project_list/0', 'App\Http\Controllers\ProjectController@add')->name('project.add');
// history
Route::get('/history/{id}', 'App\Http\Controllers\HistoryController@index')->name('history');

Route::get('/', function () {
//    return view('welcome');
    if (Auth::check()) {
        return redirect()->route('home'); // 初期ページ に飛ばす
    }
    return redirect()->route('login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
//    Route::view('/', 'dashboard')->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
