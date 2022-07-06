@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .btn {
  background-color: #343A40; 
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
  border-radius: 200px;
  float:right;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: darkgrey;
}

input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  padding: 10px;
  margin-right:20px;
  position:relative;
  float:right;
}

</style>

{{-- custom --}}
<h1>ToDo List</h1>
@if (count($todos) > 0)

    @foreach ($todos as $todo)
<div class="well">
    <h3> <a href="/todo/{{$todo->id}}">{{$todo->text}} </a> <input class="form-check-input" type="checkbox">
    <h4><span class="label label-danger">{{$todo->due}}</span></h4>
    <b>{{$todo->join_project}}</b>
</h3>

</div>

    @endforeach

    <a href="todo/create"> <button class="btn"><i class="fa fa-plus"></i></button></a>
    
@endif
@endsection
