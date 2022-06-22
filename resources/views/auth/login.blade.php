@extends('layouts.app')
@section('main')

<body class="bg-image bg-primary" style="width: 100; height: 100">
        <div class="container-fluid text-dark container-fluid d-flex align-items-center justify-content-center"
            style="height: calc(100vh - 60px);">
            <div class="col-10 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="align-self-center mt-4">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            <div class="form-group mb-4">
                                <label for="inputPassword">Email</label>
                                <input class="form-control" id="inputEmail" type="text"
                                    placeholder="Enter email address" name="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="inputPassword">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="show_hide_password"
                                        placeholder="Enter password" name="password" pattern=".{8,}" required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><a><i onclick="showPassword();"
                                                    class="fa fa-eye-slash py-2" id="show_hide_password_icon"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Incorrect password.
                                    </div>
                                </div>
                                <span class="help-block ">
                                    <p class="mt-0 mb-0 text-end lh-sm"><a href="{{ route('password.request') }}">Forgot password?</a></p>
                                </span>
                            </div>


                            <div class="mt-5 mb-2 d-grid">
                                <button class="btn btn-primary form-control-lg" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

@include('layouts.showpassword')
@include('layouts.validation')

@endsection
