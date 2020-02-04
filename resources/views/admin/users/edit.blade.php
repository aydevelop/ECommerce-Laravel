@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        Edit Administrators / Authors
    @endcomponent

    @if(!empty($user))
        <form method="POST" action="{{ URL("/admin/users", $user->id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label>Name</label>
                <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Enter a user name">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input value="{{ $user->email }}" type="email" class="form-control" name="email" placeholder="Enter a user email">
            </div>

            <div class="form-group">
                <label>Create a password</label>
                <input value="" type="password" class="form-control" name="password" placeholder="Enter a user password">
            </div>

            <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control" name="role_id">
                    <option value="">Select a role</option>
                    @foreach($roles as $role)
                        <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="active">Active</label>
                <select class="form-control" name="active">
                    <option value="">Select a status</option>
                    <option value="1" {{ $user->active == 1 ? 'selected' : '' }} > Yes </option>
                    <option value="2" {{ $user->active == 2 ? 'selected' : '' }} > No </option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-4">
                Edit user
            </button>

            <div>
                <div class="mt-4">
                    @component('admin.includes.formErrors')
                    @endcomponent
                </div>
            </div>
        </form>

    @else
        <div>
            No user found !!
        </div>
    @endif

@endsection