@extends('layouts.front')

@section('content')

<div class="row-fluid">
    <div class="span12">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">My Cart</div>
                <div class="pull-right"><span class="muted">small message</span></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        @if(!empty($cart_items))
                            @foreach($cart_items as $item)
                            <tr>
                                @if (count($item->model->images) === 0)
                                    <td class="span1"><a href="{{ url('product').'/'.$item->model->id }}"><img src="http://placehold.it/50x50&amp;text=Image+A"></a></td>
                                @else
                                    <td class="span1"><a href="{{ url('product').'/'.$item->model->id }}"><img src="{{ asset('img') . '/' .$item->model->images[0]->name }}"></a></td>
                                @endif
                                <td class="span5">
                                    <a href="{{ url('product').'/'.$item->model->id }}">{{ ucfirst($item->name) }}</a>

                                </td>
                                <td class="span2">$ {{ $item->price }}</td>
                                <td class="span2">
                                    <div class="row-fluid">
                                        <div class="span5">
                                        <form method="POST" action="{{ url('card') }}" >
                                        </form>
                                        <form method="POST" action="{{ url('card') }}" >
                                            @csrf
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="id" value="{{ $item->id }}" />
                                            <input type="hidden" name="product_id" value="{{ $item->model->id }}" />
                                            <button type="submit" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody></table>
                    <hr>
                    <div class="row-fluid">
                        <div class="span6"></div>
                        <div class="span6"><b>
                        Total: ${{ $total }}
                        @if(!empty($uah))
                            (UAH: {{ $uah }})
                        @endif
                        </b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row-fluid">
      	<div class="span6">
      		<div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Shipping Information</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form class="form-horizontal">
                        <form method="POST" action="{{ url('orderCreate') }}" >
                            @csrf
                            </form>
                            <form method="POST" action="{{ url('orderCreate') }}" >
                            @csrf
                          <div class="control-group">
                                <label for="email">Email Address <span class="text-error">*</span></label>
                                <input value="{{ Auth::user()->email }}" disabled type="text" id="email" value="" placeholder="Email Address">
                          </div>

                          <div class="control-group">
                                <label for="name">Name <span class="text-error">*</span></label>
                                <input value="{{ Auth::user()->name }}" disabled type="text" id="name" value="" value="" placeholder="Full Name">
                          </div>

                          <div class="control-group">
                                <label for="phone">Phone Number<span class="text-error">*</span></label>
                                <div class="row-fluid">

                                  <div class="span7">
                                    <input type="text" id="phone"  name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="input-medium">

                                  </div>
                                </div>
                          </div>

                          <div class="control-group">
                                <label for="street">Addresses<span class="text-error">*</span></label>
                                <input type="text" id="street" value="{{ old('addresses') }}" name="addresses" value="" placeholder="Addresses">
                          </div>

                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 error">
                                    <ul style="padding-left:20px; color:red">
                                        @foreach($errors->all() as $error)
                                            <li> {{$error}} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      	</div>
      </div>


      @endsection
