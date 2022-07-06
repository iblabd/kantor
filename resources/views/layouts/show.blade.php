@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go Back</a>
<h1><a href="/todo/{{$todo->id}}">{{$todo->text}}</a></h1>
<div class="label label-info" style="float:right; font-size:15px;"><a>Tenggat </a>{{$todo->due}}</div> 
<br>
<div class="label label-danger" style="font-size:12px;">{{$todo->join_project}}</div>
<hr>
<p>{{$todo->body}}</p>
<br><br>
<a href="{{ route('todo.edit',$todo->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('todo.destroy', $todo->id) }}" method="post">{{ method_field('delete') }}
    <div>
    <button class="btn btn-danger">Delete</button>
    </div>{{ csrf_field() }}
</form>
@endsection
