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
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="briefcase"></i><span>Courses</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('course.index') }}">Course</a></li>
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
                <i data-feather="briefcase"></i><span>Batch</span></a>
            <ul class="dropdown-menu">
            </ul>
        </li>

        {{-- <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="briefcase"></i><span>Widgets</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
            <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Apps</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="chat.html">Chat</a></li>
            <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
            <li><a class="nav-link" href="blog.html">Blog</a></li>
            <li><a class="nav-link" href="calendar.html">Calendar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Email</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
            <li><a class="nav-link" href="email-compose.html">Compose</a></li>
            <li><a class="nav-link" href="email-read.html">read</a></li>
          </ul>
        </li>
        <li class="menu-header">UI Elements</li> --}}

      </ul>
    </aside>
  </div>
