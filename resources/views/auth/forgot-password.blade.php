@extends('layouts.app')
@section('main')

<body class="bg-image bg-primary" style="width: 100; height: 100">
        <div class="container-fluid text-dark container-fluid d-flex align-items-center justify-content-center"
            style="height: calc(100vh - 60px);">
            <div class="col-10 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="align-self-center mt-4">
                        <h2>Forgot Password</h2>
                    </div>
                    <div class="card-body">
                        @include('layouts.alert')

                        <form class="needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
                            @csrf
                            <div class="form-group mb-4">
                                <label for="inputPassword">Email</label>
                                <input class="form-control" id="inputEmail" type="text"
                                    placeholder="Enter email address" name="email" :value="old('email')"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email.
                                </div>
                            </div>


                            <div class="mt-5 mb-2 d-grid">
                                <button class="btn btn-primary form-control-lg" type="submit">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

@include('layouts.validation')

@endsection
