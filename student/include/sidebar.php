<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../images/Hawassa logo.jpg" alt="HAWASSA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Student Dashboard</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../images/avatar.png" class="img-circle elevation-2" alt="User Image">
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
          <a href="viewcostshare.php" class="nav-link">
            <i class="nav-icon fas fa-eye"></i>
            <p>
              View Costshare

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="edit_user.php" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Edit Profile

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="view_student_detail.php" class="nav-link">
            <i class="nav-icon fas fa-info"></i>
            <p>
              My Costshare Information

            </p>
          </a>

        </li>
        <li class="nav-item">
                    <a href="view_notice.php" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            View Notice
                            
                        </p>
                    </a>

                </li>

        <li class="nav-item">
          <a href="fill_cost_share.php" class="nav-link">
            <i class="nav-icon fas fa-fill"></i>
            <p>
              Fill Cost Information

            </p>
          </a>

        </li>

        <li class="nav-item">
          <a href="send_application.php" class="nav-link">
            <i class="nav-icon fas fa-paper-plane"></i>
            <p>
              Send Application

            </p>
          </a>

        </li>

        <li class="nav-item">
          <a href="sendfeedback.php" class="nav-link">
            <i class="nav-icon far fa-comment"></i>
            <p>
              Send feedback

            </p>
          </a>

        </li>
        
       
        <li class="nav-item">
          <a href="../login/logout.php" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Log Out

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