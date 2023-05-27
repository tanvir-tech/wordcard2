<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Word Card</title>
    {{ View::make('includes/style') }}
</head>
<body style="background-color: #F7ECDE">

        {{-- {{ View::make('includes/header') }} --}}
        
        <div class="mt-5 pt-5">
            @yield('content')
        </div>

        {{-- {{View::make('includes/footer')}} --}}

        {{ View::make('includes/script') }}
</body>
</html>
