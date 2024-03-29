<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordlist;
use App\Models\Word;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WordsImport;

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

        return redirect('/newwordlist')->with('success', 'Wordlist created successfully!');
    }

    
    function startwordlist($id){


        $score = Score::where('wordlist_id', '=',$id)
                        ->where('user_id', '=', Auth::user()->id)
                        ->first();
        if($score){
            $score->user_id = Auth::user()->id;
            $score->wordlist_id = $id;
            $score->known = 0;
            $score->unknown =0;
            $score->stoped_word_id = 0;
            $score->save();
        }else{
            // reset the scores or initialize a score 
            $score = new Score();
            $score->user_id = Auth::user()->id;
            $score->wordlist_id = $id;
            $score->known = 0;
            $score->unknown =0;
            $score->stoped_word_id = 0;
            $score->save();
        }

        
        
        $word = Word::where('wordlist_id', '=',$id)->take(2)->get();
        return view('frontend/flashcard', ['word' => $word]);
    }
    


    function nextword(Request $req){

        $next_id = $req->next_word_id;
        $wordlist_id = $req->wordlist_id;

        // search and update the score
        
        $score = Score::where('wordlist_id', '=',$wordlist_id)
                        ->where('user_id', '=', Auth::user()->id)
                        ->first();
        
        // return $score;
        $known = $req->known;
        if($known){
            // increase known score
            $score->known = $score->known+1;
        }else{
            // decrease known score
            $score->unknown = $score->unknown+1;
        }
        $score->save();


        if($next_id==0){
            return view('frontend/endpage',['wordlist_id'=>$wordlist_id] )->with('error', 'End of the Wordlist');
        }
        $word = Word::where('wordlist_id', '=',$wordlist_id)
                    ->where('id', '>=',$next_id)->take(2)->get();

        // return $word;
        // null check 
        if(Word::where('wordlist_id', '=',$wordlist_id)
                ->where('id', '>=',$next_id)->take(2)->get()
                ->count() < 2){
            $word[1] = new Word();
            $word[1]->id=0;
            // return $word;
        }
        return view('frontend/flashcard', ['word' => $word]);

    }


    function createwordlist_fromexcel(Request $request){

        $wordlist_id =  $request->wordlist_id;

        Excel::import(new WordsImport($wordlist_id), $request->file('excelfile')->store('temp'));

        return back();
    }
}
