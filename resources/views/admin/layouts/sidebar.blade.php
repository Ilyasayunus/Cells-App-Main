  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin" class="brand-link" style="text-decoration: none;">
          <img src="/landing_assets/assets/img/logoUPI.png" alt="AdminLTE Logo" class="brand-image img-box"
              style="opacity: .9">
          <span class="brand-text font-weight-light">CELLS | UPI</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="/admin_assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/news" class="nav-link {{ Request::is('admin/news') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-bullhorn"></i>
                          <p>
                              Berita
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/carousels" class="nav-link {{ Request::is('admin/carousels') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Carousel
                        </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/highlight" class="nav-link {{ Request::is('admin/highlight') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-marker"></i>
                        <p>
                            Highlight
                        </p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="/admin/profile" class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                    
                {{-- </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>
                              Indikator SPBE
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/admin/indikator" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Indikator</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/admin/penilaian" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Penilaian Indikator</p>
                              </a>
                          </li>
                      </ul>
                 </li> --}}
                 {{-- <li class="nav-item">
                              <a href="/admin/grafik" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Grafik Penilaian SPBE</p>
                              </a>
                          </li> --}}
                  {{-- <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Infrastruktur SPBE
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/charts/chartjs.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p></p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/charts/flot.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Flot</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/charts/inline.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Inline</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/charts/uplot.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>uPlot</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
