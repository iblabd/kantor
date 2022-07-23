@extends('layouts.dashboard')


@section('content')
    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Projek</li>
                <li class="breadcrumb-item active" aria-current="page">Buat Projek</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>List Proyek</h2>
            <x-auth-validation-errors :errors="$errors" />
        </div>

        <form action="{{ route('todo.store', $project->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="row mb-3">
                <div class="col-12">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="" class="form-label">Due Date</label>
                    <input type="date" class="form-control" name="date" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Due Time</label>
                    <input type="time" class="form-control" name="time" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="" class="form-label">Status</label>
                    <select class="form-control" name="status" id="">
                        <option>Berjalan</option>
                        <option>Selesai</option>
                    </select>
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Prioritas</label>
                    <input type="number" class="form-control" name="priority" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <p>Todo Items</p>

            <div class="row mb-3">
                <div class="col-12 itemsContainer">
                    <div class="input-group mb-1 item">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                              <input type="checkbox" aria-label="">
                            </div>
                        </div>
                         <input type="text" name="items[]" class="form-control form-control-sm" placeholder="Item name" >
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button" >Delete</button>
                          </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-outline-success btn-sm addItem--btn" type="button">Add Item</button>
                    <button class="btn btn-outline-danger btn-sm removeSelected--btn" type="button"
                        style="display: none;">Remove Selected</button>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Buat Proyek</button>
            </div>
        </form>

    </div>
@endsection

{{-- <script type="text/javascript">
	const App = {
	init() {
        $(document).on('submit','.appForm',App.submitAppForm);
        $(document).on('click','.deleteItem--btn',App.deleteItem);
        $(document).on('click','.addItem--btn',App.addItem);
        $(document).on('click','.deleteRequest--btn',App.deleteRequest);
        $(document).on('click','.deleteRequest--bulk',App.deleteRequestBulk);
        $(document).on('click','.todoCards input[type=checkbox]',App.handleCheckboxClick);
        $(document).on('click','.editRequest--bulk',App.handleBulkEditClick);
        $(document).on('click','.itemsContainer input[type=checkbox]',App.handleItemCheckboxClick);
        $(document).on('click','.removeSelected--btn',App.handleRemoveItemSelected);
	},

    //todos
    //items
    deleteItem() {
        $(this).parent().parent().remove();
    },
    handleItemCheckboxClick() {
        let selectedData = [];
        $(".itemsContainer").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length)
            $('.removeSelected--btn').hide();
        else
            $('.removeSelected--btn').show();
    },
    handleRemoveItemSelected(){
        $(".itemsContainer").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
                $(this).parent().parent().parent().remove();
        });
        $(this).hide();
    },

    addItem(){
        $('.itemsContainer').append(`
            <div class="input-group mb-1 item">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="">
                    </div>
                </div>
                <input type="text" name="items[]" class="form-control form-control-sm" placeholder="Item name" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-sm deleteItem--btn" type="button" >Delete</button>
                </div>
            </div>
        `);
    },


    deleteRequestBulk(){
        let selectedData = [];
        let route = event.target.getAttribute('data-url');

        $(".todoCards").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length){
            alert('Select atleast one card');
            return false;
        }
        if(!confirm('Do you really want to delete?')) return false;
        axios.post(route,{
            ids : selectedData
        }).then((response) => {
            location.reload();
        }).catch((error) => {
            console.error(error);
            alert("Error in deleting contact support");
        });
    },

    handleCheckboxClick() {
        let selectedData = [];
        $(".todoCards").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length)
            $('.deleteRequest--bulk,.editRequest--bulk').hide();
        else
            $('.deleteRequest--bulk,.editRequest--bulk').show();
    },


    handleBulkEditClick(){
        let selectedData = [];
        let route = event.target.getAttribute('data-url');
        let modal = $('#editModal');

        $(".todoCards").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length){
            alert('Select atleast one card');
            return false;
        }
        modal.modal();
        modal.find('.modal-body').html('Loading...');

        axios.post(route, {
          ids : selectedData
        }).then((response) => {
          modal.find('.modal-body').html(response.data)
        }).catch((error) => {
          console.error(error);
        }).finally(() => {
          // TODO
        });

    },

    //global functions
	loader() {
		return '<div class="text-center">  Loading..</div>';
    },

    submitAppForm() {
        event.preventDefault();
		let form = new FormData($('.appForm')[0]);
		let url  = $('.appForm').attr('action');
		let submitBtn = $('.appForm--submit');
		let responseBlock  = $('.appForm--response');
		responseBlock.html(`${App.loader()}`);
		submitBtn.prop('disabled',true);

		axios.post(url,form).then((response) => {
            responseBlock.html(`<div class="alert alert-info successResponse"> ${response.data.message}</div>`);
            if(response.data.url != undefined)
                window.location.href = response.data.url;
    		submitBtn.prop('disabled',false);
        }).catch((error,other) => {
			responseBlock.html('');
			submitBtn.prop('disabled',false);
            error.response.data.errors.map((err) => {
				responseBlock.append(`<div class="alert alert-danger">${err}</div>`)
			})
        });
    },

    deleteRequest(){
        let route = event.target.getAttribute('data-url');
        let message = event.target.getAttribute('data-message')
        message = message == undefined ? 'Yes, delete it!': message;
        if(confirm(message)){
            axios.delete(route).then((response) => {
                location.reload();
            }).catch((error) => {
                console.error(error);
                alert("Error in deleting contact support");
            });
        }
    },
}
App.init();
</script> --}}
