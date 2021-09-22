<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-dark navbar-static">
    <div class="navbar-brand ml-2 ml-lg-0">
        <a href="index.html" class="d-inline-block">
            <img src="../../../../global_assets/images/logo_light.png" alt="">
        </a>
    </div>
    <div class="d-flex justify-content-end align-items-center ml-auto">
        <ul class="navbar-nav flex-row">
      
            <li class="nav-item">
                <a href="{{route('password.request')}}" class="navbar-nav-link">
                    <i class="icon-user-plus"></i>
                    <span class="d-none d-lg-inline-block ml-2">Mot De Passe Oublié?</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('login')}}" class="navbar-nav-link">
                    <i class="icon-user-lock"></i>
                    <span class="d-none d-lg-inline-block ml-2">Connexion</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->