<!DOCTYPE html>
<?php
include '../db/database.php';
include '../include/function.php';
include '../include/session.php'
?>
<?php
//login confirmation
confirm_logged_in();

?>
<?php
$uid = intval($_GET['id']);

?>

<?php
if (isset($_POST['update'])) {


  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);

  $userName  = escape($_POST['userName']);
  $phoneNumber  = escape($_POST['phoneNumber']);
  $password  = escape($_POST['password']);

  $userPhoto  = $_FILES['userPhoto']['name'];

  $role  = escape($_POST['role']);



  $sql = mysqli_query($conn, "UPDATE `user` SET `fullName`='$fullName',`userName`='$userName',`phoneNumber`='phoneNumber',
      `password`='$password',`userPhoto`='$userPhoto',`role`='$role',`date`='date' WHERE `id`='$uid' ");
}

?>

<html lang="en">
<?php include '../include/header.php' ?>


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

                            <h1 class="m-0 text-dark">View User Detail 🌝</h1>

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
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <?php
              $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE  `id`= '$uid'");

              while ($row = mysqli_fetch_assoc($sql)) {
                $fullName = $row['fullName'];
                $userName  = $row['userName'];
                $phoneNumber  = $row['phoneNumber'];
                $userPhoto  = $row['userPhoto'];
                $password  = $row['password'];
                $role = $row['role'];
                $status = $row['status'];
              ?>
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="../images/<?php echo htmlentities($userPhoto); ?>"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo htmlspecialchars($fullName) ?>
                                    </h3>

                                    <p class="text-muted text-center"><?php echo htmlspecialchars($role) ?></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Full Name</b> <a
                                                class="float-right"><?php echo htmlspecialchars($fullName) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>User Name</b> <a
                                                class="float-right"><?php echo htmlspecialchars($userName) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Phone Number</b> <a
                                                class="float-right"><?php echo htmlspecialchars($phoneNumber) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a
                                                class="float-right"><?php echo htmlspecialchars($status) ?></a>
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <?php
              }


              ?>
                        </div>
                    </div>
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