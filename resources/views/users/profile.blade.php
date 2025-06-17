@extends('layouts.master')

@section('title', 'My Profile')

@section('content')


<div class="profile-section container animate__animated animate__fadeIn">
    <h2 class="text-center fw-bold mb-5 animate__animated animate__fadeInDown">👤 Update Your Profile</h2>

    @if (session('success'))
        <div class="alert alert-success text-center rounded-pill shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateProfile', $user->id) }}" method="POST"
        class="row g-4 p-5 glass-form mx-auto col-md-10 col-lg-8" enctype="multipart/form-data">
        @csrf

        <!-- User Name -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-1s">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control"
                placeholder="Enter User Name" required>
        </div>

        <!-- Email -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-1s">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control"
                placeholder="Enter Email" required>
        </div>

        <!-- Password -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control"
                placeholder="Leave blank to keep the same password">
        </div>

        <!-- Confirm Password -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                placeholder="Confirm Password">
        </div>

        <!-- Image Upload -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-3s">
            <label for="image" class="form-label">Upload Profile Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*"
                onchange="previewImage(event)">
            <small class="form-text text-muted">Leave blank if you don't want to change/upload the image.</small>

            <div class="text-center">
                <img id="image-preview" class="preview-img d-none mt-3" alt="Profile Image Preview">
            </div>
        </div>

        <!-- Hidden Role Select -->
        <div class="col-md-12" style="display: none;">
            <select name="role" id="role" class="form-control" required>
                <option value="" disabled>Select a Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit -->
        <div class="col-12 text-center mt-4 animate__animated animate__fadeInUp animate__delay-4s">
            <button type="submit" class="btn btn-animated text-white"
                style="background-color: {{ $buttonColor ?? '#0d6efd' }};">
                🔄 Update Profile
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
