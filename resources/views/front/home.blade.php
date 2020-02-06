@extends('layouts.front')

@section('content')


<!-- Example row of columns -->
<div class="row-fluid">
        <ul class="thumbnails">
            @if(!empty($products))
                @foreach($products as $prod)
                    <div class="products-home-list">
                        <li class="span4">
                            <div class="thumbnail">
                            @if (count($prod->images) === 0)
                                <img alt="300x200" src="http://placehold.it/300x200">
                            @else
                                <img src="{{ asset('img') . '/' . $prod->images[0]->name }}" />
                            @endif
                            <div class="caption">
                                <h3>{{ ucfirst($prod->name) }}</h3>
                                <p>{!! Str::limit($prod->text, 140) !!}</p>
                                <p><a href="checkout.html" class="btn btn-primary">Add To Cart</a> <a href="{{ url('products').'/'.$prod->id }}" class="btn">View</a></p>
                            </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            @endif
        </ul>

      <div class="pagination_block">
        {{ $products->links() }}
      </div>

@endsection
