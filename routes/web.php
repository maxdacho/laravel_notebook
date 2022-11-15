<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotebooksController;
use App\Http\Controllers\NotesController;


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
    Route::get('/notebooks/{notebooks}', [NotebooksController::class, 'show'])->name('notebooks.show');
    Route::get('/notebooks/{notebooks}/edit', [NotebooksController::class, 'edit'])->name('notebooks.edit');
    Route::put('/notebooks/{notebooks}', [NotebooksController::class, 'update']);
    Route::delete('/notebooks/{notebooks}', [NotebooksController::class, 'delete']);

    Route::resource('notes','NotesController');
    Route::post('/notes', [NotesController::class, 'store']);
    Route::get('/notes/{notebookId}/createNote', [NotesController::class, 'createNote'])->name('notes.createNote');


});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
