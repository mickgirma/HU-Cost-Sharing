<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../include/session.php' ?>
<?php include '../include/function.php' ?>
<?php include '../db/database.php' ?>
<?php
//login confirmation
confirm_logged_in();

?>
<?php
 $uid = intval($_GET['id']);
$total_cost = 0;
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
                    <?php
          $_SESSION['total_cost'] = "";
          if ($_SESSION['total_cost'] !== "") {
            echo $_SESSION['total_cost'];
          } ?>

                    <div class="row">

                        <?php
            $sql = mysqli_query($conn, "SELECT  studentcostfill.id AS cost_id, user.id AS user_id ,subcategory.categoryid as catName,subcategory.subcategoryName as categoryName,user.Gender,user.date as datee, user.DOB as dob, user.userPhoto,user.fullName,user.phoneNumber, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate` FROM `studentcostfill` INNER JOIN user ON studentcostfill.user_id = '$uid' INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName WHERE user.id = '$uid'");
            while ($row = mysqli_fetch_assoc($sql)) {
              $cost_id = $row['cost_id'];
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
              $depname = $row['categoryName'];
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
              $date = $row['datee'];
              $date1 = new DateTime($date);
              $result = $date1->format('Y-m-d H:i:s');
              $dob=$row['dob'];
              

            ?>

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

                                            <small style='font-size:0.8rem ;' class="float-right"><span class="time">
                <i class="fas fa-clock"></i> <?php echo timePosted($date); ?>
            </span></small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div style="border:1px solid;" class="col-sm-4 invoice-col">
                                            <h4>Student Information</h4>
                                            <address>
                                                Name: <strong><?php echo $fullName ?></strong><br>


                                                Phone: <?php echo $phoneNumber ?><br>

                                                Gender: <?php echo $Gender ?> <br>
                                                Department Type: <?php echo $departmentType ?> <br>
                                                Department Name: <?php echo $departmentName ?><br>
                                                DOB: <?php echo $dob ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div style="border:1px solid;" class="col-sm-4 invoice-col">
                                            <h4>Parent Details</h4>
                                            <address>
                                                Full Name: <strong><?php echo $parentFullName ?></strong><br>
                                                Address : <?php echo $parentCity ?><br>
                                                Region : <?php echo $parentRegion ?><br>
                                                Wereda : <?php echo $parentWoreda ?><br>
                                                Zone : <?php echo $parentZone ?> <br>
                                                House Number : <?php echo $parentHouseNumber ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div style="border:1px solid;" class="col-sm-4 invoice-col">
                                            <h4>Shool Details</h4>
                                            <address>
                                                School Name: <strong><?php echo $schoolName ?></strong><br>
                                                Adress : <?php echo $schoolCity ?><br>
                                                Region : <?php echo $schoolRegion ?><br>
                                                Wereda : <?php echo $schoolWoreda ?><br>
                                                Kebele : <?php echo $schoolKebele ?> <br>
                                                School Completed Date: <?php echo $schoolCompletedDate ?>
                                            </address>
                                        </div>
                                        <div style="border:1px solid;" class="col-sm-8 invoice-col">
                                            <h4>Department Detail</h4>
                                            <address>

                                                Department Name : <strong><?php echo $depname ?></strong><br>
                                                Department Year : <?php echo $departmentYear ?><br>
                                                College Start Date : <?php echo $collegeStartDate ?><br>
                                                Kebel : <?php echo $schoolKebele ?> <br>
                                                School Completed Date: <?php echo $schoolCompletedDate ?>
                                            </address>
                                        </div>
                                        <div style="border:1px solid;" class="col-sm-4 invoice-col">
                                            <h4>Cost Share Form Detail</h4>
                                            <address>
                                                Service In Kind : <strong><?php echo $servicesInKind ?></strong><br>
                                                Service In Cash : <strong> <?php echo $servicesInCash ?></strong><br>

                                            </address>

                                            <!-- <a href="view_student_detail.php?id=<?php echo $uid ?>&updateyear=<?php echo $departmentYear ?>&costid=<?php echo $cost_id ?>"
                                                onClick="return confirm('Are you sure you want to update the year?')"><i
                                                    class="far fa-check-circle"></i> Update Cost Share Year</a> -->
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
                                                        <th>Sum</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                            $foodCost = 0;
                            $beddingCost = 0;
                            $bothCost = 0;


                            $foodCostk = 0;
                            $beddingCostk = 0;
                            $bothCostk = 0;
                            $row['servicesInKind'];
                            $row['servicesInCash'];
                            $stat = true;
                            $subMenu = mysqli_query($conn, "SELECT studentcostfill.id, `user_id`,`beddingExpenseFee`,`foodExpenseFee`, `servicesInKind`,`year`, `tuitionFee`,`servicesInCash`,`departmentType`, `departmentName`, `departmentYear`,`total`,`status` FROM `studentcostfill` INNER JOIN subcategory on subcategory.id = $departmentName INNER JOIN costshareform on costshareform.collegeName = studentcostfill.departmentName WHERE `user_id` = '$uid' && status = 'active' && departmentName = '$departmentName'");


                            while ($data = mysqli_fetch_assoc($subMenu)) {;
                              // $beddingCostk = $data['beddingExpenseFee'];
                              $tuitionFee =  $data['tuitionFee'];

                              if ($row['servicesInCash'] == "Food") {
                                echo $foodCost = $data['foodExpenseFee'];
                              }
                              if ($row['servicesInCash'] == "Bedding") {
                                $beddingCost = $data['beddingExpenseFee'];
                              }
                              if ($row['servicesInCash'] == "Food and Bedding") {
                                $bothCost = $data['beddingExpenseFee'] + $data['foodExpenseFee'];
                              }

                              // Service in Kind
                              if ($row['servicesInKind'] == "Food") {
                                $foodCostk = $data['foodExpenseFee'];
                              }
                              if ($row['servicesInKind'] == "Bedding") {
                                $beddingCostk = $data['beddingExpenseFee'];
                              }
                              if ($row['servicesInKind'] == "Food and Bedding") {
                                $bothCostk = $data['beddingExpenseFee'] + $data['foodExpenseFee'];
                              }
                              if ($row['servicesInKind'] == "none") {
                                // $foodCostk = 0;
                                // $beddingCostk  = 0;
                                // $bothCostk = 0;
                              }


                              while ($stat) {
                                $stat = false;



                            ?>
                             <p class="h4">Amount due to <?php echo $data['year'] ?></p>
                                                    <tr>

                                                        <td><?php echo $data['id'] ?></td>
                                                        <td><?php echo $data['departmentName'] ?></td>
                                                        <td><?php echo $data['tuitionFee'] ?></td>
                                                        <td><?php echo $data['foodExpenseFee'] ?></td>
                                                        <td><?php echo $data['beddingExpenseFee'] ?></td>
                                                        <td><?php echo $data['total'];
                                      ?></td>

                                                        </td>
                                                    </tr>
                                                    <?php
                              }
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
                                           

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>


                                                        <tr>
                                                            <th>Total:</th>

                                                            <td><?php echo $each_cost = $bothCost + $beddingCost + $foodCost + $bothCostk + $beddingCostk + $foodCostk + $tuitionFee;
                                    $total_cost = $total_cost + $each_cost;

                                    ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->


                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                        <?php } ?>

                    </div>
                    <div class="container pb-5">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning" >  <!--<i class="fas fa-eth-sign"></i><i class="fas fa-dollar-sign">--><p> Birr</p></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Cost</span>
                                    <span class="info-box-number"><?php echo $total_cost;

                                                ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
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