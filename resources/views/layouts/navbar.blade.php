@php($navlink = Route::currentRouteName())



<div class="col-md-3 mt-5">
    <div class="profile-sidebar bg-white border rounded">
        <div class="profile-userpic">
            {{-- <img src="" class="img-responsive" alt=""> --}}
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <h5>Nama Orang</h5>
            </div>
            <div class="profile-usertitle-job">
                <h6>Developer</h6>
            </div>
        </div>
        <div class="profile-usermenu">
            <ul class="nav flex-column" id="nav_accordion">

                <li class="{{ $navlink == 'dashboard' ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i
                            class="fa-solid fa-house"></i>Overview</a></li>


                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <li class="accordion-item {{ $navlink == 'dashboard' ? 'active' : '' }}">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Account Settings
                            </a>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            {{-- content --}}
                            twss
                        </div>
                    </li>
                </div>

                <li class="{{ $navlink == '' ? 'active' : '' }}"><a href="#"><i
                            class="fa-solid fa-user"></i>Account Settings</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-check"></i>Tasks</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-flag"></i>Absensi</a>
                </li>
                <li>
                    <a href="#"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>

@include('layouts.submenu')
