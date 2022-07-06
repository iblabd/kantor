@extends('layouts.app')
<style>
    /* Profile sidebar */
    .profile-sidebar {
        background: #fafcfd;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
        min-width: 100%;
    }

    .profile-usermenu ul li {
        min-width: 100%;
        padding: 8px 12px 8px 12px;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-weight: 400;
        text-decoration: none;
        padding: 8px 12px 8px 12px;
        width: auto;
        display: block;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
        width: auto;
        display: block;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
        font-weight: 400;
        width: auto;
        display: block;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        border-radius: 4px;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        width: auto;
        display: block;
    }

    /* Profile Content */
    .dashboard-content {
        color: #5a7391;
        padding: 20px;
        min-height: 100%;
    }
</style>


@section('main')

    <div class="container">
        <div class="row profile">
            @include('layouts.navbar')
            <div class="col-md-9">
                <div class="dashboard-content my-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection
