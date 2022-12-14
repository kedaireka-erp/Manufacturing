<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
            <img class="main-logo" src="{{ asset("assets/images/logo-astral.svg") }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                        {{-- <img src="{{ Auth::user()->getPhotoUrlAttribute()}}" alt="image"> --}}
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        {{-- <p class="mb-1 text-black">Username</p> --}}
                        <p class="mb-1 text-black">{{ Auth::user()->name ?? "Belum Login" }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown logout-dropdown" aria-labelledby="profileDropdown">
                    <form action="{{ route("logout") }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="mdi mdi-logout me-2"></i> Signout </a>
                    </button>
                    </form>
                    {{-- <a class="dropdown-item" href="/logout"> --}}
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
