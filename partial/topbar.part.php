<!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['userfname'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="viewstaff">
                                    <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                    View Staff
                                </a>
                                <a class="dropdown-item" href="viewcustomer">
                                    <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                    View Customer
                                </a>
                                <a class="dropdown-item" href="newitem">
                                    <i class="fas fa-box fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Add New Book
                                </a>
                                <a class="dropdown-item" href="newsale">
                                    <i class="fas fa-shopping-bag fa-sm fa-fw mr-2 text-gray-400"></i>
                                    New Sale
                                </a>
                                <a class="dropdown-item" href="passchange">
                                    <i class="fas fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>