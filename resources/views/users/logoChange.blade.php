@extends('layouts.master')

@section('title', 'Application Logo Change')

@section('content')

<div class="logo-section container animate__animated animate__fadeIn">
    <h2 class="text-center fw-bold mb-5 animate__animated animate__fadeInDown">🖼️ Change Application Logo</h2>

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

    <form action="{{ route('updateLogo') }}" method="POST"
        class="row g-4 p-5 glass-form mx-auto col-md-8" enctype="multipart/form-data">
        @csrf

        <!-- Upload Logo -->
        <div class="col-md-12 animate__animated animate__fadeInUp animate__delay-1s">
            <label for="image" class="form-label">Upload New Logo</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*"
                onchange="previewLogo(event)">
            <small class="text-muted">Leave blank if you don't want to change the logo.</small>

            <div class="text-center">
                <img id="logo-preview" class="preview-img d-none mt-3 rounded shadow-sm" alt="Logo Preview">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center mt-4 animate__animated animate__fadeInUp animate__delay-2s">
            <button type="submit" class="btn btn-animated text-white"
                style="background-color: {{ $buttonColor ?? '#0d6efd' }};">
                ✅ Update Logo
            </button>
        </div>
    </form>
</div>

<script>
    function previewLogo(event) {
        const input = event.target;
        const preview = document.getElementById('logo-preview');

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
