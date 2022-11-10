<?php

namespace App\Http\Controllers;
use App\Models\Notebook;

use Illuminate\Http\Request;

class NotebooksController extends Controller
{
    public function index(){
        $notebooks=Notebook::all();
        return view('notebooks.index',compact('notebooks'));
    }

    public function create(){
        return view('notebooks.createNotebook');
    }

    public function store(Request $request){
        $dataInput = $request->all();
        Notebook::create($dataInput);

        return 'success';
    }
}
