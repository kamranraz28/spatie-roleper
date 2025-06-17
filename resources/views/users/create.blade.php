@extends('layouts.master')

@section('title', 'Create User')

@section('content')

<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeInDown">
        <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
            <h4 class="mb-0 page-title">Create User and Assign Role</h4>
        </div>
        <div class="card-body">
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

            <form action="{{ route('store.user') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf

                <!-- User Name Field -->
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">User Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control shadow-sm" placeholder="Enter User Name" required>
                    <div class="invalid-feedback">
                        Please provide a user name.
                    </div>
                </div>

                <!-- Email Field -->
                <div class="col-md-6">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control shadow-sm" placeholder="Enter Email" required>
                    <div class="invalid-feedback">
                        Please provide a valid email.
                    </div>
                </div>

                <!-- Password Field -->
                <div class="col-md-6">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm" placeholder="Enter Password" required>
                    <div class="invalid-feedback">
                        Please provide a password.
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control shadow-sm" placeholder="Confirm Password" required>
                    <div class="invalid-feedback">
                        Please confirm your password.
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="col-md-12">
                    <label for="role" class="form-label fw-semibold">Assign Role</label>
                    <select name="role" id="role" class="form-control shadow-sm" required>
                        <option value="" selected disabled>Select a Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a role.
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};">
                        <i class="fas fa-user-plus me-2"></i> Create User and Assign Role
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary px-4 py-2 shadow btn-create ms-2">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
