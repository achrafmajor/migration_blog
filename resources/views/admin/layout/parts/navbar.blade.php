  <!-- Main navbar -->
  <div class="navbar navbar-expand-lg navbar-dark navbar-static">
      <div class="d-flex flex-1 d-lg-none">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
              <i class="icon-paragraph-justify3"></i>
          </button>
          <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
              <i class="icon-transmission"></i>
          </button>
      </div>
      <div class="navbar-brand text-center text-lg-left">
          <a href="index.html" class="d-inline-block">
              <img src="{{ URL::asset('assets/images/logo_light.png') }}" class="d-none d-sm-block" alt="">
              <img src="{{ URL::asset('assets/images/logo_icon_light.png') }}" class="d-sm-none" alt="">
          </a>
      </div>
      <li class="nav-item nav-item-dropdown-lg dropdown">

      </li>

      <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
          <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
              <img src="{{Auth::user()->image_url}}" class="rounded-pill mr-lg-2" height="34" alt="">
              <span class="d-none d-lg-inline-block">{{Auth::user()->full_name}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <a href="" class="dropdown-item"><i class="icon-user-plus"></i>Mon profil</a>
              <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href=""><i class="icon-switch2"></i>Se déconnecter</a>
              <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
  </div>
  <!-- /main navbar -->
