<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
      <!-- Header -->
<header class="dt-header">

  <!-- Header container -->
  <div class="dt-header__container">

    <!-- Brand -->
    <div class="dt-brand">

      <!-- Brand tool -->
      <div class="dt-brand__tool" data-toggle="main-sidebar">
        <div class="hamburger-inner"></div>
      </div>
      <!-- /brand tool -->

      <!-- Brand logo -->
      <span class="dt-brand__logo">
        <a class="dt-brand__logo-link" href="{{route('home')}}">
          <img class="d-sm-inline-block" width="150" src="{{asset('assets/img/logo/logo.png')}}" alt="{{config('app.name')}}">
        </a>
      </span>
      <!-- /brand logo -->

    </div>
    <!-- /brand -->

    <!-- Header toolbar-->
    <div class="dt-header__toolbar">
      <!-- Header Menu Wrapper -->
      <div class="dt-nav-wrapper">

    

     

        <!-- Header Menu -->
        <ul class="dt-nav">
          <li class="dt-nav__item dropdown">

            <!-- Dropdown Link -->
            <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="dt-avatar size-30" src="{{asset('assets/img/user.png')}}" alt="">
              <span class="dt-avatar-info d-none d-sm-block">
                <span class="dt-avatar-name"> {{ Auth::user()->name }} <i class="icon icon-chevrolet-down icon-fw icon-lg"></i></span>
              </span> </a>
            <!-- /dropdown link -->

            <!-- Dropdown Option -->
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dt-avatar-wrapper flex-nowrap p-6 mt-n2 bg-gradient-purple text-white rounded-top">
                <img class="dt-avatar" src="{{asset('assets/img/user.png')}}" alt="">
                <span class="dt-avatar-info">
                  <span class="dt-avatar-name"> {{ Auth::user()->name }}</span>
                  <span class="f-12"> {{ Auth::user()->accesslevel }}</span>
                </span>
              </div>
              <a class="dropdown-item" href="javascript:void(0)"> <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Profile
              {{-- </a> <a class="dropdown-item" href="javascript:void(0)">
                <i class="icon icon-settings icon-fw mr-2 mr-sm-1"></i>Setting </a> --}}
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="icon icon-editors icon-fw mr-2 mr-sm-1"></i>Logout
              </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
            <!-- /dropdown option -->

          </li>
        </ul>
        <!-- /header menu -->
      </div>
      <!-- Header Menu Wrapper -->

    </div>
    <!-- /header toolbar -->

  </div>
  <!-- /header container -->

</header>
<!-- /header -->


 <!-- Site Main -->
        <main class="dt-main">
          <!-- Sidebar -->
<aside id="main-sidebar" class="dt-sidebar">
    <div class="dt-sidebar__container">

        <!-- Sidebar Navigation -->
        <ul class="dt-side-nav">

            <!-- Menu Header -->
            <li class="dt-side-nav__item dt-side-nav__header">
                <span class="dt-side-nav__text">main</span>
            </li>
            <!-- /menu header -->

            <!-- Menu Item -->
            <li class="dt-side-nav__item {{ (request()->segment(1) == 'home') ? 'selected' : '' }}">
                <a href="{{url('/home')}}" class="dt-side-nav__link "  title="Dashboard">
                    <i class="icon icon-dashboard icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Dashboard</span>
                </a>
            </li>
      
            <li class="dt-side-nav__item {{ (request()->segment(1) == 'access') ? 'selected' : '' }}">
                <a href="{{route('access.index')}}" class="dt-side-nav__link " title="Access Level">
                    <i class="icon icon-metrics icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Access Level</span>
                </a>
            </li>
            <li class="dt-side-nav__item {{ (request()->segment(1) == 'users') ? 'selected' : '' }}">
                <a href="{{route('users.index')}}" class="dt-side-nav__link" title="User Management">
                    <i class="icon icon-layout icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">User Management</span>
                </a>
            </li>
                  <li class="dt-side-nav__item">
                <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="">
                    <i class="icon icon-widgets icon-fw icon-lg"></i>
                    <span class="dt-side-nav__text">Nav with sub</span>
                </a>

                <!-- Sub-menu -->
                <ul class="dt-side-nav__sub-menu">
                    <li class="dt-side-nav__item">
                        <a href="" class="dt-side-nav__link" title="">
                            <i class="icon icon-components icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text"> Sub one</span>
                        </a>
                    </li>


                    <li class="dt-side-nav__item">
                        <a href="#" class="dt-side-nav__link" title="Modern">
                            <i class="icon icon-datatable icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Sub Two</span>
                        </a>
                    </li>
                </ul>
                <!-- /sub-menu -->

            </li>
            <!-- /menu item -->
        </ul>
        <!-- /sidebar navigation -->

    </div>
</aside>
<!-- /sidebar -->