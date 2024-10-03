@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="common-container">
<h2>List of Users with Their Roles</h2>
<div class="button-container">
        <a class="create-permission-btn" href="{{ route('users.create') }}">Create User</a>
    </div>
<table id="example1" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                        <span>{{ $role->name }}</span>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection


