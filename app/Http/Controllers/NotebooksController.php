<?php

namespace App\Http\Controllers;
use App\Models\Notebook;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;


class NotebooksController extends Controller
{
    public function index(){
        $user = Auth::user;
        $notebooks = $user->notebooks;
        return view('notebooks.index',compact('notebooks'));
    }

    public function create(){
        return view('notebooks.createNotebook');
    }

    public function store(Request $request){
        $dataInput = $request->all();
        $user = Auth::user;
        $user->notebooks()->create($dataInput);

        //Notebook::create($dataInput);

        return redirect('/notebooks');
    }

    public function edit($id){
        $user = Auth::user;
        $notebook = $user->notebooks()->find($id);
        //$notebook = Notebook::where('id',$id)->first();
        return view('notebooks.editNotebook', ['notebook' => $notebook]);
    }

    public function update(Request $request,$id){
        
        //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user;

        $notebook->update($request->all());
        $notebook = $user->notebooks()->find($id);
        return redirect('/notebooks');
    }

    public function delete($id){
        //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user;
        $notebook = $user->notebooks()->find($id);
        $notebook->delete();
    
        return redirect('/notebooks');
    }
}
