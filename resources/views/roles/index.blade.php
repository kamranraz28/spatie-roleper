@extends('layouts.master')

@section('title', 'Roles')

@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4 page-title">Roles</h2>

    @if(session('success'))
        <div class="alert alert-success animate__animated animate__fadeInDown">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary px-4 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};" href="{{ route('roles.create') }}">
            <i class="fas fa-plus me-2"></i> Create Roles
        </a>
    </div>

    <div class="table-responsive shadow rounded animate__animated animate__fadeInUp">
        <table id="example" class="display table table-striped table-hover" style="width:100%; border-radius: 8px; overflow: hidden;">
            <thead class="table-dark">
                <tr>
                    <th style="width: 5%;">SN</th>
                    <th>Role Name</th>
                    <th>Permissions</th>
                    <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $role->name }}</strong></td>
                        <td>
                            <ul class="mb-0">
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
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary px-3 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};" href="{{ route('roles.edit', $role->id) }}">
                                    <i class="fas fa-edit me-2"></i> Edit Permissions
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
