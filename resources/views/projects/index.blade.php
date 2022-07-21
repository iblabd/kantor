@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Projek</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>List Projek</h2>
            <a class="link-primary"><i class="fa fa-plus" aria-hidden="true"></i> Buat projek baru</a>
        </div>


        <div class="row">
            <div class="col-sm-6 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="d-flex justify-content-end">
                            <span class="badge bg-primary">Berjalan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="d-flex justify-content-end">
                            <span class="badge bg-primary">Berjalan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="d-flex justify-content-end">
                            <span class="badge bg-primary">Berjalan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
