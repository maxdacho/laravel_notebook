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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landingpage',function(){
    return view('landingpage');
});

Route::get('/notebooks', [NotebooksController::class, 'index']);
Route::get('/notebooks/create', [NotebooksController::class, 'create']);

Route::get('/notes',function(){
    return view('notes/notes');
});
