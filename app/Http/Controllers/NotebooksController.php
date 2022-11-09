<?php

namespace App\Http\Controllers;
use App\Models\Notebook;

use Illuminate\Http\Request;

class NotebooksController extends Controller
{
    public function index(){
        $notebooks=Notebook::all();
        return $notebooks;
    }
}
