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
<?php
$user_id = $_SESSION['id'];
if (isset($_POST['send'])) {

  echo $title  =  $_POST['title'];
  echo $message  =  $_POST['message'];
  echo $send_to  =  $_POST['send_to'];
  echo $user_id = $_SESSION['id'];
  $date = $_POST['date'];
  $sql = mysqli_query($conn, "INSERT INTO `notice`
  (`user_id`, `send_to`, `title`, `message`,`date`)
   VALUES ('$user_id','$send_to','$title','$message','$date')");
}
if (isset($_GET['action'])) {
  echo $id = $_GET['id'];
  mysqli_query($conn, "DELETE FROM `notice` WHERE id = '$id'");
  $_SESSION['delmsg'] = "notice Deleted !!";
  header("location:inland_mange_notice.php");
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
                            <h1 class="m-0 text-dark">Manage Notice</h1>
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
                        <div class="col-md-4">
                            <form action="inland_mange_notice.php" method="post">
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title name"
                                        minlength="3" title="enter title">
                                </div>
                                <div class="form-group">
                                    <label for="send_to">Notice For</label>
                                    <select name="send_to" id="send_to" class="custom-select">
                                    <option value="sendToUniversity"> University Register</option>
                                        <option value="sendToUniversity"> Data Analyst</option>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Notice Message </label>
                                    <textarea name="message" class="form-control" rows="3" placeholder="Enter message"
                                        spellcheck="false"></textarea>
                                </div>
                                <button type="submit" name="send" class="btn btn-block btn-primary">Send</button>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <!-- The time line -->
                            <div class="timeline">
                                <?php

                $sql = mysqli_query($conn, "SELECT notice.id AS id, notice.date AS date,notice.user_id AS user_id, notice.title AS title, notice.message AS message, user.fullName AS full_name FROM notice INNER JOIN user ON notice.user_id = user.id WHERE user_id = '$user_id' ORDER BY `date` DESC");
                while ($row = mysqli_fetch_assoc($sql)) {

                  $id = $row['id'];
                  $date = $row['date'];
                  $title = $row['title'];
                  $full_name = $row['full_name'];
                  $message = $row['message'];
                  $user_id = $row['user_id'];
                  $date1 = new DateTime($date);
                  $result = $date1->format('Y-m-d H:i:s');





                ?>

                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red"><?php echo htmlentities($result) ?></span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            <?php echo timePosted($date); ?></span>

                                        <h3 class="timeline-header"><a href="#"><?php echo htmlentities($title) ?></a>
                                            <?php echo htmlentities($full_name) ?></h3>



                                        <div class="timeline-body">
                                            <?php echo htmlentities($message) ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-danger btn-sm"
                                                href="inland_mange_notice.php?id=<?php echo $id ?>&action=delete"
                                                onClick="return confirm('Are you sure you want to Delete?')"><i
                                                    class="far fa-trash-alt"></i> delete</a>

                                        </div>
                                    </div>
                                </div>

                                <?php
                } ?>



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