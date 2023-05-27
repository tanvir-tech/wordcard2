<header id="page-topbar">
    <div class="navbar-header" style="background-color: #B088F9">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box p-3">
                @if(Auth::guard('admin')->check())
                <a href="/admin/dashboard" class="logo logo-dark">
                @else
                <a href="dashboard" class="logo logo-dark">
                @endif
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('images/logo.svg') }}" alt="" height="22"> --}}
                        <h2 class="text-info">
                            WC
                        </h2>
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('images/logo-dark.png') }}" alt="" height="17"> --}}
                        <h2 class="text-info">
                            Word Card
                        </h2>

                    </span>
                </a>
                

                @if(Auth::guard('admin')->check())
                <a href="/admin/dashboard" class="logo logo-light">
                @else
                <a href="dashboard" class="logo logo-light">
                @endif
                
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('images/logo-light.png') }}" alt="" height="22"> --}}
                        <h2 class="text-light bg-dark">
                            WC
                        </h2>
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('images/logo-light.png') }}" alt="" height="19"> --}}
                        <h2 class="text-light bg-dark">
                            Word Card
                        </h2>
                    </span>
                </a>


            </div>



            
            
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>


            <span class="logo-sm pt-4 pl-3">
                <h5 class="text-light">
                    <a class="nav-link" href="/catList">Category</a>
                </h5>
            </span>

            






        </div>





        
        <div class="d-flex">

            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            <div class="dropdown d-inline-block">

                @auth
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}">
                    </button>
                @else
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="text-sm text-gray-700 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-white p-4 ">
                                    Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                @endauth



                {{-- <span class="d-none d-xl-inline-block ms-1 " key="t-henry">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i> --}}

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i>
                        <span key="t-my-wallet">My
                            Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i
                            class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                            key="t-settings">Settings</span></a>
                    <a class="dropdown-item" href="#"><i
                            class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock
                            screen</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </a>

                    {{-- @auth
                        // user logged in
                    @else
                        // not logged in
                    @endauth --}}


                </div>
            </div>


        </div>
    </div>

    {{-- admin = {{Auth::guard('admin')->check()}} --}}
</header>






