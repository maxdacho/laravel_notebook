<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Notebook;
use Illuminate\Http\Request;



class NotebooksController extends Controller
{
    //index-Funktion gibt dem authentifizierten Benutzer seine Notizbücher aus
    public function index()
    {
        $user = Auth::user();
        $notebooks = $user->notebooks;
        return view('notebooks.index', compact('notebooks'));
    }
    //Legt ein neues Notizbuch an
    public function create()
    {
        return view('notebooks.createNotebook');
    }
    //Zeigt alle Notizbücher 
    public function show($id)
    {
        $notebook = Notebook::findOrFail($id);

        $notes = $notebook->notes;
        return view('notes.notes', compact('notes', 'notebook'));
    }
    //Speichert Notizbücher
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = Auth::user();
        $user->notebooks()->create($request->all());

        //Notebook::create($dataInput);

        return redirect('/notebooks');
    }
    //Funktion zum Editieren von Notizbüchern
    public function edit($id)
    {
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        //$notebook = Notebook::where('id',$id)->first();
        return view('notebooks.editNotebook', ['notebook' => $notebook]);
    }
    //Aktualisieren von Notizbüchern
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

        //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        $notebook->update($request->all());

        return redirect('/notebooks');
    }
    //Löschen von Notizbüchern
    public function delete($id)
    {
        //$notebook = Notebook::where('id',$id)->first();
        $user = Auth::user();
        $notebook = $user->notebooks()->find($id);
        $notebook->delete();

        return redirect('/notebooks');
    }
    //Suchfunktion mittels AJAX
    public function search(Request $request)
    {

        $output = "";
        $notebook = Notebook::where('name', 'Like', '%' . $request->search . '%')->get();

        foreach ($notebook as $notebook) {
            $output .=

                '<div class="notebook-item" style="border-radius:10px; background:white; padding:4rem; margin:0.5rem;">
            ' . '
            <a href="/notebooks/' . $notebook->id . '">
            ' . '
            <h1 class="notebook-title">
            ' . $notebook->name . '
            ' . '
            </h1>
            ' . '
            </a>
            <a href="/notebooks/' . $notebook->id . '/edit">
            ' . '
              <button class="btn btn-primary my-3">Bearbeiten</button>
              ' . '
            </a>
            <form action="/notebooks/' . $notebook->id . '" method="POST">'
                . csrf_field() . '
            ' . '
            ' . method_field('DELETE') . '
            ' . '
            <input class="btn btn-danger" type="submit" value="Entfernen">
            </form>
            ' . '
          </div>';
        }

        return response($output);
    }
}
