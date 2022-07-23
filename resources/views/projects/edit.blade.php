@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Projek</li>
                <li class="breadcrumb-item active" aria-current="page">Buat Projek</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>List Proyek</h2>
        </div>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
          <label for="" class="form-label">Nama Proyek</label>
          <input type="text" name="title" id="" class="form-control" placeholder="" value="{{ $project->title }}" aria-describedby="helpId">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="description" id="" rows="3">{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Status</label>
          <select class="form-control" name="status" id="">
            <option {{ 'berjalan' == $project->status ? 'selected="selected"' : '' }}>Berjalan</option>
            <option {{ 'selesai' == $project->status ? 'selected="selected"' : '' }}>Selesai</option>
            <option {{ 'dibatalkan' == $project->status ? 'selected="selected"' : '' }}>Dibatalkan</option>
          </select>
        </div>

        <div class="mt-4 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>

    </div>
@endsection
