@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="common-container">
    <h2>Create Permission</h2>
    <form action="{{ route('permissions.store') }}" method="POST" class="common-form row g-3">
        @csrf
        <div class="form-group">
            <label for="name">Permission Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary">Create Permission</button>
        </div>
    </form>
</div>

@endsection


