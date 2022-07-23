@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('projects') }}">Proyek</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>{{ $project->title }} <span class="badge bg-primary align-middle"
                    style="font-size: 0.48em">{{ $project->status }}</span>
                @role('admin')
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-white"><i class="fa fa-pencil"
                            aria-hidden="true"></i></a>
                </h2>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-white"><i class="fa fa-trash" aria-hidden="true"></i></button></h2>
                </form>
            @endrole
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
            <p class="mt-3">{{ $project->description }}</p>
        </div>

        <div class="d-flex justify-content-end">
            <a name="" id="" class="btn btn-primary mb-2" href="{{ route('todo.create', $project->id) }}" role="button"><i
                    class="fa fa-plus" aria-hidden="true"></i> Buat Tugas</a>
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
            @foreach ($todos as $todo)
                <div class="col-sm-6 my-2">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#customModal-{{ $todo->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $todo->name }} <span
                                    class="badge bg-primary">{{ $todo->status }}</span></h5>
                            <p class="card-text">Batas Waktu: {{ $todo->due_date->format('d-m-Y') }}</p>
                            <div class="d-flex justify-content-end">
                                <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                                <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                                <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    @foreach ($todos as $key => $todo)
        <div class="modal fade" id="customModal-{{ $todo->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content col-12 modal-dialog-scrollable">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <a class="btn ml-3 link-secondary" style="cursor: pointer;" aria-label="Edit"><i class="fa fa-edit"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="modal-body">
                        <small id="helpId">Batas waktu: {{ $todo->due_date->diffForHumans() }}</small>
                        <h4>{{ $todo->name }}</h4>
                        <h5 class="badge bg-primary">{{ $todo->status }}</h5>
                        <div class="d-flex justify-content-between my-3">
                            <div class="justify-content-start">
                                <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                                <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                                <img src="https://picsum.photos/200" class="rounded-circle" width="32" />
                                <button type="button" class="btn btn-light rounded-circle"><i
                                        class="fa fa-plus px-0 py-0" aria-hidden="true"></i></button>
                            </div>
                            <button class="btn btn-primary btn-sm">Ambil Tugas</button>
                        </div>
                        <p>Dibuat oleh: <a href="{{ route('detailPegawai', [$todo->author]) }}"
                                class="link-primary">{{ $todo->postedBy['nama'] }}</a></p>
                        <p>{{ $todo->description }}</p>

                        <div class="col-12 itemsContainer">

                            @foreach ($todo->items as $item)
                                <div class="input-group mb-1 item">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <input type="checkbox" aria-label="">
                                        </div>
                                    </div>
                                     <input type="text" name="items[]" class="form-control form-control-sm" value="{{ $item->title }}">
                                     <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button" >Delete</button>
                                      </div>
                                </div>
                            @endforeach

                            <div class="input-group mb-1 item">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input type="checkbox" aria-label="">
                                    </div>
                                </div>
                                 <input type="text" name="items[]" class="form-control form-control-sm" placeholder="New Item" >
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button" >Delete</button>
                                  </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-outline-success btn-sm addItem--btn"  type="button">Add Item</button>
                            <button class="btn btn-outline-danger btn-sm removeSelected--btn"  type="button" style="display: none;">Remove Selected</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
