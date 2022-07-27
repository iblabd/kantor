@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projek</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>{{ $project->title }} <span class="badge bg-primary align-middle"
                    style="font-size: 0.48em">{{ $project->status }}</span>
                @role('admin')
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-white"><i class="fa fa-pencil"
                            aria-hidden="true"></i></a>
                    <a onclick="return confirm('Are you sure?')" class="btn btn-white link-danger"><i class="fa fa-trash"
                            aria-hidden="true" onclick="document.getElementById('deleteProject').submit();"></i></a>
                </h2>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" id="deleteProject">
                    @csrf
                    @method('DELETE')
                </form>
            @endrole
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#assigntopr"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                        Tambah Anggota</button>
                </div>
            </div>
            <p class="mt-3">{{ $project->description }}</p>
        </div>

        <div class="d-flex justify-content-end mb-2">
            <button data-url="{{ route('todo.destroy.bulk') }}" class="btn btn-danger deleteRequest--bulk mr-2"
                style="display: none;"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Dipilih</button>
            <a name="" id="" class="btn btn-primary" href="{{ route('todo.create', $project->id) }}"
                role="button"><i class="fa fa-plus" aria-hidden="true"></i> Buat Tugas</a>
        </div>

        <div class="row">
            @foreach ($todos as $todo)
                <div class="col-sm-6 my-2">
                    <div class="card todoCards">
                        <div class="card-body mb-0 pb-0">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $todo->name }} <span
                                        class="badge bg-primary">{{ $todo->status }}</span></h5>
                                <input type="checkbox" id="cp{{ $todo->id }}" value="{{ $todo->id }}"
                                    class="mx-2">
                            </div>
                        </div>
                        <div class="card-body" data-bs-toggle="modal" data-bs-target="#customModal-{{ $todo->id }}">
                            <p class="card-text">Batas Waktu: {{ $todo->due_date->format('d-m-Y') }}</p>
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
                        <a class="btn ml-3 link-secondary" href="{{ route('todo.edit', [$project->id, $todo->id]) }}"
                            style="cursor: pointer;" aria-label="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    </div>
                    <div class="modal-body">
                        <small id="helpId">Batas waktu: {{ $todo->due_date->diffForHumans() }}</small>
                        <h4>{{ $todo->name }}</h4>
                        <h5 class="badge bg-primary">{{ $todo->status }}</h5>
                        <p class="mb-2">Dibuat oleh: <a href="{{ route('detailPegawai', [$todo->author]) }}"
                                class="link-primary">{{ $todo->postedBy['nama'] }}</a></p>
                        <p class="mb-4 mt-0">{{ $todo->description }}</p>
                        <form action="{{ route('todo.markDone', $project->id) }}" method="POST" id="markDone">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control d-none" name="todoId" value="{{ $todo->id }}"></input>
                            <input type="text" class="form-control d-none" name="status" value="selesai"></input>
                        </form>

                        <div class="col-12 itemsContainer">

                            @foreach ($todo->items as $item)
                                @if ($item->count() != 0)
                                    <div class="input-group mb-1 item">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="">
                                            </div>
                                        </div>
                                        <input type="text" name="items[]" class="form-control form-control-sm"
                                            value="{{ $item->title }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a onclick="document.getElementById('markDone').submit();" class="btn btn-primary">Tandai
                            Selesai</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="assigntopr" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-dialog-scrollable">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <div class="bg-light sticky-top">
                        {{-- <form role="search">
                            <div class="input-group py-2">
                                <input class="form-control border-end-0 border" type="search"
                                    placeholder="Cari nama, email" value="" id="search-input" role="search">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-secondary bg-white border-start-0 border ms-n3"
                                        type="button">
                                        <i class="fa fa-search link-primary"></i>
                                    </button>
                                </span>
                            </div>
                        </form> --}}
                    </div>
                    <table style="min-width: 100%">
                        @foreach ($karyawans as $karyawan)
                            <tr height="48px">
                                <td class="" width="10%"><img src="https://picsum.photos/200"
                                        class="rounded-circle" width="32" /></td>
                                <td class="align-middle" width="68%">
                                    <h6 class="mb-0">{{ $karyawan->nama }}</h6><small>{{ $karyawan->email }}</small>
                                    <form action="{{ route('projects.assign', $project->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="text" class="form-control d-none" name="karyawan_id"
                                            id="" value="{{ $karyawan->user_id }}">
                                        <input type="text" class="form-control d-none" name="project_id"
                                            id="" value="{{ $project->role_id }}">
                                </td>
                                <td class="text-center" width="22%"><button type="submit" class="btn btn-primary"><i
                                            class="fa fa-plus" aria-hidden="true"></i>Tambah</button></td>
                                </form>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
