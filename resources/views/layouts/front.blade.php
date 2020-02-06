
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap e-Commerce Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/front/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="muted">Store Title</h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="{{ url('products') }}">Home</a></li>

                <li><a href="checkout.html">Checkout <span class="badge badge-important">3</span></a></li>
                <li><a href="new.html">Order Placement</a></li>
                <li><a href="status.html">Order Status</a></li>

                <li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
				    Categories
				    <b class="caret"></b>
				  </a>
				  <ul class="dropdown-menu">
				    <li class="nav-header">Men</li>
				    <li><a href="list.html">Clothes</a></li>
				    <li><a href="list.html">Shoes</a></li>
				    <li><a href="list.html">Watches</a></li>
				    <li><a href="list.html">Jewlery</a></li>
				    <li class="divider"></li>
				    <li class="nav-header">Women</li>
				    <li><a href="list.html">Clothes</a></li>
				    <li><a href="list.html">Shoes</a></li>
				    <li><a href="list.html">Watches</a></li>
				    <li><a href="list.html">Jewlery</a></li>
				  </ul>
				</li>

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
        </div><!-- /.navbar -->
      </div>

      <div class="container">
        @yield('content')
      </div>

      <hr>
      <div class="footer">
        <p>&copy; Company</p>
      </div>
    </div> <!-- /container -->


    @stack('scripts')
  </body>
</html>
