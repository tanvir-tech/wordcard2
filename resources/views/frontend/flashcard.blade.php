@extends('includes/master')
@section('content')
    <div class="container">
        {{-- flash-card start --}}
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front p-5">
                    <div class="m-5">
                        <h1>{{$word[0]['word']}}</h1>
                        <p>Click to see the meaning</p>
                    </div>
                </div>
                <div class="flip-card-back p-4">
                    <h1>{{$word[0]["word"]}}</h1>
                    <p>{{$word[0]['PoS']}} : {{$word[0]['meaning']}}</p>
                    <p>{{$word[0]['sentence']}}</p>
                </div>
            </div>

        </div>
        {{-- flash-card end  --}}
        <br>
        {{-- buttons start  --}}
        <div class="row">
            <div class="col">
                <form action="/nextword">
                    <input type="hidden" name="present_word_id" value="{{$word[0]["id"]}}">
                    <input type="hidden" name="next_word_id" value="{{$word[1]["id"]}}">
                    <input type="hidden" name="wordlist_id" value="{{$word[0]["wordlist_id"]}}">
                    <input type="hidden" name="known" value="1">
                    <button class="btn btn-success btn-block">I knew this word</button>
                </form>
            </div>
            <div class="col">
                <form action="/nextword">
                    <input type="hidden" name="present_word_id" value="{{$word[0]["id"]}}">
                    <input type="hidden" name="next_word_id" value="{{$word[1]["id"]}}">
                    <input type="hidden" name="wordlist_id" value="{{$word[0]["wordlist_id"]}}">
                    <input type="hidden" name="known" value="0">
                    <button class="btn btn-danger btn-block">I didn't know this word</button>
                </form>
            </div>
        </div>
        {{-- progress bars start --}}

        @php
            use App\Models\Score;
            use App\Models\Word;
            $score = Score::where('wordlist_id', '=',$word[0]["wordlist_id"])
                        ->where('user_id', '=', Auth::user()->id)
                        ->first();
            $wordcount = Word::where('wordlist_id', '=',$word[0]["wordlist_id"])->count();
        @endphp
        <br>

        <label>Mastered: </label>
        <div class="progress">
            <div id="mastered" class="progress-bar-striped bg-success" role="progressbar" style="width: {{$score['known']/$wordcount*100}}%"
                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
        <label>Reviewing:</label>
        <div class="progress">
            <div id="reviewed" class="progress-bar-striped bg-warning" role="progressbar" style="width: {{($score['known']+$score['unknown'])/$wordcount*100}}%"
                aria-valuenow="10"></div>
        </div>
        <br>
        <label>Learning: </label>
        <div class="progress">
            <div id="learning" class="progress-bar-striped bg-danger" role="progressbar" style="width: {{$score['unknown']/$wordcount*100}}%"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>


    </div>
    <script>
        var cards = document.querySelectorAll('.flip-card');

        [...cards].forEach((card) => {
            card.addEventListener('click', function() {
                card.classList.toggle('is-flipped');
            });
        });
    </script>
@endsection
