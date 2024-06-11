<!DOCTYPE html>
<html lang="en">

<?php include '../include/header.php'; ?>
<?php include '../include/session.php'; ?>
<?php include '../include/function.php'; ?>
<?php include '../db/database.php'; ?>

<?php
// Login confirmation
confirm_logged_in();
?>

<?php
$total_cost = 0;
$uid = intval($_GET['id']);

if (isset($_GET['updateyear'])) {
    $updateyear = $_GET['updateyear'];
    $costid = $_GET['costid'];
    $year = 1;
    
    switch ($updateyear) {
        case 'First Year':
            $updateyear = 'Second Year';
            break;
        case 'Second Year':
            $updateyear = 'Third Year';
            $year = 2;
            break;
        case 'Third Year':
            $updateyear = 'Fourth Year';
            $year = 3;
            break;
        case 'Fourth Year':
            $year = 4;
            break;
        case 'Fifth Year':
            $year = 5;
            break;
    }

    $year++;
    $sql = mysqli_query($conn, "UPDATE `studentcostshareyear` SET `year`='$year',`yearName` ='$updateyear' WHERE `user_id`= '$costid'");
    $updateyear = mysqli_query($conn, "UPDATE `studentcostfill` SET `departmentYear` ='$updateyear' WHERE `id`= '$costid'");

    if ($sql) {
        $_SESSION['delmsg'] = "It works fine $costid";
    }

    header("location:view_student_detail.php?id=$uid");
} else {
    // Get the total number of rows for the student
    $sql_row_count = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM studentcostfill WHERE user_id = '$uid'");
    $row_count_result = mysqli_fetch_assoc($sql_row_count);
    $total_rows = $row_count_result['total_rows'];

    // Get the selected row number (defaults to 1 if not set)
    $selected_row = isset($_GET['row']) ? intval($_GET['row']) : 1;
    if ($selected_row < 1) $selected_row = 1;
    if ($selected_row > $total_rows) $selected_row = $total_rows;

    // Fetch data for the selected row
    $sql = mysqli_query($conn, "SELECT studentcostfill.id AS cost_id, user.id, user.date as datee, user.DOB as dob, subcategory.categoryid as catName, subcategory.subcategoryName as categoryName, user.Gender, user.userPhoto, user.fullName, user.phoneNumber, parentFullName, parentRegion, parentZone, parentWoreda, parentCity, parentHouseNumber, parentPostalBox, schoolName, schoolRegion, schoolKebele, schoolWoreda, schoolCity, schoolCompletedDate, departmentType, departmentName, departmentYear, collegeStartDate, studentStatus, servicesInKind, servicesInCash, withDrawDate FROM studentcostfill INNER JOIN user ON studentcostfill.user_id = user.id INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName WHERE user.id = '$uid' LIMIT " . ($selected_row - 1) . ", 1");
}

?>

