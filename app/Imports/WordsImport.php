<?php

namespace App\Imports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;

class WordsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $wordlist_id;

    public function __construct($wordlist_id)
    {
        $this->wordlist_id = $wordlist_id;
    }


    public function model(array $row)
    {
        // dd($row['0']);
        // return new Word([
        //     'word'     => $row[0],
        //     'meaning'    => $row[1],
        //     'sentence' => $row[3],
        //     'wordlist_id'     =>  $this->wordlist_id,
        // ]);

        if ($row[0] !== null || $row[1] !== null || $row[3] !== null ) {
            $excelfile = Word::create([
                'word'     => $row[0],
                'meaning'    => $row[1],
                'sentence' => $row[3],
                'wordlist_id'     =>  $this->wordlist_id,
            ]);
            return $excelfile;
        }



        


    }
}
