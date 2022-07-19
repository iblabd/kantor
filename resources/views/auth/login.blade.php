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
                        <x-auth-validation-errors :errors="$errors" />


                        <form class="needs-validation" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="inputEmail">Email</label>
                                <input class="form-control" id="inputEmail" type="email" placeholder="Enter email address"
                                    name="email" data-error="#inputEmail-error" required>
                                <span class="my-0 text-danger" id="inputEmail-error" for="inputEmail"></span>
                            </div>

                            <div class="form-group mb-4">
                                <label for="inputPassword">Password</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="inputPassword"
                                        placeholder="Enter password" name="password" data-error="#inputPassword-error"
                                        required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><a><i onclick="showPassword();"
                                                    class="fa fa-eye-slash py-2" id="show_hide_password_icon"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                    </input>
                                </div>
                                <span class="my-0 text-danger" id="inputPassword-error" for="inputPassword"></span>
                                <span class="help-block ">
                                    <div class="d-flex flex-row-reverse justify-content-between">
                                        <div class="p-2 mt-0 mb-0 lh-sm">
                                            <a href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>
                                        <div class="p-2 mt-0 mb-0 lh-sm">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="remember_me" name="remember">
                                                <label class="form-check-label" for="remember_me">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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

    @include('partials.showpassword')
    @include('partials.validation')
@endsection
