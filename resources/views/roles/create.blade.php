@extends('layouts.master')

@section('title', 'Create Role')

@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4 page-title">Create Role</h2>

    @if (session('success'))
        <div class="alert alert-success text-center animate__animated animate__fadeInDown">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger animate__animated animate__fadeInDown">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg animate__animated animate__fadeInUp">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST" class="row g-4">
                @csrf

                <!-- Role Name Input -->
                <div class="col-md-6 offset-md-3">
                    <label for="name" class="form-label fw-semibold">Role Name:</label>
                    <input type="text" name="name" id="name" class="form-control shadow-sm" required placeholder="Enter role name">
                </div>

                <!-- Permissions Table -->
                <div class="col-md-12 mt-4">
                    <label class="form-label fw-semibold">Assign Permissions:</label>
                    <div class="table-responsive shadow rounded">
                        <table id="example" class="display table table-striped table-hover" style="width:100%; border-radius: 8px; overflow: hidden;">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5%;" class="text-center">SN</th>
                                    <th>Permission Name</th>
                                    <th style="width: 10%;" class="text-center">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="select-all">
                                            <label class="form-check-label fw-bold" for="select-all">Select All</label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $index => $permission)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input permission-checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2 shadow btn-create" style="background-color: {{ $buttonColor }};">Create Role</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Select All functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('select-all');
        const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

        selectAllCheckbox.addEventListener('change', function () {
            permissionCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        permissionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                } else {
                    if ([...permissionCheckboxes].every(chk => chk.checked)) {
                        selectAllCheckbox.checked = true;
                    }
                }
            });
        });
    });
</script>

@endsection
