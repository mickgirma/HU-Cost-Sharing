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
                            <h1 class="m-0 text-dark">Estimated cost to be borne by the beneficiary in the current
                                academic year</h1>
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
                <div class="container">
                    <div class="row">

                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <h3>Department Name</h3>
                                <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Name</th>
                                        <th> tuitionFee(Birr)</th>
                                        <th> foodExpenseFee(Birr)</th>
                                        <th> beddingExpenseFee(Birr)</th>
                                        <th>Total</th>
                                        <th>year</th>


                                        <th>Status</th>
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $num = 0;
                  $sql = mysqli_query($conn, "SELECT costshareform.id,subcategory.subcategoryName AS categoryName, `collegeName`, `tuitionFee`, `foodExpenseFee`, `beddingExpenseFee`, `userId`, `status`,`total`,`action`,`year` FROM `costshareform` INNER JOIN subcategory on subcategory.id = costshareform.collegeName WHERE status = 'active'");
                  while ($row = mysqli_fetch_assoc($sql)) {
                    $id = $row['id'];
                    $collegeName = $row['categoryName'];
                    $tuitionFee = $row['tuitionFee'];
                    $foodExpenseFee = $row['foodExpenseFee'];
                    $beddingExpenseFee = $row['beddingExpenseFee'];
                    $status = $row['status'];
                    $year = $row['year'];

                    $action = $row['action'];
                    $total = $tuitionFee + $foodExpenseFee + $beddingExpenseFee;
                    $num++;
                    if ($status == 'active') {
                      $btnColor = 'btn btn-primary btn-xs btn-disable';
                    } else {
                      $btnColor = 'btn btn-danger btn-xs btn-disable';
                    }
                  ?>

                                    <tr>
                                        <td><?php echo htmlspecialchars($num); ?></td>
                                        <td><?php echo htmlspecialchars($collegeName); ?></td>
                                        <td><?php echo htmlspecialchars($tuitionFee); ?></td>
                                        <td><?php echo htmlspecialchars($foodExpenseFee); ?></td>
                                        <td><?php echo htmlspecialchars($beddingExpenseFee); ?></td>
                                        <td><?php echo htmlspecialchars($total); ?></td>
                                        <td><?php echo htmlspecialchars($year); ?></td>

                                        <td><button class="bg-success <?php echo htmlentities($btnColor) ?>">
                                                <?php echo htmlentities($status) ?></button></td>
                                      

                                    </tr>
                                    <?php
                  }

                  ?>




                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
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