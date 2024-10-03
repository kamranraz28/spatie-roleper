@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="common-container">
    <h2>Roles</h2>

    <div class="button-container">
        <a class="create-permission-btn" href="{{ route('roles.create') }}">Create Roles</a>
    </div>

    <table id="example1" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SN</th>
                <th>Role Name</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $role->name }}</strong></td>
                    <td>
                        <ul>
                            @if($role->permissions->isNotEmpty())
                                @foreach ($role->permissions as $permission)
                                    <li>{{ $permission->name }}</li>
                                @endforeach
                            @else
                                <li>No permissions assigned</li>
                            @endif
                        </ul>
                    </td>
                    <td>

                        <div class="button-container">
                            <a class="create-permission-btn" href="{{ route('roles.edit', $role->id) }}">Edit
                                Permissions</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection