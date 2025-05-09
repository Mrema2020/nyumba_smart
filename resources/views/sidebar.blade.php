 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{ url('/') }}" class="logo">
              <img
                src="{{ asset('template/assets/img/kaiadmin/logo_light.svg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
            <li class="nav-item active">
                <a href="{{ url('/') }}">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Modules</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Properties</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{ url('all_properties') }}">
                        <span class="sub-item">All properties</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/buttons.html">
                        <span class="sub-item">Available properties</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/gridsystem.html">
                        <span class="sub-item">Booked properties</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-th-list"></i>
                  <p>Requests</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="sidebar-style-2.html">
                        <span class="sub-item">All requests</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>Locations</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="forms">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{ url('regions') }}">
                        <span class="sub-item">Regions</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ url('districts') }}">
                        <span class="sub-item">Districts</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ url('wards') }}">
                        <span class="sub-item">Ward</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="#">
                  <i class="fas fa-credit-card"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#">
                  <i class="fas fa-file-word"></i>
                  <p>Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#">
                  <i class="fas fa-user"></i>
                  <p>Users</p>
                </a>
              </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#miscellaneous">
                        <i class="fas fa-layer-group"></i>
                        <p>Miscellaneous</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="miscellaneous">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ url('property_categories') }}">
                                    <span class="sub-item">Property category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('view_property_type') }}">
                                    <span class="sub-item">Property type</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('regions') }}">
                                    <span class="sub-item">Regions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->
