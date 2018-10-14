<!DOCTYPE html>
<html style=" background-color:white;">
<head>
  <title>Merciano</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body id="top" >
  <div class="bgded overlay"> 
    <div class="wrapper">
    </div>
      <div class="wrapper row1" style="position:fixed; opacity:0.8; top:0; background-color:black;">
        <header id="header" class="hoc clear">
          <div id="logo" class="fl_left">
            <h1>Merciano</h1>
          </div>
          <nav id="mainav" class="fl_right" >
            <ul class="clear">
              @if (Auth::check())
                <li><a href="{{ url('/products') }}">Home</a></li>  
              @if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2)
                <li><a href="{{ url('/my_products') }}">My products</a></li>
              @endif
              @if(Auth::user()->user_type_id == 1)
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              @endif
                <li><a href="{{ url('/orders') }}">Show Orders</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;height: 110px;">
                      <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px;  left:10px; border-radius:50%">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <br>
                      <li>
                        <a href="{{ url('/profile')}}" style="text-align:center; color: white; background-color:black; margin-left: 47px;" >
                          Profile
                        </a>
                      </li>
                      <br>
                      <br>
                      <li>
                        <a href="{{ url('/logout') }}" style="text-align:center; color: white; background-color:black;margin-left: 47px;">
                          </i>Logout
                        </a>
                      </li>
                  </ul>
              </li>
                      @else
                        <li>
                          <a href="{{ url('/login') }}">
                            Login
                          </a>
                        </li>
                        <li>
                          <a href="{{ url('/register') }}">
                            Register
                          </a>
                        </li>
                      @endif
            </ul>
          </nav>
        </header>
      </div>
    </div>

        @yield('content')

    <div class="wrapper row5" style="margin-top:380px;">
      <div id="copyright" class="hoc clear"> 
        <p class="fl_left">
          Copyright &copy; 2016 - All Rights Reserved - 
          <a href="#">
            Domain Name
          </a>
        </p>
        <p class="fl_right">
          Template by 
          <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">
            OS Templates
          </a>
        </p>
      </div>
    </div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="layout/scripts/gmaps.js"></script>
</body>
</html>