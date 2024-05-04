<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../include/session.php' ?>
<?php include '../db/database.php' ?>
<?php
//login confirmation
confirm_logged_in();

?>
<?php
echo $uid = intval($_GET['id']);

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
                            <h1 class="m-0 text-dark">View Student Information</h1>
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
                        <?php
            $sql = mysqli_query($conn, "SELECT user.id,`user_id` ,subcategory.subcategoryName as catName,user.Gender, user.userPhoto,user.fullName,user.phoneNumber, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate` FROM `studentcostfill` INNER JOIN user ON studentcostfill.user_id = '$uid' INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName WHERE user.id = '$uid'");
            while ($row = mysqli_fetch_assoc($sql)) {
              $user_id = $row['user_id'];
              $userPhoto = $row['userPhoto'];
              $parentFullName = $row['parentFullName'];
              $parentRegion = $row['parentRegion'];
              $parentZone = $row['parentZone'];
              $parentCity = $row['parentCity'];
              $parentWoreda = $row['parentWoreda'];
              $parentHouseNumber = $row['parentHouseNumber'];
              $parentPostalBox = $row['parentPostalBox'];
              $schoolName = $row['schoolName'];
              $schoolRegion = $row['schoolRegion'];
              $schoolKebele = $row['schoolKebele'];
              $schoolWoreda = $row['schoolWoreda'];
              $schoolCity = $row['schoolCity'];
              $schoolCompletedDate = $row['schoolCompletedDate'];
              $departmentType = $row['departmentType'];
              $departmentName = $row['departmentName'];
              $departmentYear = $row['departmentYear'];
              $collegeStartDate = $row['collegeStartDate'];
              $studentStatus = $row['studentStatus'];
              $servicesInKind = $row['servicesInKind'];
              $servicesInCash = $row['servicesInCash'];
              $withDrawDate = $row['withDrawDate'];
              $fullName = $row['fullName'];
              $phoneNumber = $row['phoneNumber'];
              $Gender = $row['Gender'];
              $catName = $row['catName'];


            ?>
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>

                                                <small class="float-right">Date: 4/10/2023</small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Student Information</h4>
                                            <address>
                                                <strong><?php echo $fullName ?></strong><br>


                                                Phone: <?php echo $phoneNumber ?><br>

                                                Gender: <?php echo $Gender ?> <br>
                                                Department Type: <?php echo $departmentType ?> <br>
                                                Department Name: <?php echo $departmentName ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Parent Details</h4>
                                            <address>
                                                Full Name:<strong><?php echo $parentFullName ?></strong><br>
                                                Address : <?php echo $parentCity ?><br>
                                                Region : <?php echo $parentRegion ?><br>
                                                Wereda : <?php echo $parentWoreda ?><br>
                                                Zone : <?php echo $parentZone ?> <br>
                                                House Number :<?php echo $parentHouseNumber ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Shool Details</h4>
                                            <address>
                                                School Name:<strong><?php echo $schoolName ?></strong><br>
                                                Adress : <?php echo $schoolCity ?><br>
                                                Region : <?php echo $schoolRegion ?><br>
                                                Wereda : <?php echo $schoolWoreda ?><br>
                                                Kebel : <?php echo $schoolKebele ?> <br>
                                                School Completed Date:<?php echo $schoolCompletedDate ?>
                                            </address>
                                        </div>
                                        <div class="col-sm-6 invoice-col">
                                            <h4>Department Detail</h4>
                                            <address>
                                                Department Type:<strong><?php echo $departmentType ?></strong><br>
                                                Department Name : <?php echo $departmentName ?><br>
                                                Department Year : <?php echo $departmentYear ?><br>
                                                College Start Date : <?php echo $collegeStartDate ?><br>
                                                Kebel : <?php echo $schoolKebele ?> <br>
                                                School Completed Date:<?php echo $schoolCompletedDate ?>
                                            </address>
                                        </div>
                                        <div class="col-sm-6 invoice-col">
                                            <h4>Cost Share Form Detail</h4>
                                            <address>
                                                Service In Kind :<strong><?php echo $servicesInKind ?></strong><br>
                                                Service In Cash :<strong> <?php echo $servicesInCash ?></strong><br>

                                            </address>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Num</th>
                                                        <th>College Name</th>
                                                        <th>Tuition Fee</th>
                                                        <th>Food Expense Fee</th>
                                                        <th>Bedding Expense Fee</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                            $subMenu = mysqli_query($conn, "SELECT * FROM `costshareform` Where collegeName = '$catName'");
                            while ($data = mysqli_fetch_assoc($subMenu)) {

                            ?>
                                                    <tr>
                                                        <td><?php echo $data['id'] ?></td>
                                                        <td><?php echo $data['collegeName'] ?></td>
                                                        <td><?php echo $data['tuitionFee'] ?></td>
                                                        <td><?php echo $data['foodExpenseFee'] ?></td>
                                                        <td><?php echo $data['beddingExpenseFee'] ?></td>
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

                                    <div class="row">

                                        <!-- /.col -->
                                        <div class="col-6">
                                            <p class="lead">Amount Due 2/22/2021</p>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td>2250.30</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Total:</th>
                                                            <td>9265.24</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">

                                    </div>
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                        <?php } ?>
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