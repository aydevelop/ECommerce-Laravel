@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        <form class="pull-right" method="POST" action="{{ url('admin/products/'.$product->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-secondary">
                Product delete
            </button>
        </form>
        @if($product->id)
            Edit product
        @else
            Create product
        @endif
    @endcomponent

    @if(!empty($product))

        <form method="POST" action="{{ URL('admin/products/'.$product->id) }}" enctype="multipart/form-data" >
            @csrf
            @if($product->id)
                @method('PATCH')
            @endif

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ $product->name }}" type="text" class="form-control" name="name" placeholder="Enter a name">
                        </div>

                        <div class="form-group">
                            <label for="name">Price</label>
                            <input value="{{ $product->price }}" type="text" class="form-control" name="price" placeholder="Enter a price">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" >
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option
                                    {{ $product->category_id == $category->id ? 'selected':'' }}
                                    value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="review">Text</label>
                            <textarea id="" class="form-control"
                            rows="5" name="text">
                                {{ $product->text }}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">
                            @if($product->id)
                                Save changes
                            @else
                                Create product
                            @endif
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <div class="mt-4">
                    @component('admin.includes.formErrors')
                    @endcomponent
                </div>
            </div>

            <table id="images_list" class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                    @if(!empty($product->images))
                        @foreach($product->images as $i)
                        <tr data-id="{{ $i->id }}">
                            <td>{{ $i->id }}</td>
                            <td>
                                <img width=50 src="{{ $i->path() }}" alt="" title="">
                            </td>
                            <td><a class="btn btn-danger" id="delete_image" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Delete</a></td>
                            <td><input class="m-1" disabled name="images[]" value="{{ $i->name }}" id="profile-img"></td>
                        </tr>
                        @endforeach
                    @endif
              </tbody>
            </table>
            <button id="add_new_image" class="btn btn-primary mt-4"> Add new image </button>
        </form>
    @else
        <div>
            Nothing here
        </div>
    @endif



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/plugins/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/plugins/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script>
            $('textarea').ckeditor();
            $(document).on("click", "a#delete_image", function (e) {
                e.preventDefault();
                let tr = $(this).parents('tr');
                let id = $(this).parents('tr').data('id');
                let url_delete = window.location.hostname + "/image/" + id;

                $.ajax({
                    url: "http://" + url_delete,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    success: function(result) {
                        tr.remove();
                    }
                });
            });

            $('#add_new_image').click(function(e){
                e.preventDefault();
                $('#images_list tbody').append(
                    "<tr>" +
                        "<td><input type='file' name='images[]' id='profile-img'></td>" +
                    "</tr>"
                );
            });
    </script>

    <hr>
    <hr>

@endsection
