@extends('layouts.master')

@section('title', 'Role - Edit')

@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4 page-title">Edit Role: {{ $role->name }}</h2>

    @if (session('success'))
        <div class="alert alert-success text-center animate__animated animate__fadeInDown">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger animate__animated animate__fadeInDown">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg animate__animated animate__fadeInUp">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST" class="row g-4">
                @csrf
                @method('PUT')

                <!-- Role Name -->
                <div class="col-md-6 offset-md-3">
                    <label for="name" class="form-label fw-semibold">Role Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="form-control shadow-sm" required placeholder="Enter role name">
                </div>

                <!-- Permissions Table -->
                <div class="col-md-12 mt-4">
                    <label class="form-label fw-semibold">Assign Permissions:</label>
                    <div class="table-responsive shadow rounded">
                        <table id="example" class="display table table-striped table-hover" style="width:100%; border-radius: 8px; overflow: hidden;">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:5%;" class="text-center">SL</th>
                                    <th>Permission Name</th>
                                    <th style="width:10%;" class="text-center">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $index => $permission)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}"
                                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};">
                        <i class="fas fa-save me-2"></i> Update Role
                    </button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary px-4 py-2 shadow btn-create ms-2">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
