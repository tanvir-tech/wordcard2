<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/flashcard.css') }}">
</head>

<body>
    <div class="container">
        {{-- <div class="scene scene--card">
            <div class="card">
                <div class="card__face card__face--front">front</div>
                <div class="card__face card__face--back">back</div>
            </div>
        </div> --}}
        <div class="scene scene--card">
            <div class="card">
                <div class="card__face card__face--front">
                    <h1>front</h1>
                    
                    
                </div>
                <div class="card__face card__face--back">
                    back
                    <h1>Click to see the meaning</h1>
                </div>
            </div>
        </div>
    </div>
    <script>
        var cards = document.querySelectorAll('.card');

        [...cards].forEach((card) => {
            card.addEventListener('click', function() {
                card.classList.toggle('is-flipped');
            });
        });
    </script>
</body>

</html>
