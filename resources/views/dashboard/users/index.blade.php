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
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Verified User</th>
                                            <th>Gender</th>
                                            <th>Number of Vehicles</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($users))
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td><i class="fa {{ is_null($user->email_verified_at) ? 'fa-times' : 'fa-check' }}"></i></td>
                                                        <td>{{ $user->gender == 1 ? 'Male' :  'Female' }}</td>
                                                        <td>{{ $user->number_of_vehicles }}</td>
                                                        <td>
                                                            <a href="{{ route($routeName . 'edit', $user->username) }}" class="d-inline-block mx-2">
                                                                <i class="fa fa-pencil-alt"></i>
                                                            </a>
                                                            <form action="{{ route($routeName . 'destroy', $user->username) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="trash-icon">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2 float-end">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
