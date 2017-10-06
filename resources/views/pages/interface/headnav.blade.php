<nav class="navbar navbar-default" style="border-radius:0px;margin-bottom:0px">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('user')}}">LokMov</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav" style="border-radius:0px;">
        <li><a data-toggle="modal" data-target="#feedback"><span class="glyphicon glyphicon-bullhorn"></span> <span class="">Feedback</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          @if(\Session::has('sale'))
            
          @else
             <li><a href="{{url('logout')}}">Logout</a></li>
          @endif
      </ul>
    </div>
  </div>
</nav>