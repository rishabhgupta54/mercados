@extends('layout.main')
@section('title', $pageTitle)
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route($routeName . 'store') }}" method="POST">
                                    @csrf
                                    {!! \App\Helpers\Input::textField('first_name', 'First Name') !!}
                                    {!! \App\Helpers\Input::textField('last_name', 'Last Name') !!}
                                    {!! \App\Helpers\Input::textField('email', 'Email') !!}
                                    {!! \App\Helpers\Input::password('password', 'Password') !!}
                                    {!! \App\Helpers\Input::password('password_confirmation', 'Confirm Password') !!}
                                    {!! \App\Helpers\Input::number('number_of_vehicles', 'Number of Vehicles') !!}
                                    {!! \App\Helpers\Input::selectField('gender', 'Gender', TRUE, $genders) !!}
                                    <div class="row float-end">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info">Create User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
