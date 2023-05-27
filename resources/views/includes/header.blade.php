<header id="page-topbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/home">
            {{-- <img src="{{ asset('gallery') }}/ict-lib.png" alt="lms logo" width="120px"> --}}
            Word Card
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/wordlists">Word List</a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0" action="/search" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search a book" aria-label="Search"
                    name="query">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>


            <div class="dropdown d-inline-block ">
                @if (Auth::guard('web')->check())
                    {{-- logged in  --}}
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}">
                    </button>






                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="/user/profile"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i>
                            <span key="t-profile">Profile</span></a>


                        <a class="dropdown-item text-danger">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </a>
                    </div>
                @else
                    {{-- logged out  --}}
                    <a class="nav-link p-2" href="/login">Login</a>
                @endif
            </div>





        </div>
    </nav>








    {{-- admin = {{Auth::guard('admin')->check()}} --}}
</header>
