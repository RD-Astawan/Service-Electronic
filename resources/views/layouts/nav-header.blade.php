<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg">		
    <div class="container-fluid">
        <h1 style="color:white;">Wahyu Service Elektronik</h1>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg"><img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
                            <div class="u-text">
                                <h4>{{ Auth::user()->nama }}</h4>
                                <p class="text-muted">{{ Auth::user()->level }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="
                        event.preventDefault();
                        document.getElementById('formlogout').submit();"
                        ><i class="fa fa-lock"></i> Logout</a>
                        <form id="formlogout" action="{{ route('logout') }}" method="post">@csrf</form>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>
<!-- End Navbar -->