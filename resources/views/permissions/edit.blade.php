@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="common-container">
    <h2>Edit Permission: {{ $permission->name }}</h2>
    
    <!-- Edit Permission Form -->
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="common-form row g-3">
        @csrf
        @method('PUT') <!-- Method spoofing to handle PUT request -->

        <!-- Permission Name Input -->
        <div class="form-group">
            <label for="name">Permission Name:</label>
            <input type="text" name="name" id="name" value="{{ $permission->name }}" required>
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Update Permission</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
