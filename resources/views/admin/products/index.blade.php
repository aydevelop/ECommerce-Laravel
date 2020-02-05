@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        <a href="{{ URL('admin/products/create') }}" class="btn btn-primary mb-4 pull-right"> Create new product </a>
        Products list
    @endcomponent

    <table class="table table-striped admin_users_table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($products))
                @foreach($products as $prod)
                    <tr>
                        <td>
                            {{ $prod->id }}
                        </td>
                        <td>
                          <a href="{{ url('admin/products/' . $prod->id) }}"> {{ $prod->name }} </a>
                        </td>
                        <td>
                            {{ $prod->category->name }}
                        </td>
                        <td>
                            {{ $prod->price }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $products->links() }}
@endsection
