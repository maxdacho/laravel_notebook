<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Notebook;
use Illuminate\Http\Request;



class NotebooksController extends Controller
{
    public function index(){
        $user = Auth::user();
        $notebooks = $user->notebooks;
        return view('notebooks.index',compact('notebooks'));
    }

    public function create(){
        return view('notebooks.createNotebook');
    }

    public function show($id){
        $notebook = Notebook::findOrFail($id);

        $notes = $notebook->notes;
        return view('notes.notes',compact('notes','notebook'));
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'name'=>'required'
        ]);
        
        $user = Auth::user();
        $user->notebooks()->create($request->all());

        //Notebook::create($dataInput);

        return redirect('/notebooks');
    }

    public function edit($id){
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        //$notebook = Notebook::where('id',$id)->first();
        return view('notebooks.editNotebook', ['notebook' => $notebook]);
    }

    public function update(Request $request,$id){
        
        $this->validate($request,[
            'name'=>'required'
        ]);
        
        //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        $notebook->update($request->all());
        
        return redirect('/notebooks');
    }

    public function delete($id){
        //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        $notebook->delete();
    
        return redirect('/notebooks');
    }

    public function search(Request $request){
        
        $output = "";
        $notebook=Notebook::where('name','Like','%'.$request->search.'%')->get();

        foreach($notebook as $notebook){
            $output.=
            '<tr>
                <td>
                '.$notebook->name.'
                </td>

                <td>
                '.'
                <button class="btn btn-primary">'.'Edit</button>
                '.'
                </td>

                <td>
                '.'
                <input class="btn btn-danger" type="submit" value="Delete">
                '.'
                </td>
            </tr>';
        }

        return response($output);
    }
}
