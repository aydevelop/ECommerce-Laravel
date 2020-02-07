<div class="navbar">
    <div class="navbar-inner">
    <div class="container">
        <ul class="nav">
        <li ><a href="{{ url('products') }}">Products</a></li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Categories
            <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
            @if(!empty($categories))
                @foreach($categories as $category)
                    <li><a href="{{ url('products') . '/' . $category->id }}">{{ ucfirst($category->name) }}</a></li>
                @endforeach
            @endif
            </ul>
        </li>

        <li><a href="{{ url('checkout') }}">Checkout <span class="badge badge-important">@if(!empty($cart_items)) {{ $cart_items }} @endif</span></a></li>
        <li><a href="{{ url('orders') }}">Orders</a></li>

        @if (Auth::check())
            <li><a href="{{ url('account') }}">Account</a></li>
        @else
            <li><a href="{{ url('login') }}">Login</a></li>
        @endif


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Pages
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="{{ url('contactus') }}">Contact Us</a></li>
            <li><a href="{{ url('aboutus') }}">About Us</a></li>
            </ul>
        </li>

        </ul>
    </div>
</div>

<div>
    <!-- <br />
    @if(!empty($category_name))
        <h5>Category: {{ ucfirst($category_name) }}</h5>
    @endif -->
</div>
