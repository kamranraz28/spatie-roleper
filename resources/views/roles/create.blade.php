@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="common-container">
    <h2>Create Role</h2>
    
    <form action="{{ route('roles.store') }}" method="POST" class="row g-3">
        @csrf
        <!-- Role Name Input -->
        <div class="col-md-6">
            <label for="name" class="form-label">Role Name:</label>
            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter role name">
        </div>
        
        <!-- Permissions Table with DataTable -->
        <div class="col-md-12">
            <label class="form-label">Permissions:</label>
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Permission Name</th>
                        <th>Select</th> <!-- New Select Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                <label class="form-check-label" for="permission-{{ $permission->id }}"></label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Submit Button -->
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Create Role</button>
        </div>
    </form>
</div>
@endsection
