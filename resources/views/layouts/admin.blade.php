<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Open Graph Meta-->
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Vali Admin - Free Bootstrap 4 Admin Template < {{ Route::currentRouteName() }} > @ </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_custom.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ URL('admin') }}">Vali</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        @if((Route::currentRouteName() == "posts.index") OR (Route::currentRouteName() == "posts.filter"))
          <li class="app-search">
            <form method="POST" action="{{ url('admin/posts/filter') }}">
              @csrf
              <input class="app-search__input" type="search" name="name" placeholder="Search">
              <button type="submit" class="app-search__button"><i class="fa fa-search"></i></button>
            </form>
          </li>
        @endif
        <!--Notification Menu-->
        {{-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> --}}
        <!-- User Menu-->
        {{-- <li class="dropdown">
          <a class="app-nav__item"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"
           href="#" aria-label="Open Profile Menu">
            <i class="fa fa-sign-out fa-lg"></i>
          </a>
        </li> --}}
        <li class="dropdown">
            <a class="app-nav__item"
              href="{{ URL('logout') }}" aria-label="Open Profile Menu">
              <i class="fa fa-sign-out fa-lg"></i>
            </a>
         </li>
      </ul>
    </header>
{{--
    <form id="logout-form" action="{{ route('logout') }}"
    mathod="POST" style="display:none">
      @csrf
    </form> --}}

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('img/avatar.png') }}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">{{ Auth::user()->email }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{ URL('/') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Site</span></a></li>

        <li><a class="app-menu__item {{ (request()->is('admin/products') or request()->is('admin/products/create')) ? 'active' : '' }}" href="{{ URL('admin/products') }}"><i class="app-menu__icon fa fa-bar-chart"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('admin/categories') or request()->is('admin/categories/*/edit')) ? 'active' : '' }}" href="{{ URL('admin/categories') }}"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Categories</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('admin/users') or request()->is('admin/users/create') or request()->is('admin/users/*/edit')) ? 'active' : '' }}"  href="{{ URL('admin/users') }}"><i class="app-menu__icon fa fa-line-chart"></i><span class="app-menu__label">Users</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('admin/orders')) ? 'active' : '' }}"  href="{{ URL('admin/orders') }}"><i class="app-menu__icon fa fa-crop"></i><span class="app-menu__label">Orders</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('admin/callbacks')) ? 'active' : '' }}" href="{{ URL('admin/callbacks') }}"><i class="app-menu__icon fa fa-snowflake-o"></i><span class="app-menu__label">Callback</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('admin/stat')) ? 'active' : '' }}" href="{{ URL('admin/stat') }}"><i class="app-menu__icon fa fa-bar-chart"></i><span class="app-menu__label">Statistics</span></a></li>
      </ul>
    </aside>
    <main class="app-content">

        @yield('content')

        @if(Session::has('flash_admin'))
          <div class="flash_message">
              <div class="flash_message_text">
                  {{ Session('flash_admin') }}
              </div>
          </div>
        @endif

	</main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/admin_custom.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="{{ asset('text/javascript" src="js/plugins/chart.js') }}"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]

      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);

      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
  </body>
</html>
