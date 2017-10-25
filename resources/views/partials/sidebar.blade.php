<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      
      <p class="centered">
        <a href="{{ url('admin/manage/admin/usereditpassword') }}"><img src="{{ url('assets/img/roles/'.Auth::user()->role_id.'.png') }}" class="img-circle" width="60"></a>
      </p>
      <h5 class="centered">
        <a href="{{ url('admin/manage/admin/useredit') }}" style="color: #fff;">{{ Auth::user()->username }}</a>
      </h5>
      
      <li class="mt">
        <a href="{{  url('admin/manage/dashboard') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-users"></i>
          <span>Manage</span>
        </a>
        <ul class="sub">
        @if(Auth::user()->role_id == 1)
          <li><a  href="{{ url('admin/manage/admin') }}">Admins</a></li>
        @endif
        @if(Auth::user()->role_id != 3)
          <li><a  href="{{ url('admin/manage/operator') }}">Operators</a></li>
        @endif
          <li><a  href="{{ url('admin/manage/student') }}">Students</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-bar-chart-o"></i>
          <span>Status</span>
        </a>
        <ul class="sub">
        @if(\Auth::user()->role_id != 3)
          <li>
            <a  href="{{ url('admin/manage/feedback') }}">
              <span>Feedbacks</span>
              <span class="badge bg-theme03">{{\App\Feedback::all()->count()}}</span>
            </a>
          </li>
          <li>
            <a  href="{{ url('admin/manage/transaction') }}">
              <span>Transactions</span>
            </a>
          </li>
        @endif
          <li>
            <a  href="{{ url('admin/manage/statstudent') }}">
              <span>Students</span>
            </a>
          </li>
        </ul>
      @if(Auth::user()->role_id != 3)
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-gear"></i>
          <span>Settings</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/course') }}">Courses</a></li>
          <li><a  href="{{ url('admin/manage/division') }}">Divisions</a></li>
          <li><a  href="{{ url('admin/manage/step') }}">Steps</a></li>
          <li><a  href="{{ url('admin/manage/grade') }}">Grades</a></li>
        </ul>
      </li>
      @endif
      @if(Auth::user()->role_id != 3)
      <li class="sub-menu">
        <a href="{{ url('admin/manage/price') }}" >
          <i class="fa fa-bookmark-o"></i>
          <span>Price</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->role_id == 3)
      <li>
        <a  href="{{ url('admin/manage/feedback/create') }}">
          <i class="fa fa-pencil"></i>
          <span>Feedbacks</span>
        </a>
      </li>
      @endif
      <li class="sub-menu">
        <a href="{{ url('admin/manage/pay') }}" >
          <i class="fa fa-money"></i>
          <span>Pay</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="{{ url('admin/manage/guide') }}" >
          <i class="fa fa-book"></i>
          <span>Guides</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="{{ url('admin/manage/about') }}" >
          <i class="fa fa-info-circle"></i>
          <span>About</span>
        </a>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->