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

        return redirect('/notebooks');
    }

    public function edit($id){
        $notebook = Notebook::where('id',$id)->first();
        return view('notebooks.editNotebook', ['notebook' => $notebook]);
    }

    public function update(Request $request,$id){
        $notebook = Notebook::where('id',$id)->first();
        $notebook->update($request->all());

        return redirect('/notebooks');
    }
}
