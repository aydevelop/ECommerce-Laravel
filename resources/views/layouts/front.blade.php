
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
          <form method="POST" action="{{ url('search') }}" >
            @csrf
            <div class="input-group md-form form-sm form-2 pl-0" style="float:right">

            <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Type and press enter" aria-label="Search">
            <div class="input-group-append">
                <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                    aria-hidden="true"></i></span>
            </div>
            </div>
          <form>
          <small id="usd" style="float:right; margin:10px; margin-right:50px">USD</small>
            <h3 class="muted">Store Title</h3>
            @include('layouts.partials.nav')
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
    <script>
        $(document).ready(function() {
            $.getJSON("/api/currency", function(data) {
                $("#usd").text("USD: "+data);
            });
        });
    </script>
  </body>
</html>
