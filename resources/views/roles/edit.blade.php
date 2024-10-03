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

        <!-- Permissions Section -->
        <div class="col-12">
            <h3>Permissions</h3>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}"
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </div>
    </form>
</div>
@endsection
