<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../db/database.php' ?>
<?php include '../include/session.php' ?>
<?php
//login confirmation
confirm_logged_in();

?>
<?php
$msg = "";
$msgClass = "";
if (isset($_POST['send'])) {

  $collegeName = $_POST['collegeName'];
  $tuitionFee = $_POST['tuitionFee'];
  $year = $_POST['year'];
  $foodExpenseFee = $_POST['foodExpenseFee'];
  $beddingExpenseFee = $_POST['beddingExpenseFee'];
  $total = $tuitionFee + $foodExpenseFee + $beddingExpenseFee;
  $userId =  $_SESSION['id'];
  $sql = mysqli_query($conn, "INSERT INTO `costshareform`(`collegeName`, `tuitionFee`, `foodExpenseFee`, `beddingExpenseFee`, `userId`,`total`,`year`) VALUES ('$collegeName','$tuitionFee','$foodExpenseFee','$beddingExpenseFee','$userId','$total','$year')");
  if ($sql) {

    $msg = "Cost Share Price Sent Successfully";
  } else {
    $msgClass = "alert-danger";
    $msg = "Can't Send";
  }
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
                            <h1 class="m-0 text-dark">Cost Share Information</h1>
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


                        <div class="col-md-6">
                            <?php if ($msg != '') : ?>
                            <div class="alert <?php echo $msgClass ?> text-center h4">
                                <?php echo $msg ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                            <form action="./send_student_cost.php" method="post">
                                <div class="card card-primary">
                                    <div class="card-header">

                                        <h3 class="card-title">Cost Share Form
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: block;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Cost Share Year</label>
                                                <select name="year" id="year" class="form-control">
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="costDepartement">College</label>
                                                <select name="collegeName" id="costDepartement"
                                                    class="form-control custom-select">
                                                    <option value="">Select Category</option>
                                                    <?php
                          $result = mysqli_query($conn, "SELECT * FROM subcategory where 1");
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                                                    <option value="<?php echo $row['id']; ?>">
                                                        <?php echo $row["subcategoryName"]; ?></option>
                                                    <?php
                          }
                          ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName">Tuition Fee/ የትምርት ውጪ ብር</label>
                                                <input type="number" name="tuitionFee" id="inputName"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName">Food Expense Fee/ የምግብ ውጪ ብር</label>
                                                <input type="number" name="foodExpenseFee" id="inputName"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName">Bedding Expense Fee/ የመኝታ ውጪ ብር</label>
                                                <input type="number" name="beddingExpenseFee" id="inputName"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="send" class="btn btn-primary">send</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
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