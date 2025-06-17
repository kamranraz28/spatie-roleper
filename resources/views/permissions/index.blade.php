@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4 page-title">Permissions</h2>

    @if(session('success'))
        <div class="alert alert-success animate__animated animate__fadeInDown">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary shadow-sm animate__animated animate__fadeInRight btn-create" style="background-color: {{ $buttonColor }};"
           href="{{ route('permissions.create') }}">
            <i class="fas fa-plus me-2"></i> Create Permission
        </a>
    </div>

    <div class="table-responsive shadow rounded animate__animated animate__fadeInUp table-container">
        <table id="example" class="display table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th style="width: 5%;">SN</th>
                    <th>Permission Name</th>
                    <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr class="permission-row">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission->id) }}"
                               class="btn btn-warning btn-sm me-2 btn-edit" style="background-color: {{ $buttonColor }};">
                                <i class="fas fa-edit me-2"></i> Edit
                            </a>

                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this permission?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
