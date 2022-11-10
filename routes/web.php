<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotebooksController;

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



Route::group(['middleware'=>'auth'],function(){

    Route::get('/', function () {
        return view('landingpage');
    });
    
    Route::get('/notebooks', [NotebooksController::class, 'index']);
    Route::post('/notebooks', [NotebooksController::class, 'store']);
    Route::get('/notebooks/create', [NotebooksController::class, 'create']);
    Route::get('/notebooks/{notebooks}', [NotebooksController::class, 'edit']);
    Route::put('/notebooks/{notebooks}', [NotebooksController::class, 'update']);
    Route::delete('/notebooks/{notebooks}', [NotebooksController::class, 'delete']);

});






Route::get('/notes',function(){
    return view('notes/notes');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
