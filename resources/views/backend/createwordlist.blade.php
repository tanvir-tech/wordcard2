@extends('includes/master')
@section('content')
    <div class="container">
        <div class="card m-5">
            <div class="card-header d-flex justify-content-center">
                <h1>
                    Create a new Word List
                </h1>

            </div>


            {{-- @include('includes/flash-message') --}}

            <div class="card-body">
                <form class="row" action="/createwordlist" method="POST">
                    @csrf
                    <div class="col-md-6 p-4">
                        <label class="form-label">Wordlist name</label>
                        <input class="form-control" name="name">
                    </div>



                    <div class="col-md-6 p-4">
                        <label class="form-label">Wordlist Description</label>
                        <input class="form-control" name="description">
                    </div>

                    <div class="col-md-6 p-4">
                        <label for="fileSelect">Spreadsheet</label>
                        <input id="fileSelect" type="file" accept=".xlsx, .xls, .csv" />
                    </div>

                    <div class="col-md-4 p-4 m-2">
                        <button type="submit" class="btn btn-primary">Creat wordlist</button>
                    </div>


                </form>
            </div>
        </div>

    </div>
@endsection
