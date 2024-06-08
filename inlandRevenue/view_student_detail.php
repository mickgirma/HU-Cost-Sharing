<!DOCTYPE html>
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
$total_cost = 0;
$cost_id = "";
$uid = intval($_GET['id']);

if (isset($_GET['updateyear'])) {
    echo $updateyear = $_GET['updateyear'];
    echo $costid = $_GET['costid'];
    if ($updateyear == 'First Year') {
        $updateyear = 'Second Year';
        $year = 1;
    } else if ($updateyear == 'Second Year') {
        $year = 2;
        $updateyear = 'Third Year';
    } else if ($updateyear == 'Third Year') {
        $year = 3;
        $updateyear = 'Fourth Year';
    } else if ($updateyear == 'Fourth Year') {
        $year = 4;
    } else if ($updateyear == 'Fifth Year') {
        $year = 5;
    }
    $year++;
    $sql = mysqli_query($conn, "UPDATE `studentcostshareyear` SET `year`='$year',`yearName` ='$updateyear' WHERE `user_id`= '$costid'");
    $updateyear = mysqli_query($conn, "UPDATE `studentcostfill` SET `departmentYear` ='$updateyear' WHERE `id`= '$costid'");
    if ($sql) {
        $_SESSION['delmsg'] = "it Workers fine $cost_id";
    }

    header("location:view_student_detail.php?id=$uid");
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="yearSelect">Select Year:</label>
                                <select class="form-control" id="yearSelect">
                                    <option value="First Year">First Year</option>
                                    <option value="Second Year">Second Year</option>
                                    <option value="Third Year">Third Year</option>
                                    <option value="Fourth Year">Fourth Year</option>
                                    <option value="Fifth Year">Fifth Year</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = mysqli_query($conn, "SELECT studentcostfill.id AS cost_id, user.id,`user_id`,user.date as datee,user.DOB as dob ,subcategory.categoryid as catName,subcategory.subcategoryName as categoryName,user.Gender, user.userPhoto,user.fullName,user.phoneNumber, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate` FROM `studentcostfill` INNER JOIN user ON studentcostfill.user_id = '$uid' INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName WHERE user.id = '$uid'");
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
                        $dob = $row['dob'];
                    ?>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <!-- Student Information -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Student Information</h4>
                                        <strong>Name:</strong> <?php echo $fullName ?><br>
                                        <strong>Phone:</strong> <?php echo $phoneNumber ?><br>
                                        <strong>Gender:</strong> <?php echo $Gender ?><br>
                                        <strong>Department Type:</strong> <?php echo $departmentType ?><br>
                                        <strong>Department Name:</strong> <?php echo $departmentName ?><br>
                                        <strong>Date Of Birth:</strong> <?php echo $dob ?>
</div>
</div>
</div>
<div class="col-md-6">
<!-- Parent Details -->
<div class="card">
<div class="card-body">
<h4 class="card-title">Parent Details</h4>
<strong>Full Name:</strong> <?php echo $parentFullName ?><br>
<strong>Address:</strong> <?php echo $parentCity ?><br>
<strong>Region:</strong> <?php echo $parentRegion ?><br>
<strong>Wereda:</strong> <?php echo $parentWoreda ?><br>
<strong>Zone:</strong> <?php echo $parentZone ?><br>
<strong>House Number:</strong> <?php echo $parentHouseNumber ?>
</div>
</div>
</div>
</div>
<div class="row mb-4">
<div class="col-md-6">
<!-- School Details -->
<div class="card">
<div class="card-body">
<h4 class="card-title">School Details</h4>
<strong>School Name:</strong> <?php echo $schoolName ?><br>
<strong>Address:</strong> <?php echo $schoolCity ?><br>
<strong>Region:</strong> <?php echo $schoolRegion ?><br>
<strong>Wereda:</strong> <?php echo $schoolWoreda ?><br>
<strong>Kebel:</strong> <?php echo $schoolKebele ?><br>
<strong>School Completed Date:</strong> <?php echo $schoolCompletedDate ?>
</div>
</div>
</div>
<div class="col-md-6">
<!-- Department Detail -->
<div class="card">
<div class="card-body">
<h4 class="card-title">Department Detail</h4>
<strong>Department Name:</strong> <?php echo $depname ?><br>
<strong>Department Year:</strong> <?php echo $departmentYear ?><br>
<strong>College Start Date:</strong> <?php echo $collegeStartDate ?><br>
</div>
</div>
</div>
</div>
<div class="row mb-4">
<div class="col-md-6">
<!-- Cost Share Form Detail -->
<div class="card">
<div class="card-body">
<h4 class="card-title">Cost Share Form Detail</h4>
<strong>Service In Kind:</strong> <?php echo $servicesInKind ?><br>
<strong>Service In Cash:</strong> <?php echo $servicesInCash ?><br>
</div>
</div>
</div>
</div>
<?php } ?>
                <!-- Cost Table -->
                
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
                $total_cost = 0; // Initialize total cost variable
                $subMenu = mysqli_prepare($conn, "SELECT studentcostfill.id, `user_id`,`beddingExpenseFee`,`foodExpenseFee`, `servicesInKind`,`year`, `tuitionFee`,`servicesInCash`,`departmentType`, `departmentName`, `departmentYear`,`total`,`status` FROM `studentcostfill` INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName WHERE `user_id` = ? && status = 'active' && departmentName = ?");
                mysqli_stmt_bind_param($subMenu, "is", $uid, $departmentName);
                $stat = true;

                while ($data = mysqli_fetch_assoc($subMenu)) {
                    $tuitionFee = $data['tuitionFee'];
                    $foodCost = 0;
                    $beddingCost = 0;
                    $bothCost = 0;

                    if ($data['servicesInCash'] == "Food") {
                        $foodCost = $data['foodExpenseFee'];
                    } elseif ($data['servicesInCash'] == "Bedding") {
                        $beddingCost = $data['beddingExpenseFee'];
                    } elseif ($data['servicesInCash'] == "Food and Bedding") {
                        $bothCost = $data['beddingExpenseFee'] + $data['foodExpenseFee'];
                    }

                    if ($data['servicesInKind'] == "Food") {
                        $foodCost += $data['foodExpenseFee'];
                    } elseif ($data['servicesInKind'] == "Bedding") {
                        $beddingCost += $data['beddingExpenseFee'];
                    } elseif ($data['servicesInKind'] == "Food and Bedding") {
                        $bothCost += $data['beddingExpenseFee'] + $data['foodExpenseFee'];
                    }

                    while ($stat) {
                        $stat = false;
                        ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['departmentName'] ?></td>
                            <td><?php echo $tuitionFee ?></td>
                            <td><?php echo $foodCost ?></td>
                            <td><?php echo $beddingCost ?></td>
                            <td><?php echo $data['total']; ?></td>
                        </tr>
                    <?php
                    }
                    $total_cost += $tuitionFee + $foodCost + $beddingCost + $bothCost;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-6">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Total:</th>
                        <td><?php echo $total_cost; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


                                    </div>
            
        
   
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php include 'include/footer.php' ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include '../include/script.php' ?>
</body>
</html>