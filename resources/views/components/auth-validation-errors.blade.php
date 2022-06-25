@props(['errors'])

@if ($errors->any())

    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <ul class="my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
