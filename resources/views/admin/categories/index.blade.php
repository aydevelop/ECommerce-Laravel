@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        Categories
    @endcomponent

    <div class="row">
        <div class="col-md-4">
                <table class="table table-striped admin_users_table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($categories)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <a href="{{ url('admin/categories/'.$category->id.'/edit') }}">{{ $category->name }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ URL('admin/categories') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Category name</label>
                    <input type="text" class="form-control" name="name"
                    placeholder="Enter a category" />
                </div>

                <button type="submit" class="btn btn-primary">
                    Add new category
                </button>

            </form>
        </div>

        <div>
            <div class="mt-4">
                @component('admin.includes.formErrors')
                @endcomponent
            </div>
        </div>
    </div>

@endsection
