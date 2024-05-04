<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../db/database.php' ?>
<?php include '../include/session.php' ?>
<?php include '../include/function.php' ?>
<?php
//login confirmation
confirm_logged_in();
?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'include/navbar.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2 class="m-0 text-dark">View Notice</h2>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->

                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                             <?php
                             $user_id = $_SESSION['id'];

                $sql = mysqli_query($conn, "SELECT notice.id AS id, notice.date AS date,notice.user_id AS user_id, notice.title AS title, notice.message AS message, user.fullName AS full_name FROM notice INNER JOIN user ON notice.user_id = user.id WHERE user_id = '$user_id' ORDER BY `date` DESC");
                while ($row = mysqli_fetch_assoc($sql)) 
                {

                  $id = $row['id'];
                  $date = $row['date'];
                  $title = $row['title'];
                  $full_name = $row['full_name'];
                  $message = $row['message'];
                  $user_id = $row['user_id'];
                  $date1 = new DateTime($date);
                  $result = $date1->format('Y-m-d H:i:s');

                ?>
                                <div class="time-label">
                                    <span class="bg-red"><?php echo htmlentities($result) ?></span>
                                </div>
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            <?php echo timePosted($date); ?></span>
                                        <h3 class="timeline-header"><a
                                                href="#"><?php echo htmlentities($full_name) ?></a> send for student</h3>
                                        <h3 class="timeline-header"><?php echo htmlentities($title) ?></h3>


                                        <div class="timeline-body">
                                            <?php echo htmlentities($message) ?>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>


                                <!-- END timeline item -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- Control sidebar content goes here -->
        <!-- <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php include '../include/script.php' ?>
</body>
</html>