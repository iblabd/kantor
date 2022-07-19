@extends('layouts.app')
@section('main')

	<div class="container-fluid my-4" >
		<div class="card shadow" style="min-height:90vh ">
			<div class="card-header">
				Todo List
				<a href="{{ route('todo.create') }}" class="btn btn-sm btn-dark float-right">Add</a>
				<button
					data-url="{{ route('todo.destroy.bulk') }}"
					class="btn btn-sm btn-danger mx-1 float-right deleteRequest--bulk
					" style="display: none;">Delete Selected</button>
				<button
					data-url="{{ route('todo.edit.bulk') }}"
					class="btn btn-sm btn-outline-info mx-1 float-right editRequest--bulk
					" style="display: none;">Edit Status/Priority Selected</button>
			</div>
			<div class="card-body ">

				@unless ($todos->count())
					<div class="alert alert-danger">No data found in system</div>
				@endunless

		    	<div class="row todoCards">

		    		@foreach ($todos as $key => $todo)
					<div class="col-lg-4 col-md-6  ">


						<div class="card shadow mb-4">
				  			<div class="card-header">

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 form-group ">
            Todo Items
        </div>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

				  			{{ $todo->name }}

								<span class="badge float-right rounded-0 badge-dark">{{ $todo->status }}</span>
				  				<span class="badge float-right rounded-0 badge-info mx-1">{{ $todo->priority }}</span>

				  			</div>
					  		<div class="card-body">
			  					<table class="table  text-muted table-sm table-borderless">
			  						<tr><td>Time Left: </td> <td>{{ $todo->due_date->diffForHumans() }}</td><tr>
			  						<tr><td>Due Date: </td> <td>{{ $todo->due_date->format('Y-m-d') }}</td><tr>
			  						<tr><td>Author: </td> <td>{{ $todo->author }}</td><tr>
			  						<tr><td>Created at: </td> <td>{{ $todo->created_at }}</td><tr>
			  						<tr><td>Updated at: </td> <td>{{ $todo->updated_at }}</td><tr>
			  					</table>

					  		</div>
					  		<div class="card-footer p-1">
					  			<span class="border px-2 py-1 text-muted">
					  				<input type="checkbox" id="cp{{ $todo->id }}" value="{{ $todo->id }}" class="mx-2">
					  			<label for="cp{{ $todo->id }}">Select</label>
					  			</span>
					  			<button
						  				data-url="{{ route('todo.destroy',$todo->id) }}"
						  				class="btn btn-sm deleteRequest--btn btn-outline-danger mx-1 float-right "
						  			>Delete</button>

						  			<a
						  				href="{{ route('todo.edit',$todo->id) }}"
						  				class="btn btn-sm btn-outline-info float-right"
						  			>Edit</a>
									  <button type="button" class="btn btn-sm btn-outline-info float-right" data-toggle="modal" data-target="#exampleModalLong" href="id">
										TODO
										</button>
					  		</div>
				  		</div>

					</div>
		    		@endforeach

				</div>

			</div>
		</div>
	</div>
@include('modals.edit-bulk')
@endsection
