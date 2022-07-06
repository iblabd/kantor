<div class="col-md-3 mt-5">
    <div class="profile-sidebar border rounded">
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
            <ul class="nav">
                <li class="active">
                    <a href="#"><i class="fa-solid fa-house"></i>Overview</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-user"></i>Account Settings</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-check"></i>Tasks</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-flag"></i>Absensi</a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>
