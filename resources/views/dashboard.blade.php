@extends('layouts.dashboard')

@section('content')

    @role('admin')
        <p>Saya admin!</p>
        <div class="table-responsive-sm">
        <table border="2" class="table table-striped table-hover" style=" width: 200px; max-height: 200px; overflow:auto; display:inline-block" >
            <thead>
      <tr>
      <th>Title</th>
      <th>Description</th>

          </tr>
          </thead>
          <tbody>
          @if(count($articles) > 0)
          @foreach($articles->all() as $article)
          <tr>

      <td>{{ $article->title }}</td>
      <td>{{ $article->description }}</td>
              </tr>
              @endforeach
             @endif

            </tbody>
          </table>
        </div>
    @else
        <p>Saya bukan admin...</p>
    @endrole
@endsection
