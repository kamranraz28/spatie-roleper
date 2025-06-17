@extends('layouts.master')

@section('title', 'Application Color Change')

@section('content')


<div class="profile-section container animate__animated animate__fadeIn">
    <h2 class="text-center fw-bold mb-5 animate__animated animate__fadeInDown">🎨 Customize App Colors</h2>

    @if (session('success'))
        <div class="alert alert-success text-center rounded-pill shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger rounded shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateColors') }}" method="POST" class="row g-4 p-5 glass-form mx-auto col-md-8" enctype="multipart/form-data">
        @csrf

        <!-- Header Background Color -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-1s">
            <label for="headerColor" class="form-label">🖌️ Header Background</label>
            <input type="color" id="headerColor" name="headerColor" class="form-control form-control-color"
                value="{{ old('headerColor', $headerColor ?? '#ffffff') }}">
        </div>

        <!-- Sidebar Background Color -->
        <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-2s">
            <label for="sidebarColor" class="form-label">📁 Sidebar Background</label>
            <input type="color" id="sidebarColor" name="sidebarColor" class="form-control form-control-color"
                value="{{ old('sidebarColor', $sidebarColor ?? '#ffffff') }}">
        </div>

        <!-- Button Background Color -->
        <div class="col-md-6 mt-3 animate__animated animate__fadeInUp animate__delay-3s">
            <label for="buttonColor" class="form-label">🎯 Button Background</label>
            <input type="color" id="buttonColor" name="buttonColor" class="form-control form-control-color"
                value="{{ old('buttonColor', $buttonColor ?? '#ffffff') }}">
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-center mt-5 animate__animated animate__fadeInUp animate__delay-4s">
            <button type="submit" class="btn btn-animated text-white"
                style="background-color: {{ $buttonColor }};">
                ✅ Update Colors
            </button>
        </div>
    </form>
</div>

@endsection
