@extends('layouts.app')
@section('main')

	<div class="container my-4">
		<div class="card">
			<div class="card-header">
				Edit Todo
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-dark float-right">Back</a>
			</div>
			<div class="card-body">
		    	<form method="POST" class="appForm" action="{{ route('todo.update',$todo->id) }}">
		    		@csrf
		    		@method('PUT')
		    		<div class="row">

		    			<div class="col-12 form-group">
		    				<label>Name</label>
		    				<input type="text" class="form-control" name="name"  value="{{ $todo->name }}" />
		    			</div>

		    			<div class="col-md-6 form-group">
		    				<label>Author</label>
		    				<input type="text" class="form-control form-control-sm" value="{{ $todo->author }}" name="author"  />
		    			</div>
		    			<div class="col-md-6 form-group">
		    				<label>Due Date</label>
		    				<input type="date" class="form-control form-control-sm"  value="{{ $todo->due_date->format('Y-m-d') }}" name="due_date"  />
		    			</div>
		    			<div class="col-md-6 form-group">
		    				<label>Status</label>
		    				<input type="text" class="form-control form-control-sm"  value="{{ $todo->status }}" name="status"  />
		    			</div>
		    			<div class="col-md-6 form-group">
		    				<label>Priority</label>
		    				<input type="number" min="1" class="form-control form-control-sm"  value="{{ $todo->priority }}" name="priority"  />
		    			</div>



		    		<div class="appForm--response my-2"></div>
		    		<button class="btn btn-dark btn-sm float-right ">Update</button>
		    	</form>
			</div>
		</div>
	</div>

@endsection
