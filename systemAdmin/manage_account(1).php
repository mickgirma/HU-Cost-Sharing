<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include '../include/header.php'
?>


<?php include '../db/database.php' ?>
<?php include '../include/session.php' ?>
<?php
//login confirmation
confirm_logged_in();

?>
<?php
if (isset($_GET['suspend'])) {
  echo $id = $_GET['id'];
  mysqli_query($conn, "UPDATE `user` SET `status`= 'suspend' WHERE  `id`= '$id'");
  $_SESSION['delmsg'] = "User Suspend !!";
  header("location:manage_account.php");
}
if (isset($_GET['status'])) {
  echo $id = $_GET['id'];
  mysqli_query($conn, "UPDATE `user` SET `status`= 'active' WHERE  `id`= '$id'");
  $_SESSION['delmsg'] = "User Active !!";
  header("location:manage_account.php");
}

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
                            <h1 class="m-0 text-dark">Manage Account</h1>
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

                        <div class="col-md-12">


                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Name</th>

                                            <th>Role</th>
                                            <th>Phone Number</th>
                                            <th>status</th>
                                            <th>Action</th>
                                            <!-- <th>status</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE  `role`!='Student'");
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $id = $row['id'];
                      $fullName = $row['fullName'];
                      $userName = $row['userName'];
                      $phoneNumber = $row['phoneNumber'];
                      $userPhoto = $row['userPhoto'];
                      $role = $row['role'];
                      $status = $row['status'];
                      $btnColor = "";

                      if ($status == 'active') {
                        $btnColor = 'btn btn-primary btn-xs btn-disable';
                      } else {
                        $btnColor = 'btn btn-danger btn-xs btn-disable';
                      }

                    ?>

                                        <tr>

                                            <td><?php echo htmlentities($id) ?></td>
                                            <td><?php echo htmlentities($userName) ?></td>

                                            <td>
                                                <img src="../images/<?php echo htmlentities($userPhoto); ?>"
                                                    alt="ALT img" class="img-circle img-size-32 mr-2">
                                                <?php echo htmlentities($fullName) ?>
                                            </td>
                                            <td> <?php echo htmlentities($role) ?></td>
                                            <td> <?php echo htmlentities($phoneNumber) ?></td>
                                            <td>
                                                <button class="<?php echo htmlentities($btnColor) ?>">
                                                    <?php echo htmlentities($status) ?></button>
                                            </td>
                                            <td>
                                                <a href="edit_user.php?id=<?php echo $row['id'] ?>"><i
                                                        class="fas fa-pencil-alt mr-2"></i></a>
                                                <a href="manage_account.php?id=<?php echo $id ?>&suspend=delete"
                                                    onClick=
                                                    "return confirm('Are you sure you want to suspend?')"><i
                                                        class="far fa-trash-alt"></i></a>
                                                <a href="manage_account.php?id=<?php echo $id ?>&status=active"
                                                    onClick="return confirm('Are you sure you want to Active this user?')"><i
                                                        class="far fa-check-circle"></i></a>
                                            </td>
                                            <!-- <td> <a class="btn btn-success btn-sm" href="view_student_detail.php"><i
                                                        class="fas fa-user-circle mr-2"></i>View</a>
                                            </td> -->
                                        </tr>

                                        <?php   }

                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Name</th>

                                            <th>Role</th>
                                            <th>Phone Number</th>
                                            <th>status</th>
                                            <th>Action</th>
                                            <!-- <th>status</th> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid manage -->
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