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
                        <p>Aspek Utama</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.scorecard')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Aspek Item</p>
                    </a>
                </li>
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
            <a href="{{route('admin.user')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    User Utility
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Report
                </p>
            </a>
        </li>
    </ul>
</nav>
