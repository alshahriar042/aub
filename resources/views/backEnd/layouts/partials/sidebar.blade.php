<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('backEnd/assets/img/aub.png') }}" class="header-logo" /> <span
            class="logo-name">AUB</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Authorization</li>
        {{-- @if (Auth::user()->hasPermission('roles.index')) --}}
            <li class="dropdown">
                <a href="{{ route('roles.index') }}" class="menu-toggle nav-link">
                    <i data-feather="sliders"></i><span>Roles and Permission</span></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a class="nav-link" href="{{ route('roles.create') }}">New Roles</a></li> --}}
                </ul>
            </li>
            {{-- @endif --}}

        {{-- @if (Auth::user()->hasPermission('users.index')) --}}
        <li class="dropdown">
            <a href="{{ route('users.index') }}" class="menu-toggle nav-link">
                <i data-feather="users"></i><span>Users</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>
        {{-- @endif --}}

        <li class="menu-header">Academic</li>

        <li class="dropdown">
            <a href="{{ route('courses.index') }}" class="menu-toggle nav-link">
                <i data-feather="life-buoy"></i><span>Courses</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>

        <li class="dropdown">
            <a href="{{ route('advised.index') }}" class="menu-toggle nav-link">
                <i data-feather="heart"></i><span>Advised Course</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>


        <li class="dropdown">
            <a href="{{ route('advised.create') }}" class="menu-toggle nav-link">
                <i data-feather="heart"></i><span>Advising</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>

        <li class="menu-header">LookUp</li>

        <li class="dropdown">
            <a href="{{ route('departments.index') }}" class="menu-toggle nav-link">
                <i data-feather="briefcase"></i><span>Department</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>

        <li class="dropdown">
            <a href="{{ route('batchs.index') }}" class="menu-toggle nav-link">
                <i data-feather="package"></i><span>Batch</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>

        <li class="dropdown">
            <a href="{{ route('semesters.create') }}" class="menu-toggle nav-link">
                <i data-feather="package"></i><span>Semester setup</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>

      </ul>
    </aside>
  </div>
