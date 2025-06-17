@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="container my-5">

    @if(session('success'))
        <div class="alert alert-success text-center animate__animated animate__fadeInDown">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-center mb-4 page-title">List of Users with Their Roles</h2>

    <div class="card shadow-lg animate__animated animate__fadeInUp">
        <div class="card-body">

            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary px-4 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};" href="{{ route('users.create') }}">
                    <i class="fas fa-plus"></i> Create User
                </a>
            </div>

            <div class="table-responsive">
                <table id="example" class="display table table-striped table-hover" style="width:100%; border-radius: 8px; overflow: hidden;">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->roles->isNotEmpty())
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No roles assigned</span>
                                    @endif
                                </td>
                                <td class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning px-3" style="background-color: {{ $buttonColor }};">Edit</a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-3">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
