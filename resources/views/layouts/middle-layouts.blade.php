<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="theme-color" content="#FFFFFF">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito|Roboto">
  <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
  <link rel="stylesheet" href="{{asset('middle-assets/css/themes/comfort.min.css')}}" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap-grid.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  @yield('style')
</head>

<body>
  <div class="sidebar">
    <div class="sidebar-header">
      <span class="brand"><small>{{Auth::user()->name}}</small></span>
      <div class="sidebar-control"><i class="la la-navicon"></i></div>
    </div>
    <div class="sidebar-wrapper">
      <ul class="list-menu">
        <li class="header">NAVIGASI</li>
        <li class="has-children">
        <a href="/middle"><i class="la la-dashboard"></i><span>Dashboards</span></a>
        </li>

        <li class="has-children">
        <a href="/donasi"><i class="la la-dashboard"></i><span>Donasi</span></a>
        </li>
         
        <li class="has-children"><a href="{{route('program.create')}}"><i class="la la-dashboard"></i><span>Buat Program Baru</span></a></li>

        <li class="has-children"><a href="{{route('program.index')}}"><i class="la la-pencil"></i><span>Daftar Program</span></a></li>

      </ul>
    </div>
  </div>
  <div class="main-content">
    <div class="header">
      <div class="left">
        <span><strong>@yield('title')</strong></span>
      </div>
      <ul class="right">
        <li class="header-user dropdown ml-4 mr-3"><a class="user-photo trigger-dropdown"><img class="user-img" src="{{asset('back-assets/assets/images/users/4.jpg')}}" /></a>
          <div class="dropdown-box with-header">
            <div class="dropdown-header"><img class="user-img user-img--lg" src="{{asset('back-assets/assets/images/users/4.jpg')}}" />
              <div class="user-info">
                <h3>{{Auth::user()->name}}</h3><span class="helper-text">{{Auth::user()->email}}</span>
              </div>
            </div>
            <ul class="dropdown-body">
              <li><a href="#" target="_blank"><i class="la la-user"></i><span>My profile</span></a></li>
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 <i class="la la-power-off"></i><span>Log out</span></a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                </li>
            </ul>
          </div>
        </li>
      </ul>
      <div class="right--mobile"><a class="header-item--mobile sidebar-control"><i class="la la-navicon"></i></a></div>
    </div>
    <div class="content-wrapper">
      <div class="container-fluid">
        
        @yield('content')

      </div>
    </div>
  </div>
  <script src="{{asset('middle-assets/js/main.min.js')}}"></script>
  <script src="{{asset('middle-assets/js/chartDemoWidget.min.js')}}"></script>
  <script src="{{asset('back-assets/assets/libs/tinymce/tinymce.min.js')}}"></script>
  @yield('script')
  @include('sweetalert::alert')

</body>

</html>