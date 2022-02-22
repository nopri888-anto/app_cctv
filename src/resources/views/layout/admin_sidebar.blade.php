<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @if(auth()->user()->level == '1')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Area
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.regional')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Regional</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.branch')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Branch</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.outlet')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Outlet</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Aspek
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.aspek')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Aspek</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.scorecard')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Scorecard</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('admin.scorecarditem')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Parameter</p>
                </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{route('admin.bobot')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bobot Nilai</p>
            </a>
        </li>
    </ul>
    </li>


    <li class="nav-item has-treeview">
        <a href="{{route('admin.cam')}}" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>
                Kamera
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Utility
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admin.user')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.employee')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Position Employee</p>
                </a>
            </li>
        </ul>
    </li>

    @elseif(auth()->user()->level == '2')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Monitoring
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('user.live')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Live Streaming</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.offline')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Offline</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                User Management
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penilaian</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('management.teller')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teller</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('management.customer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Customer Service</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('management.satpam')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Satpam</p>
                </a>
            </li>
        </ul>
    </li>
    @endif

    {{-- <li class="nav-item has-treeview">
            <a href="{{route('user.dashboard')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
        Dashboard
    </p>
    </a>
    </li> --}}

    <li class="nav-item has-treeview">
        <a href="{{route('user.report')}}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Report
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="{{route('logout')}}" class="nav-link" onclick="
            event.preventDefault();
            document.getElementById('formLogout').submit();">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Logout
            </p>
        </a>
        <form action="{{ route('logout')}}" method="post" id="formLogout">@csrf</form>
    </li>
    </ul>
</nav>
