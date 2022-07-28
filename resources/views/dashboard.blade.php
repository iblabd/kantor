@extends('layouts.dashboard')

@section('content')

    @role('admin')
        <p>Saya admin!</p>
        <table class="table table-striped table-hover">
            <thead>
      <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Description</th>

          </tr>
          </thead>
          <tbody>
          @if(count($articles) > 0)
          @foreach($articles->all() as $article)
          <tr>

      <td>{{ $article->id }}</td>
      <td>{{ $article->title }}</td>
      <td>{{ $article->description }}</td>
              </tr>
              @endforeach
             @endif

            </tbody>
          </table>
    @else
        <p>Saya bukan admin...</p>
    @endrole
@endsection
