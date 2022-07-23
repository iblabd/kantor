@extends('layouts.dashboard')

@section('content')
    @role('admin')
        <p>Saya admin!</p>
    @else
        <p>Saya bukan admin...</p>
    @endrole
@endsection
