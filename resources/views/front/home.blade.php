@extends('layouts.front')

@section('content')

@if(!empty($category_name))
    <div style="float:right; margin-right:70px"><b>Category: {{ $category_name }}</b></div>
@endif

@if(isset($search_count))
    <div>
        Found {{$search_count}} products
    </div>
    <br />
@else
    <div style="">
            <a href="?price_up=sort">Sort by Price ▲</a>,
            <a href="?price_down=sort">Sort by Price ▼</a>,
            <a href="?name_up=sort">Sort by Name ▲</a>
            <a href="?name_down=sort">Sort by Name ▼</a>
        </div>
    <br>
@endif

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
                                <p><a href="{{ url('product').'/'.$prod->id }}" class="btn">View</a></p>
                            </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            @endif
        </ul>

      @if(!isset($search))
        <div class="pagination_block">
            {{ $products->links() }}
        </div>
      @endif

@endsection
