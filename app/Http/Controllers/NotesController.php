<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Note;
use App\Http\Requests;


class NotesController extends Controller
{

    public function index()
    {
    }

  
    public function create()
    {
        //
    }


     //Speichern von Notizen
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'

        ]);


        $note = Note::create($request->all());

        return redirect('/notebooks/' . $note->notebook_id);
    }



     //Anzeigen von Notizen
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }



     //Bearbeiten von Notizen
    public function edit($id)
    {
        $note = Note::find($id);
        return view('notes.editNote', compact('note'));
    }



     //Aktualisieren von Notizen
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $inputData = $request->all();

        $note = Note::find($id);
        $note->update($inputData);

        return redirect('/notebooks/' . $note->notebook_id);
    }



     //Löschen von Notizen
    public function destroy($id)
    {
        $note = Note::destroy($id);
        //return redirect('/notebooks/'.$note->notebook_id);
        return back();
    }
    //Erstellen von Notizen
    public function createNote($notebookId)
    {
        return view('notes.createNote')->with('id', $notebookId);
    }
}
