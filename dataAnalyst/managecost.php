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
$cid = intval($_GET['id']);

?>
<?php
$msg = "";
$msgClass = "";
if (isset($_POST['send'])) {

  $collegeName = $_POST['collegeName'];
  $tuitionFee = $_POST['tuitionFee'];
  $foodExpenseFee = $_POST['foodExpenseFee'];
  $beddingExpenseFee = $_POST['beddingExpenseFee'];
  $userId =  $_SESSION['id'];
  $sql = mysqli_query($conn, "UPDATE `costshareform` SET `collegeName`='$collegeName',`tuitionFee`= '$tuitionFee',`foodExpenseFee`= '$foodExpenseFee',
  `beddingExpenseFee`='$beddingExpenseFee' WHERE `id` = '$cid'");
  if ($sql) {

    $msg = "Cost Share Price Sent Successfully 🚀!!";
  } else {
    $msgClass = "alert-danger";
    $msg = "Can't Sent 👮‍♂️!!";
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
                            <?php
              $sql = mysqli_query($conn, "SELECT * FROM `costshareform` WHERE `status` = 'active' AND `id` = '$cid'");
              while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $collegeName = $row['collegeName'];
                $tuitionFee = $row['tuitionFee'];
                $foodExpenseFee = $row['foodExpenseFee'];
                $beddingExpenseFee = $row['beddingExpenseFee'];
                $userId = $row['collegeName'];
                $status = $row['collegeName'];

              ?>


                            <form action="" method="post">
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
                                        <h4>Estimated cost to be borne by the beneficiary in the current academic year
                                        </h4>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="costDepartement">College</label>
                                                <select name="collegeName" id="costDepartement"
                                                    class="form-control custom-select">
                                                    <option value="<?php echo $collegeName ?>">
                                                        <?php echo $collegeName ?></option>

                                                    <option value="Computing and informatics college">Computing and
                                                        informatics college</option>
                                                    <option value="Agriculture">Agriculture</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName">Tuition Fee/ የትምርት ውጪ ብር</label>
                                                <input type="number" value="<?php echo $tuitionFee ?>" name="tuitionFee"
                                                    id="inputName" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName">Food Expense Fee/ የምግብ ውጪ ብር</label>
                                                <input type="number" value="<?php echo $foodExpenseFee ?>"
                                                    name="foodExpenseFee" id="inputName" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName">Bedding Expense Fee/ የመኝታ ውጪ ብር</label>
                                                <input type="number" value="<?php echo $beddingExpenseFee ?>"
                                                    name="beddingExpenseFee" id="inputName" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="send" class="btn btn-primary">Update
                                                CostShare</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </form>
                            <?php
              }


              ?>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- Main Footer -->
    <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php include '../include/script.php' ?>
</body>



























































</html>