@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="common-container container mt-2">

    <h2 class="text-center mb-4">Create User and Assign Role</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store.user') }}" method="POST" class="common-form row g-3">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">User Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="col-md-12">
            <label for="role" class="form-label">Role:</label>
            <select name="role" id="role" class="form-select" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Create User and Assign Role</button>
        </div>
    </form>
</div>

@endsection
