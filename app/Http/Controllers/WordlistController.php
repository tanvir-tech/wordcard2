<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordlist;

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
}
