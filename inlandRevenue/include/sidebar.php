<aside class="main-sidebar sidebar-dark-primary success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="../images/Hawassa logo.jpg" alt="HAWASSA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Revenue Officer</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
                <img src="../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="index.php" class="d-block"><?php echo $_SESSION['userName'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="send_student_cost.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p> Send Student Cost</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="inland_mange_notice.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Manage Notice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manage_cost_share.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Manage Cost Share</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="inland_view_student.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Student Information</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="sendverification.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Send Verification</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="../login/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Log Out</p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!--/.sidebar -->











</aside>