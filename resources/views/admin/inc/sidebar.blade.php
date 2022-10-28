<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard/show_categories') }}">
          <i class="icon-grid ti-list"></i><span> </span>
          <span class="menu-title">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard/show_trainers') }}">
          <i class="icon-grid ti-user"></i>
          <span class="menu-title">Trainers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard/show_courses') }}">
          <i class="icon-grid ti-book"></i>
          <span class="menu-title">Courses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard/show_students') }}">
          <i class="icon-grid ti-user"></i>
          <span class="menu-title">Students</span>
        </a>
      </li>
    </ul>
  </nav>
