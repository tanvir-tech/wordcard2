<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordlist;
use App\Models\Word;


class WordlistController extends Controller
{
    public function index()
    {
        $wordlists = Wordlist::all();
        return view('frontend/wordlists', ['wordlists' => $wordlists]);
    }


    function createwordlist(Request $req){
        $req->validate([
            'name' => 'required',
            'description'  => 'required',
        ]);

        $wordlist = new Wordlist();
        $wordlist->name = $req->name;
        $wordlist->description = $req->description;
        
        $wordlist->save();

        return redirect('/createwordlist')->with('success', 'Wordlist created successfully!');
    }

    
    function startwordlist($id){
        $word = Word::where('wordlist_id', '=',$id)->take(2)->get();
        return view('frontend/flashcard', ['word' => $word]);
    }
    


    function nextword(Request $req){

        $next_id = $req->next_word_id;
        $wordlist_id = $req->wordlist_id;

        if($next_id==0){
            return redirect('/wordlists')->with('error', 'End of the Wordlist');
        }
        $word = Word::where('wordlist_id', '=',$wordlist_id)
                    ->where('id', '>=',$next_id)->take(2)->get();

        // null check 
        if(Word::where('id', '>',$next_id)->take(1)->get()){
            $word[1] = new Word();
            $word[1]->id=0;
        }
        return view('frontend/flashcard', ['word' => $word]);

    }
}
