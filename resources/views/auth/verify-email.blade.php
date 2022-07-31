@extends('layouts.dashboard')

@section('content')

    <div class="bg-white border rounded px-4 pt-4 pb-4">
        <nav class="mt-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dasbor</li>
            </ol>
        </nav>
        <div class="my-4">
            <h2>Halo {{ auth()->user()->name }}!</h2>
        </div>


        <div class="row mt-5">
            <h4>Pengumuman</h4>
                <div class="alert alert-warning">Verifikasi email terlebih dahulu untuk melihat pengumuman.</div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#verify-modal').modal({
                backdrop: 'static',
                keyboard: false
            })
            $("#verify-modal").modal('show');
            setTimeout(
                function() {
                    $("#btn-resend").prop('disabled', false)
                    $("#please-wait").hide();
                }, 30000);

        });
    </script>
    <div id="verify-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verify Email</h5>
                </div>

                <div class="modal-body">
                    @if (session('status') == 'verification-link-sent')
                        <div id="please-wait" class="alert alert-warning" role="alert">
                            Please wait 30 seconds before resend
                        </div>
                        <p>A new verification link has been sent to the email address you provided during registration.</p>
                        <div class="mt-5">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="my-2 d-grid">
                                    <button class="btn btn-primary form-control-lg" type="submit">Resend Verification
                                        Email</button>
                                </div>
                            </form>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="d-grid">
                                    <button class="btn btn-danger form-control-lg" type="submit">Logout</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <p>Before getting started, could you verify your email address by clicking on the link we just
                            emailed. Press the button under to receive a verification link.</p>
                        <div class="mt-5">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="my-2 d-grid">
                                    <button class="btn btn-primary form-control-lg" type="submit">Send Verification
                                        Email</button>
                                </div>
                            </form>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="d-grid" style="margin-top: -10px">
                                    <button class="btn btn-danger form-control-lg" type="submit">Logout</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
