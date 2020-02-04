@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        Add Administrators / Authors
    @endcomponent

    <form method="POST" action="{{ URL("/admin/users") }}">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter a user name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter a user email">
        </div>

        <div class="form-group">
            <label>Create a password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter a user password">
        </div>

        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" name="role_id">
                <option value="">Select a role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="active">Active</label>
            <select class="form-control" name="active">
                <option value="">Select a status</option>
                <option value="1"> Yes </option>
                <option value="2"> No </option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary mt-4">
            Add user
        </button>

        <div>
            <div class="mt-4">
                @component('admin.includes.formErrors')
                @endcomponent
            </div>
        </div>
    </form>

@endsection