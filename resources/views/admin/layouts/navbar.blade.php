  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/" class="nav-link">Homepage</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block @if (Request::is('admin/news')) active @endif">
              <a href="/admin/news" class="nav-link">Berita</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block @if (Request::is('admin/carousels')) active @endif">
              <a href="/admin/carousels" class="nav-link">Carousel</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block  @if (Request::is('admin/penilaian')) active @endif">
              <a href="/admin/penilaian" class="nav-link">Profile</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
              <form action="/logout" method="post">
                  @csrf
                  <button type="input" class="nav-link border-0 bg-transparent">Logout</button>
              </form>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
