@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projek</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Tugas</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>Edit Tugas</h2>
            <x-auth-validation-errors :errors="$errors" />
        </div>

        <form action="{{ route('todo.update', [$project->id, $todo->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-12">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" value="{{ $todo->name }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                      <label for="descInput" class="form-label">Deskripsi</label>
                      <textarea class="form-control" name="description" id="descInput" rows="3">{{ $todo->description }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="" class="form-label">Tenggat (Tanggal)</label>
                    <input type="date" class="form-control" name="date" id="" aria-describedby="helpId"
                        placeholder="" value="{{ $todo->due_date->format('Y-m-d') }}">
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Tenggat (Waktu)</label>
                    <input type="time" class="form-control" name="time" id="" aria-describedby="helpId"
                    value="{{ $todo->due_date->format('h:i:s') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="" class="form-label">Status</label>
                    <select class="form-control" name="status" id="">
                        <option>Berjalan</option>
                        <option>Selesai</option>
                    </select>
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Prioritas</label>
                    <input type="number" class="form-control" name="priority" id="" aria-describedby="helpId"
                        value="1">
                </div>
            </div>

            <p>Sub Tugas</p>

            <div class="row mb-3">
                <div class="col-12 itemsContainer">
                    <div class="input-group mb-1 item">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                              <input type="checkbox" aria-label="">
                            </div>
                        </div>
                         <input type="text" name="items[]" class="form-control form-control-sm" placeholder="Item name" >
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button">Hapus</button>
                          </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-outline-success btn-sm addItem--btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                    <button class="btn btn-outline-danger btn-sm removeSelected--btn" type="button"
                        style="display: none;">Hapus Dipilih</button>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

    </div>
@endsection
