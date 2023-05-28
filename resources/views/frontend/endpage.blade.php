@extends('includes/master')
@section('content')
    <div class="container">
        <h1>Completed! You are at the end of this wordlist.</h1>
        {{-- progress bars start --}}

        @php
            use App\Models\Score;
            use App\Models\Word;
            $score = Score::where('wordlist_id', '=', $wordlist_id)
                ->where('user_id', '=', Auth::user()->id)
                ->first();
            $wordcount = Word::where('wordlist_id', '=', $wordlist_id)->count();
        @endphp
        <br>

        <label>Mastered: </label>
        <div class="progress">
            <div id="mastered" class="progress-bar-striped bg-success" role="progressbar"
                style="width: {{ ($score['known'] / $wordcount) * 100 }}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
        <br>
        <label>Reviewing:</label>
        <div class="progress">
            <div id="reviewed" class="progress-bar-striped bg-warning" role="progressbar"
                style="width: {{ (($score['known'] + $score['unknown']) / $wordcount) * 100 }}%" aria-valuenow="10"></div>
        </div>
        <br>
        <label>Learning: </label>
        <div class="progress">
            <div id="learning" class="progress-bar-striped bg-danger" role="progressbar"
                style="width: {{ ($score['unknown'] / $wordcount) * 100 }}%" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
    @endsection
