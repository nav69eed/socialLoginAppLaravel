<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Dotenv\Util\Str;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\ResourceOperations\generate;

class notesController extends Controller
{
    public function showDashboard()
    {
        $notes = Note::where("userID", Auth::id())->orderBy('updated_at','desc')->get();
        return view('dashboard', ['notes' => $notes]);
    }



    public function showNote($uuid)
    {
        $note = Note::where([["uuid", $uuid], ["userID", Auth::id()]])->firstOrFail();
        if ($note) {
            return view('note.note', ['note' => $note]);
        }
    }

    public function deleteNote($uuid)
    {
        $note = Note::where([["uuid", $uuid], ["userID", Auth::id()]])->firstOrFail();
        if ($note) {
            $note->delete();
            $notes = Note::where("userID", Auth::id())->get();
            return redirect('dashboard')->with(['notes' => $notes]);
        }
    }

    public function createNote(Request $req)
    {
        $req->validate([
            'noteData' => 'required'
        ]);
        $new_note = new Note();
        $new_note->notedata = $req->noteData;
        $new_note->uuid = (string) Uuid::uuid4();
        $new_note->userID = Auth::id();
        $new_note->save();
        return redirect('dashboard');
    }
    public function editNote(Request $req, $uuid)
    {

        $req->validate([
            'noteData' => 'required'
        ]);
        $note = Note::where("uuid", $uuid)->where("userID", Auth::id())->first();

        $note->noteData = $req->noteData;
        $note->save();
        return redirect('dashboard');
    }
}
