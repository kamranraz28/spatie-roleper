@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="common-container">
    <h2>Edit Permissions for Role: {{ $role->name }}</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <!-- Permissions Table -->
        <div class="col-12">
            <h3>Permissions</h3>
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Permission Name</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </div>
    </form>
</div>
@endsection