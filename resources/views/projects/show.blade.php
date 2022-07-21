@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Projek</li>
                <li class="breadcrumb-item active" aria-current="page">Nama Proyek</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>Nama Proyek <span class="badge bg-primary align-middle" style="font-size: 0.48em">Berjalan</span> <a
                    type="button" class="btn btn-white"><i class="fa fa-pencil" aria-hidden="true"></i></a></h2>
            <div class="row">
                <div class="col">
                    <p>Anggota: </p>
                </div>
                <div class="col">
                    <img src="https://picsum.photos/200" class="rounded-circle" width="40" />
                </div>
                <div class="col">
                    <button type="button" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah</button>
                </div>
            </div>
            <p class="mt-3">Ini adalah contoh deskripsi dari sebuah proyek.</p>
        </div>
        <div class="container row mb-2">
            <div class="d-flex justify-content-between">
                <div class="col-3">
                    <select class="form-control" name="" id="">
                        <option>Semua</option>
                        <option>Berjalan</option>
                        <option>Selesai</option>
                        <option>Saya</option>
                    </select>
                </div>
                <p>Batas Waktu <i class="fa fa-arrow-down" aria-hidden="true"></i></p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 my-2">
                <div class="card" data-bs-toggle="modal" data-bs-target="#modelId">
                    <div class="card-body" style="cursor: pointer;">
                        <h5 class="card-title">Special title treatment <span class="badge bg-primary">Berjalan</span></h5>
                        <p class="card-text">Batas Waktu: 12 Jam Lagi</p>
                        <div class="d-flex justify-content-end">
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment <span class="badge bg-primary">Berjalan</span></h5>
                        <p class="card-text">Batas Waktu: 12 Jam Lagi</p>
                        <div class="d-flex justify-content-end">
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment <span class="badge bg-primary">Berjalan</span></h5>
                        <p class="card-text">Batas Waktu: 12 Jam Lagi</p>
                        <div class="d-flex justify-content-end">
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content col-12 modal-dialog-scrollable">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <a class="btn ml-3 link-secondary" style="cursor: pointer;" aria-label="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                </div>
                <div class="modal-body">
                    <small id="helpId">Batas waktu: 12 jam lagi</small>
                    <h4>Nama Todo</h4>
                    <h5 class="badge bg-primary">Berjalan</h5>
                    <div class="d-flex justify-content-between my-3">
                        <div class="justify-content-start">
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            <button type="button" class="btn btn-light rounded-circle"><i class="fa fa-plus px-0 py-0" aria-hidden="true"></i></button>
                        </div>
                        <button class="btn btn-primary btn-sm">Ambil Tugas</button>
                    </div>
                    <p>Ini adalah contoh sebuah deskripsi.</p>
                    <div class="input-group mb-1 item">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="">
                            </div>
                        </div>
                        <input type="text" name="items[]" class="form-control form-control-sm" value="">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-sm deleteItem--btn"
                                type="button">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