<head>
    <style>
        .bordered {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'include/navbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">View Student Information</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if ($_SESSION['total_cost'] !== "") echo $_SESSION['total_cost']; ?>
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $cost_id = $row['cost_id'];
                            $user_id = $row['id'];
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
                            $dob = $row['dob'];
                            $date1 = new DateTime($date);
                            $result = $date1->format('Y-m-d H:i:s');
                        ?>
                        <div class="col-md-8">
                            <div class="invoice p-3 mb-3 bordered">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <small class="float-right" style="font-size:0.8rem;"><i class="fas fa-clock"></i> 1 month ago</small>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <!-- Student Information -->
                                    <div class="col-sm-4 invoice-col">
                                        <h4>Student Information</h4>
                                        <address>
                                            <strong><?php echo $fullName; ?></strong><br>
                                            Phone: <?php echo $phoneNumber; ?><br>
                                            Gender: <?php echo $Gender; ?><br>
                                            Department Type: <?php echo $departmentType; ?><br>
                                            Date Of Birth: <?php echo $dob; ?>
                                        </address>
                                    </div>
                                    <!-- Parent Details -->
                                    <div class="col-sm-4 invoice-col">
                                        <h4>Parent Details</h4>
                                        <address>
                                            <strong><?php echo $parentFullName; ?></strong><br>
                                            Address: <?php echo $parentCity; ?><br>
                                            Region: <?php echo  $parentRegion; ?><br>
                                            Woreda: <?php echo $parentWoreda; ?><br>
                                            Zone: <?php echo $parentZone; ?><br>
                                            House Number: <?php echo $parentHouseNumber; ?>
                                        </address>
                                    </div>
                                    <!-- School Details -->
                                    <div class="col-sm-4 invoice-col">
                                        <h4>School Details</h4>
                                        <address>
                                            <strong><?php echo $schoolName; ?></strong><br>
                                            Address: <?php echo $schoolCity; ?><br>
                                            Region: <?php echo $schoolRegion; ?><br>
                                            Woreda: <?php echo $schoolWoreda; ?><br>
                                            Kebele: <?php echo $schoolKebele; ?><br>
                                            Completed Date: <?php echo $schoolCompletedDate; ?>
                                        </address>
                                    </div>
                                    <!-- Department Details -->
                                    <div class="col-sm-8 invoice-col">
                                        <h4>Department Detail</h4>
                                        <address>
                                            Department Name: <?php echo $depname; ?><br>
                                            Year: <?php echo $departmentYear; ?><br>
                                            Start Date: <?php echo $collegeStartDate; ?><br>
                                            School Completed Date: <?php echo $schoolCompletedDate; ?>
                                        </address>
                                    </div>
                                    <!-- Cost Share Form Detail -->
                                    <div class="col-sm-4 invoice-col">
                                        <h4>Cost Share Form Detail</h4>
                                        <address>
                                            Service In Kind: <strong><?php echo $servicesInKind; ?></strong><br>
                                            Service In Cash: <strong><?php echo $servicesInCash; ?></strong>
                                        </address>
                                    </div>
                                </div>
                                <!-- Your existing table display code continues... -->

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>College Name</th>
                                                    <th>Tuition Fee</th>
                                                    <th>Food Expense</th>
                                                    <th>Bedding Expense</th>
                                                    <th>Total</th>
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
                                                $stat = true;
                                                $subMenu = mysqli_query($conn, "SELECT studentcostfill.id, user_id, beddingExpenseFee, foodExpenseFee, servicesInKind, year, tuitionFee, servicesInCash, departmentType, departmentName, departmentYear, total, status FROM studentcostfill INNER JOIN subcategory ON subcategory.id = $departmentName INNER JOIN costshareform ON costshareform.collegeName = studentcostfill.departmentName WHERE user_id = '$uid' AND status = 'active' AND departmentName = '$departmentName'");

                                                while ($data = mysqli_fetch_assoc($subMenu)) {
                                                    $tuitionFee = $data['tuitionFee'];
                                                    if ($row['servicesInCash'] == "Food") $foodCost = $data['foodExpenseFee'];
                                                    if ($row['servicesInCash'] == "Bedding") $beddingCost = $data['beddingExpenseFee'];
                                                    if ($row['servicesInCash'] == "Food and Bedding") $bothCost = $data['beddingExpenseFee'] + $data['foodExpenseFee'];
                                                    if ($row['servicesInKind'] == "Food") $foodCostk = $data['foodExpenseFee'];
                                                    if ($row['servicesInKind'] == "Bedding") $beddingCostk = $data['beddingExpenseFee'];
                                                    if ($row['servicesInKind'] == "Food and Bedding") $bothCostk = $data['beddingExpenseFee'] + $data['foodExpenseFee'];
                                                    while ($stat) {
                                                        $stat = false;
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['departmentName']; ?></td>
                                                    <td><?php echo $data['tuitionFee']; ?></td>
                                                    <td><?php echo $data['foodExpenseFee']; ?></td>
                                                    <td><?php echo $data['beddingExpenseFee']; ?></td>
                                                    <td><?php echo $data['total']; ?></td>
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>Total:</th>
                                                    <td><?php echo $each_cost = $bothCost + $beddingCost +  $foodCost + $bothCostk + $beddingCostk + $foodCostk + $tuitionFee;
                                                        $total_cost += $each_cost; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="container pb-5">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Cost</span>
                                    <span class="info-box-number"><?php echo $total_cost; ?></span>
</div>
<a href="invoice-print.php?id=<?php echo $uid; ?>" class="btn btn-default" target="_blank"><i class="fas fa-print"></i> Print</a>
</div>
</div>
</div>
<?php include 'include/footer.php' ?>
</div>
</div>
<!-- ./wrapper -->
         <!-- REQUIRED SCRIPTS -->


         <?php include '../include/script.php' ?>
    </body>

    </html>


