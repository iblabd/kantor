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

        <div class="mb-3">
          <label for="" class="form-label">Nama Proyek</label>
          <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="" id="" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Status</label>
          <select class="form-control" name="" id="">
            <option>Berjalan</option>
            <option>Selesai</option>
          </select>
        </div>

        <div class="mt-4 d-flex justify-content-end">
          <button type="button" name="" id="" class="btn btn-primary">Buat Proyek</button>
        </div>

    </div>
@endsection
