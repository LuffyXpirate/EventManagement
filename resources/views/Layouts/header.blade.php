<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="../../dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow"
                        alt="User Image" />
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="../../dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow"
                            alt="User Image" />
                        <p>
                            Web Developer
                            <small>Member since Nov. 2023</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ url('logout') }}" class="btn btn-default btn-flat float-end">logout</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <span class="brand-text fw-light">{{ Auth::user()->name }}</span>
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                @if (auth::user()->user_type == 'admin')
                    <li class="nav-item menu-open">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link active">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>
               
                    <li class="nav-item menu-open">
                        <a href="{{ route('admin.users.index') }}" class="nav-link active">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>
                                Manage Users
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-open">
                        <a href="{{ route('admin.organizers.index') }}" class="nav-link active">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>
                                Manage Organizer
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-open">
                        <a class="nav-link" href="{{ route('admin.events.eventindex') }}">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>
                                Manage Events
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>


                    @elseif (auth::user()->user_type == 'organizer')
                    <li class="nav-item menu-open">
                        <a href="{{ url('/organizer/dashboard') }}" class="nav-link active">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>
                
                    <li class="nav-item menu-open">
                        <a href="{{ route('organizer.events.create') }}" class="nav-link active">
                            <i class="nav-icon bi bi-calendar-plus"></i>
                            <p>
                                Create Event
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>

                    
                
                    <li class="nav-item menu-open">
                        <a href="{{ route('organizer.events.index') }}" class="nav-link active">
                            <i class="nav-icon bi bi-calendar-check"></i>
                            <p>
                                My Events
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                    </li>
                @endif
                
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
