@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="common-container">
    <h2>Permissions</h2>

    <div class="button-container">
        <a class="create-permission-btn" href="{{ route('permissions.create') }}">Create Permission</a>
    </div>

    <table id="example1" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SN</th>
                <th>Permission Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permission->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
