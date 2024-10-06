@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

<div class="common-container container mt-4">

    <h2 class="text-center mb-4">Edit User and Assign Role</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="common-form row g-4 shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')

        <!-- User Name Field -->
        <div class="col-md-6">
            <label for="name" class="form-label fw-bold">User Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Enter User Name" required>
        </div>

        <!-- Email Field -->
        <div class="col-md-6">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Enter Email" required>
        </div>

        <!-- Password Field -->
        <div class="col-md-6">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep the same password">
        </div>

        <!-- Confirm Password Field -->
        <div class="col-md-6">
            <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>

        <!-- Role Selection -->
        <div class="col-md-12">
            <label for="role" class="form-label fw-bold">Assign Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="" disabled>Select a Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Update User and Assign Role</button>
        </div>
    </form>
</div>

@endsection
