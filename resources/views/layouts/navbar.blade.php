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
            <ul class="nav flex-column">
                <li class="{{ $navlink == 'dashboard' ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i
                            class="fa-solid fa-house"></i>Dasbor</a></li>
                <li>
                    <a href="{{ route('absen.kehadiran') }}"><i class="fa-solid fa-flag"></i>Absensi</a>
                </li>
                <small class="profile-usertitle-name">Pegawai</small>
                <li>
                    <a href="{{ route('userProfile', [auth()->user()->karyawan->user_id]) }}"><i class="fa-solid fa-address-card"></i>Profile</a>
                </li>
                <li class="{{ $navlink == 'pegawai' ? 'active' : '' }}"><a href="{{ route('pegawai') }}"><i
                            class="fa-solid fa-user-group"></i>Data Pegawai</a>
                </li>
                @role('admin')
                    <li class="{{ $navlink == 'admin.create' ? 'active' : '' }}"><a
                            href="{{ route('admin.create') }}"><i class="fa-solid fa-user-group"></i>Tambah Pegawai</a>
                    </li>
                @endrole
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
