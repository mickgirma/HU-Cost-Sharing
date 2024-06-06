<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="../images/Hawassa logo.jpg" alt="HAWASSA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Data Analyst  </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="../images/<?php echo  $_SESSION['userPhoto']; ?>" class="img-circle elevation-2"
                    alt="User Image"> -->
                    <div class="image">
                <img src="../images/avatar4.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            </div>
            <div class="info">
                <a href="index.php" class="d-block"><?php echo $_SESSION['userName'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="send_feedback.php" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Send feedback
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="viewStudentInformation.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            view Student Information
                            <!--  -->
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="managenotice.php" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Manage Notice
                            <!--  -->
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="view_cost_share.php" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            View Costshare
                            <!--  -->
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="paymentverification.php" class="nav-link">
                    <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                            Payment Verification
                            <!--  -->
                        </p>
                    </a>

                </li>


                
                <li class="nav-item">
                    <a href="../login/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Log Out
                            <!--  -->
                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!--
 /.sideb
ar -->





</aside>