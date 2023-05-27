@extends('includes/master')
@section('content')
    <div class="container">
        {{-- flash-card start --}}
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front p-5">
                    <div class="m-5">
                        <h1>Front word</h1>
                        <p>Click to see the meaning</p>
                    </div>
                </div>
                <div class="flip-card-back p-4">
                    <h1>Title Word</h1>
                    <p>PoS : Meaning</p>
                    <p>Example Sentence</p>
                </div>
            </div>

        </div>
        {{-- flash-card end  --}}
        <br>
        {{-- buttons  --}}
        <div class="row">
            <div class="col">
                <button class="btn btn-success btn-block">I knew this word</button>
            </div>
            <div class="col">
                <button class="btn btn-danger btn-block">I didn't know this word</button>
            </div>
        </div>
        {{-- progress bars  --}}
        <br>

        <label>Mastered: </label>
        <div class="progress">
            <div id="mastered" class="progress-bar-striped bg-success" role="progressbar" style="width: 10%"
                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
        <label>Reviewing: </label>
        <div class="progress">
            <div id="reviewed" class="progress-bar-striped bg-warning" role="progressbar" style="width: 10%"
                aria-valuenow="10"></div>
        </div>
        <br>
        <label>Learning: </label>
        <div class="progress">
            <div id="learning" class="progress-bar-striped bg-danger" role="progressbar" style="width: 10%"
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
