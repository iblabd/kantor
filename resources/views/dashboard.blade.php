@extends('layouts.app')
@section('main')

<body>
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
                            <div class="mt-5 mb-2 d-grid">
                                <a class="btn btn-primary form-control-lg" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        </form>
        </body>

@endsection
