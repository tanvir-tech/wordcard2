@extends('includes/master')
@section("content")


<div class="container mt-5">
    <h1>All word lists are here </h1>
    <div class="row">


        {{-- card  --}}
        <div class="col-lg-5 m-4">
            <div class="card rounded">
                <div class="card-body bg-info">
                    <h1 class="text-light text-center">Wordlist 01</h1>
                </div>
                <div class="card-footer">
                    <p>
                        This category contains 50 words
                    </p>
                    <a href="practice" class="btn btn-outline-info">
                        Let's practics -->
                    </a>
                    
                </div>
            </div>
        </div>
        {{-- card end  --}}
        {{-- card  --}}
        <div class="col-lg-5 m-4">
            <div class="card rounded">
                <div class="card-body bg-info">
                    <h1 class="text-light text-center">Wordlist 02</h1>
                </div>
                <div class="card-footer">
                    <p>
                        This category contains 50 words
                    </p>
                    <a href="practice" class="btn btn-outline-info">
                        Let's practics -->
                    </a>
                    
                </div>
            </div>
        </div>
        {{-- card end  --}}


        {{-- @foreach ($categories as $category)
        <div class="col-lg-6">
            <div class="card rounded">
                <div class="card-body bg-info">
                    <h1 class="text-light text-center">Category {{$category['id']}} - {{$category['name']}}</h1>
                </div>
                <div class="card-footer">
                    <p>
                        {{$category['description']}}
                    </p>
                    <a href="practice/{{$category['id']}}" class="btn btn-outline-light">
                        Let's practics -->
                    </a>
                    
                </div>
            </div>
        </div>
        @endforeach --}}
        
        
    </div>
</div>

@endsection