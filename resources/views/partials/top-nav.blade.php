<header class="header black-bg" id="#top">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="" class="logo"><b>{{\Auth::user()->roles()->first()->role_name}}</b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ url('logout') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->