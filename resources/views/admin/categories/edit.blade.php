@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        <form class="pull-right" method="POST" action="{{ url('admin/categories/'.$category->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-secondary">
                Category delete
            </button>
        </form>
        Edit category
    @endcomponent

    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="{{ URL('admin/categories/'.$category->id) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Category name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                    placeholder="Enter a category" />
                </div>

                <button type="submit" class="btn btn-primary">
                    Edit category
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
