<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

class WordController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'word' => 'required',
            'meaning' => 'required',
            'pos' => 'required',
            'wordlist_id' => 'required',
            'sentence' => 'required'
        ]);

        $word = new Word();
        $word->word = $req->word;
        $word->meaning = $req->meaning;
        $word->pos = $req->pos;
        $word->wordlist_id = $req->wordlist_id;
        $word->sentence = $req->sentence;
        $word->save();
        
        return redirect('/addword')->with('success', 'Book created successfully!');
    }
}
