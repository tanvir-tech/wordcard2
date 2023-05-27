@extends('includes/master')
@section('content')
    <div class="container">
        <div class="card m-5">
            <div class="card-header d-flex justify-content-center">
                <h1>
                    Add a new word
                </h1>

            </div>
            @include('includes/flash-message')
            
            <div class="card-body">
                <form class="row" action="/addword" method="POST">
                    @csrf
                    <div class="col-md-6 p-4">
                        <label class="form-label">Word</label>
                        <input class="form-control" name="word">
                    </div>
                    <div class="col-md-6 p-4">
                        <label class="form-label">Meaning</label>
                        <input class="form-control" name="meaning">
                    </div>
                    <div class="col-md-6 p-4">
                        <label class="form-label">Parts of speech</label>
                        <input class="form-control" name="pos">
                    </div>
                    <div class="col-md-6 p-4">
                        <label class="form-label">Wordlist ID</label>
                        <input type="number" class="form-control" name="wordlist_id">
                    </div>
                    <div class="col-md-6 p-4">
                        <label class="form-label">Example sentence</label>
                        <input class="form-control" name="sentence">
                    </div>
                    
                    <br><hr>

                    <div class="col-md-4 p-4 m-2">
                        <button type="submit" class="btn btn-primary">Add word</button>
                    </div>


                </form>
            </div>
        </div>

    </div>
@endsection