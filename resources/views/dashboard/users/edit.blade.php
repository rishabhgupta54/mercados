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
                                <form action="{{ route($routeName . 'update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    {!! \App\Helpers\Input::textField('first_name', 'First Name', true, '', $user->first_name) !!}
                                    {!! \App\Helpers\Input::textField('last_name', 'Last Name', true, '', $user->last_name) !!}
                                    {!! \App\Helpers\Input::textField('email', 'Email', true, '', $user->email) !!}
                                    {!! \App\Helpers\Input::number('number_of_vehicles', 'Number of Vehicles', true, '', 0, 0, $user->number_of_vehicles) !!}
                                    {!! \App\Helpers\Input::selectField('gender', 'Gender', TRUE, $genders, '', 'id', 'name', $user->gender) !!}
                                    <div class="row float-end">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info">Update User</button>
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
