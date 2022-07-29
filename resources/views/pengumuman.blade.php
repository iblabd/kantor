@extends('layouts.dashboard')

@section('customStyle')
    <script type="text/javascript" src="{{ url('js/index.js') }}"></script>
@endsection


@section('content')

@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
    </div>
@endif

<div class="bg-white border rounded px-4 pt-4">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
        <div class="d-flex justify-content-between">
            <div class="col-sm-9"><h2>ANNOUCEMENT</h2></div>
            <div class="col-sm-3 align-right">
              <a href="{{ url('/add') }}" class="btn btn-success"><i class="me-2 fa-solid fa-square-plus"></i> Add Announcement</a>
              </div>
        </div>
      </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th width="20%">Title</th>
            <th width="60%">Description</th>
            <th width="20%">Action</th>
            </tr>
        </thead>

        <tbody>
        @if(count($articles) > 0)
        @foreach($articles as $article)
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->description }}</td>
            <td>
                <a href="{{ route('read.pengumuman', [$article -> id]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('edit.pengumuman', [$article -> id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal-{{$article -> id}}"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>

        <!-- Delete Modal HTML -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="deleteEmployeeModal-{{$article -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penting!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pengumuman "{{ $article->title }}" akan akan hilang seutuhnya!<br>
                    <strong>Batalkan</strong> Untuk membatalkan..
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('pengumuman.delete', [$article -> id]) }}" class="btn btn-secondary px-3">Delete</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
       @endif

      </tbody>
    </table>
  </div>
</div>

@endsection
