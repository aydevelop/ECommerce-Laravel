@extends('layouts.front')

@section('content')



<div class="row-fluid">
            <div class="span12">
                <h1>{{ ucfirst($product->name ) }}</h1>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span8">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"></div>
                        <div class="pull-right"><span class="badge badge-error">{{ count($product->images) }} Images</span></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="row-fluid">
                                @if (count($product->images) === 0)
                                    <div class="span10">
                                        <div class="main-image">
                                            <img src='http://placehold.it/550x400' />
                                        </div>
                                    </div>
                                    <div class="span2 side-images">
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+A' data-src="http://placehold.it/550x400&text=Image+A" /></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+B' data-src="http://placehold.it/550x400&text=Image+B" /></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+C' data-src="http://placehold.it/550x400&text=Image+C" /></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+D' data-src="http://placehold.it/550x400&text=Image+D" /></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+E' data-src="http://placehold.it/550x400&text=Image+E" /></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+F' data-src="http://placehold.it/550x400&text=Image+F" /></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src='http://placehold.it/90x80&text=Image+G' data-src="http://placehold.it/550x400&text=Image+G" /></a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="span10">
                                        <div id="main-image">
                                            <img src="{{ asset('img') . '/' . $product->images[0]->name }}" />
                                        </div>
                                    </div>
                                    <div class="span2 side-images">
                                        @for ($i = 0; $i < count($product->images); $i++)
                                            <div class="row-fluid">
                                            <div class="span12 side-image">
                                                <a href='javascript:;'><img src="{{ asset('img') . '/' .$product->images[$i]->name }}" data-src="{{ asset('img') . '/' .$product->images[$i]->name }}" /></a>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"></div>
                        <div class="pull-right"><span class="badge badge-warning"></span></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <p>
                                <b>Sale Price:  $ {{ $product->price }}</b>
                            </p>

                            <form class="form-inline">
                              <div class="control-group">
                                    <button type="submit" class="btn btn-danger">Add to card</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="block">
                    <div class="navbar navbar-inner block-header navbar-no-padding">
                        <ul class="nav">
                          <li><a href="#description" >Description</a></li>
                        </ul>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="tab-content">
                              <div class="tab-pane active" id="description">
                                 {!! ($product->text) !!}
                              </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <hr>

      @push('scripts')
          <script>
             $('.side-images a img').click(function(e){
                e.preventDefault();

                let scr = $(this).attr('src');
                $('#main-image img').attr('src',scr);
            });
          </script>
      @endpush
@endsection
