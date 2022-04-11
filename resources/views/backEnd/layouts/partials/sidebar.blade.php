<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('backEnd/assets/img/aub.png') }}" class="header-logo" /> <span
            class="logo-name">AUB</span>
        </a>
      </div>
      <ul class="sidebar-menu">

        @if (Auth::user()->hasPermission('dashboard'))
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->hasPermission('roles.index') || Auth::user()->hasPermission('users.index'))
            <li class="menu-header">Authorization</li>
        @endif
        @if (Auth::user()->hasPermission('roles.index'))
            <li class="dropdown">
                <a href="{{ route('roles.index') }}" class="menu-toggle nav-link">
                    <i data-feather="sliders"></i><span>Roles and Permission</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->hasPermission('users.index'))
            <li class="dropdown">
                <a href="{{ route('users.index') }}" class="menu-toggle nav-link">
                    <i data-feather="users"></i><span>Users</span>
                </a>
            </li>
        @endif

        <li class="menu-header">Academic</li>

        <li class="dropdown">
            <a href="{{ route('courses.index') }}" class="menu-toggle nav-link">
                <i data-feather="life-buoy"></i><span>Courses</span>
            </a>
        </li>

        <li class="dropdown">
            <a href="{{ route('advised.index') }}" class="menu-toggle nav-link">
                <i data-feather="heart"></i><span>My Courses</span>
            </a>
        </li>


        <li class="dropdown">
            <a href="{{ route('advised.create') }}" class="menu-toggle nav-link">
                <i data-feather="heart"></i><span>Advising</span>
            </a>
        </li>

        @if (Auth::user()->hasPermission('departments.index') || Auth::user()->hasPermission('batchs.index'))
            <li class="menu-header">LookUp</li>
        @endif

        @if (Auth::user()->hasPermission('departments.index'))
            <li class="dropdown">
                <a href="{{ route('departments.index') }}" class="menu-toggle nav-link">
                    <i data-feather="briefcase"></i><span>Department</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->hasPermission('batchs.index'))
            <li class="dropdown">
                <a href="{{ route('batchs.index') }}" class="menu-toggle nav-link">
                    <i data-feather="package"></i><span>Batch</span>
                </a>
            </li>
        @endif

      </ul>
    </aside>
  </div>
