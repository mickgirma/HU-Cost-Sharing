<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../include/session.php' ?>
<?php include '../db/database.php' ?>
<?php
// Login confirmation
confirm_logged_in();

// Function to update payment status
if (isset($_POST['verify_payment'])) {
    $cost_id = intval($_POST['cost_id']);
    $stmt = $conn->prepare("UPDATE studentcostfill SET payment_verified = 1 WHERE id = ?");
    $stmt->bind_param("i", $cost_id);
    if ($stmt->execute()) {
        echo "<script>alert('Payment verified successfully');</script>";
    } else {
        echo "<script>alert('Payment verification failed');</script>";
    }
    $stmt->close();
}

// Handle the filter
$filter = isset($_POST['filter']) ? $_POST['filter'] : 'all';
$whereClause = '';
if ($filter == 'verified') {
    $whereClause = 'WHERE payment_verified = 1';
} elseif ($filter == 'not_verified') {
    $whereClause = 'WHERE payment_verified = 0';
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
                            <h1 class="m-0 text-dark">Payment Verification</h1>
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
                            <div class="card">
                                <div class="card-header">
                                    <form method="post" id="filterForm" class="form-inline">
                                        <label for="filter" class="mr-2">Filter:</label>
                                        <select name="filter" id="filter" class="form-control mr-2" onchange="document.getElementById('filterForm').submit();">
                                            <option value="all" <?php if ($filter == 'all') echo 'selected'; ?>>All</option>
                                            <option value="verified" <?php if ($filter == 'verified') echo 'selected'; ?>>Verified</option>
                                            <option value="not_verified" <?php if ($filter == 'not_verified') echo 'selected'; ?>>Not Verified</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Student Full Name</th>
                                                <th>Category Name</th>
                                                <th>Department Year</th>
                                                <th>Services In Kind</th>
                                                <th>Services In Cash</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT studentcostfill.id, subcategory.subcategoryName AS catName, `user_id`, user.userPhoto as userPhoto, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate`, `graduated`,`send_graduate`, `payment_verified`, user.studentId as studentId , user.fullName as studFullName FROM `studentcostfill` INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName INNER JOIN `user` ON user.id = studentcostfill.user_id $whereClause");
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $cost_id = $row['id'];
                                                $userPhoto = $row['userPhoto'];
                                                $catName = $row['catName'];
                                                $departmentYear = $row['departmentYear'];
                                                $servicesInKind = $row['servicesInKind'];
                                                $servicesInCash = $row['servicesInCash'];
                                                $studentId = $row['studentId'];
                                                $studFullName = $row['studFullName'];
                                                $payment_verified = $row['payment_verified'];
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($studentId); ?></td>
                                                    <td>
                                                        <img src="../images/<?php echo htmlentities($userPhoto); ?>" alt="Profile Photo" class="img-circle img-size-64 mr-2">
                                                        <?php echo htmlentities($studFullName); ?>
                                                    </td>
                                                    <td><?php echo htmlentities($catName); ?></td>
                                                    <td><?php echo htmlentities($departmentYear); ?></td>
                                                    <td><?php echo htmlspecialchars($servicesInKind); ?></td>
                                                    <td><?php echo htmlspecialchars($servicesInCash); ?></td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="cost_id" value="<?php echo $cost_id; ?>">
                                                            <?php if ($payment_verified): ?>
                                                                <button type="button" class="btn btn-secondary" disabled>Verified</button>
                                                            <?php else: ?>
                                                                <button type="submit" name="verify_payment" class="btn btn-success">Verify Payment</button>
                                                            <?php endif; ?>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Student Full Name</th>
                                                <th>Category Name</th>
                                                <th>Department Year</th>
                                                <th>Services In Kind</th>
                                                <th>Services In Cash</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include '../include/script.php' ?>
</body>
</html>
