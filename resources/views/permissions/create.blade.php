@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeInDown card-create-permission">
        <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
            <h4 class="mb-0 page-title">Create Permission</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-md-12">
                    <label for="name" class="form-label fw-semibold">Permission Name:</label>
                    <input type="text" class="form-control shadow-sm" name="name" id="name" placeholder="Enter permission name" required>
                    <div class="invalid-feedback">
                        Please provide a permission name.
                    </div>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};">
                        <i class="fas fa-plus me-2"></i> Create Permission
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
