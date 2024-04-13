<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('dashboard.home') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('vendor/rocket/themes/able/assets/images/logo-dark.svg') }}" class="img-fluid logo-lg" alt="logo" style="height: 50px">
                <span class="badge bg-light-success rounded-pill ms-2 theme-version">v1.0</span>
            </a>
        </div>
        <div class="navbar-content">

            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('vendor/rocket/themes/able/assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle"/>
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0">{{ $user->first_names }}</h6>
                            <small>{{ $user->roles->first()->display_name }}</small>
                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="{{ route('dashboard.client.profile') }}">
                                <i class="ti ti-user"></i>
                                <span>Mi Cuenta</span>
                            </a>
                            <a href="#!">
                                <i class="ti ti-settings"></i>
                                <span>Ajustes</span>
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="ti ti-power"></i>
                                <span>Cerrar sesión</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar">
                <!-- Menu del usuario -->
                <li class="pc-item pc-caption">
                    <label>Navegación</label>
                </li>

                @if($user->hasRole('client') || $user->hasRole('administrator'))
                    <li class="pc-item">
                        <a href="{{ route('dashboard.client.profile') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-duotone fa-user pc-icon"></i>
                            </span>
                            <span class="pc-mtext">Mi cuenta</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.client.loans') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-duotone fa-hands-holding-dollar pc-icon"></i>
                            </span>
                            <span class="pc-mtext">Mis prestamos</span>
                        </a>
                    </li>
                @endif

                @if($user->hasRole('administrator'))
                    <!-- Menu del administrador -->
                    <li class="pc-item pc-caption">
                        <label>Administración</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-duotone fa-chart-simple pc-icon"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('dashboard.user.*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.user.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-duotone fa-user-group-simple pc-icon"></i>
                            </span>
                            <span class="pc-mtext">Usuarios</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.loan.index') }}" class="pc-link ">
                            <span class="pc-micon">
                                <i class="fa-duotone fa-hands-holding-dollar pc-icon"></i>
                            </span>
                            <span class="pc-mtext">Prestamos</span>
                        </a>
                    </li>
                @endif

                @if($user->hasRole('administrator'))
                    <!-- Menu del sitema -->
                    <li class="pc-item pc-caption">
                        <label>Sitemas</label>
                        <svg class="pc-icon">
                            <use xlink:href="#custom-presentation-chart"></use>
                        </svg>
                    </li>

                    <li class="pc-item">
                        <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fa-duotone fa-list-tree pc-icon"></i>
                        </span>
                            <span class="pc-mtext">Parámetros</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fa-duotone fa-binary pc-icon"></i>
                        </span>
                            <span class="pc-mtext">Roles</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>