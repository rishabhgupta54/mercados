@extends('layout.authentication')
@section('title', 'Login')
@section('content')
    <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="50" class="mx-auto">
                            </a>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    {!! \App\Helpers\Input::textField('email', 'Email', TRUE) !!}
                                    {!! \App\Helpers\Input::password('password', 'Password', TRUE) !!}
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
