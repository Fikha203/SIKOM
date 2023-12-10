<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="/dashboard"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ asset('assets/compiled/jpg/1.jpg') }}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">{{ auth()->user()->level }}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="/users/{{ auth()->user()->id }}">My Account</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class='menu-link'>
                        <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/pengajuan*') ? 'active' : '' }}">
                    <a href="/dashboard/pengajuans" class='menu-link'>
                        <span><i class="bi bi-stack"></i> Pengajuan</span>
                    </a>
                </li>


                {{-- @can('staff')
                    <li class="menu-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
                        <a href="#" class='menu-link'>
                            <span><i class="bi bi-file-earmark-medical-fill"></i>Users</span>
                        </a>

                    </li>
                @endcan --}}



                {{-- <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-table"></i> Table</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">


                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="table.html" class='submenu-link'>Table</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="table-datatable.html" class='submenu-link'>Datatable</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="table-datatable-jquery.html" class='submenu-link'>Datatable (jQuery)</a>


                                </li>

                            </ul>


                        </div>
                    </div>
                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-plus-square-fill"></i> Extras</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">


                            <ul class="submenu-group">

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Widgets</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-widgets-chatbox.html" class="subsubmenu-link">Chatbox</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-widgets-pricing.html" class="subsubmenu-link">Pricing</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-widgets-todolist.html" class="subsubmenu-link">To-do List</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Icons</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-icons-bootstrap-icons.html" class="subsubmenu-link">Bootstrap
                                                Icons </a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-icons-fontawesome.html" class="subsubmenu-link">Fontawesome</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-icons-dripicons.html" class="subsubmenu-link">Dripicons</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Charts</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-chart-chartjs.html" class="subsubmenu-link">ChartJS</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-chart-apexcharts.html" class="subsubmenu-link">Apexcharts</a>
                                        </li>

                                    </ul>

                                </li>

                            </ul>


                        </div>
                    </div>
                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-file-earmark-fill"></i> Pages</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">


                            <ul class="submenu-group">

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Authentication</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="auth-login.html" class="subsubmenu-link">Login</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="auth-register.html" class="subsubmenu-link">Register</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="auth-forgot-password.html" class="subsubmenu-link">Forgot
                                                Password</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Errors</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="error-403.html" class="subsubmenu-link">403</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="error-404.html" class="subsubmenu-link">404</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="error-500.html" class="subsubmenu-link">500</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  ">
                                    <a href="ui-file-uploader.html" class='submenu-link'>File Uploader</a>


                                </li>



                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Maps</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-map-google-map.html" class="subsubmenu-link">Google Map</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-map-jsvectormap.html" class="subsubmenu-link">JS Vector
                                                Map</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  ">
                                    <a href="application-email.html" class='submenu-link'>Email Application</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="application-chat.html" class='submenu-link'>Chat Application</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="application-gallery.html" class='submenu-link'>Photo Gallery</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="application-checkout.html" class='submenu-link'>Checkout Page</a>


                                </li>

                            </ul>


                        </div>
                    </div>
                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-life-preserver"></i> Support</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">


                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="https://zuramai.github.io/mazer/docs"
                                        class='submenu-link'>Documentation</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md"
                                        class='submenu-link'>Contribute</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="https://github.com/zuramai/mazer#donation"
                                        class='submenu-link'>Donate</a>


                                </li>

                            </ul>


                        </div>
                    </div>
                </li> --}}


            </ul>
        </div>
    </nav>

</header>
