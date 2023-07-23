@extends('includes/master')
@section('content')
    <div class="container">


        <div class="card">
            <div class="card-header text-center">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="card-body">
                <br><br>
                <a href="/newwordlist" class="btn btn-warning btn-lg" role="button">New Word List</a>
                <br><br>
                <a href="/createwordlist" class="btn btn-success btn-lg" role="button">Store Words</a>

            </div>
        </div>
    </div>
@endsection
