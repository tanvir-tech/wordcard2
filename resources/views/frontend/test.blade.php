@extends('includes/master')
@section('content')
    <div class="container">

        {{-- {{ View::make('includes/header') }} --}}

        {{ View::make('frontend/flashcard') }}



        </div>
    @endsection
