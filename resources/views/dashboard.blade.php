@extends('layouts.dashboard')

@section('content')

    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dasbor</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>Halo {{ auth()->user()->name }}!</h2>
        </div>


        <div class="row mt-5">
            <h4>Pengumuman</h4>
            @if (count($articles) > 0)
                @foreach ($articles->all() as $article)
                    <div class="col-sm-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline">
                                    <h5 class="card-title mb-0">{{ $article->title }}</h5>
                                    <small class="card-text">{{ $article->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="card-text mt-2">{{ $article->description }}</p>
                                <div class="d-flex justify-content-end">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning">Tidak ada data karyawan</div>
            @endif
        </div>

    </div>
@endsection
