<div class="navbar">
    <div class="navbar-inner">
    <div class="container">
        <ul class="nav">
        <li ><a href="{{ url('products') }}">Home</a></li>

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

        <li><a href="{{ url('checkout') }}">Checkout <span class="badge badge-important">{{ $cart_items }}</span></a></li>
        <li><a href="new.html">Order Placement</a></li>
        <li><a href="status.html">Order Status</a></li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Pages
            <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
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
