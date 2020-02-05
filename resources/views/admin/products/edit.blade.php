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
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="filename">Movie picture</label>
                        <div>
                            <img src=""
                            id="profile-img-tag" width="295px" />
                        </div>
                        <input class="m-1" type="file" name="file" id="profile-img">
                    </div>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-9">
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
                                Edit product
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

            function readURL(input){
                if(input.files && input.files[0]){
                    var fr = new FileReader();
                    fr.onload = function(e){
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    fr.readAsDataURL(input.files[0]);
                }
            }

            $('#profile-img').change(function(){
                readURL(this);
            });

    </script>

            <hr>
    <div class="row">
        <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Dropzone</h3>
              <p><a class="btn btn-primary icon-btn" href="https://gitlab.com/meno/dropzone" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
            </div>
            <div class="tile-body">
              <p>This plugin can be used to let the user Drag and Drop files for upload in a easy way.</p>
              <h4>Demo</h4>
              <form class="text-center dropzone" method="POST" enctype="multipart/form-data" action="/file-upload">
                <div class="dz-message">Drop files here or click to upload<br><small class="text-info">(This is just a dropzone demo. Selected files are not actually uploaded.)</small></div>
              </form>
            </div>
          </div>
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/dropzone.js"></script>
    <script type="text/javascript">
      $('#sl').on('click', function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });

      $('#el').on('click', function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });

      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });

      $('#demoSelect').select2();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    </div>

@endsection
