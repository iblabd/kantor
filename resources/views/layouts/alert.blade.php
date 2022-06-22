@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <x-auth-validation-errors :errors="$errors" />
    </div>
@endif
