<div class="main-header">

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center" style="padding: 1rem;">
              <li class="nav-item topbar-user dropdown hidden-caret">
                <a
                  class="dropdown-toggle profile-pic"
                  data-bs-toggle="dropdown"
                  href="#"
                  aria-expanded="false"
                >
                  <div class="avatar-sm">
                    <img
                      src="{{ asset('template/assets/img/profile.jpg') }}"
                      alt="..."
                      class="avatar-img rounded-circle"
                    />
                  </div>
                  <span class="profile-username">
                    <span class="op-7">Hi,</span>
<<<<<<< HEAD
                    <span class="fw-bold">{{ Auth::user()->name }}</span>
=======
                    <span class="fw-bold">Elvis</span>
>>>>>>> b40b475f52ae99d7ae688fdd55907378854c6dc0
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                      <div class="user-box">
                        <div class="avatar-lg">
                          <img
                            src="{{ asset('template/assets/img/profile.jpg') }}"
                            alt="image profile"
                            class="avatar-img rounded"
                          />
                        </div>
                        <div class="u-text">
<<<<<<< HEAD
                          <h4>{{ Auth::user()->name }}</h4>
                          <p class="text-muted">{{ Auth::user()->email }}</p>
                          <form action="{{ route('logout') }}" method="POST">
                            @csrf
                          <button type="submit" class="btn btn-danger">Logout</button>
                          </form>
=======
                          <h4>Elvis</h4>
                          <p class="text-muted">hello@example.com</p>
                          <a
                            href="profile.html"
                            class="btn btn-xs btn-secondary btn-sm"
                            >View Profile</a
                          >
>>>>>>> b40b475f52ae99d7ae688fdd55907378854c6dc0
                        </div>
                      </div>
                    </li>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
