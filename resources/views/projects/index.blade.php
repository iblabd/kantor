@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Projek</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>List Projek</h2>
            @role('admin')
            <a class="link-primary" href="{{ route('projects.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Buat projek baru</a>
            @endrole
        </div>


        <div class="row">
            @foreach ($projects as $project)
            <div class="col-sm-6 my-2">
                <div class="card" onclick="location.href = '{{ route('projects.show', [$project->id]) }}';">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <div class="d-flex justify-content-end">
                            <span class="badge bg-primary">{{ $project->status }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
