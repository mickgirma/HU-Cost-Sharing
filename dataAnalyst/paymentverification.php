<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../include/session.php' ?>
<?php include '../db/database.php' ?>
<?php
// Login confirmation
confirm_logged_in();

// Function to book a queue
if (isset($_POST['book_queue'])) {
    $cost_id = intval($_POST['cost_id']);
    $stmt = $conn->prepare("UPDATE studentcostfill SET booked_queue = 1 WHERE id = ?");
    $stmt->bind_param("i", $cost_id);
    if ($stmt->execute()) {
        echo "<script>alert('Queue booked successfully');</script>";
    } else {
        echo "<script>alert('Queue booking failed');</script>";
    }
    $stmt->close();
}

// Handle the filter
$filter = isset($_POST['filter']) ? $_POST['filter'] : 'all';
$whereClause = 'WHERE studentcostfill.payment_verified = 1';
if ($filter == 'booked') {
    $whereClause .= ' AND booked_queue = 1';
} elseif ($filter == 'not_booked') {
    $whereClause .= ' AND booked_queue = 0';
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
                            <h1 class="m-0 text-dark">Paid Students List</h1>
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
                                            <option value="booked" <?php if ($filter == 'booked') echo 'selected'; ?>>Queue Booked</option>
                                            <option value="not_booked" <?php if ($filter == 'not_booked') echo 'selected'; ?>>Queue Not Booked</option>
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
                                                <!-- New column for the "View" button -->
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$sql = mysqli_query($conn, "SELECT studentcostfill.id, user.id AS user_id, subcategory.subcategoryName AS catName, `user_id`, user.userPhoto as userPhoto, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate`, `graduated`,`send_graduate`, user.studentId as studentId , user.fullName as studFullName, `booked_queue` FROM `studentcostfill` INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName  INNER JOIN `user` ON user.id = studentcostfill.user_id $whereClause");
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $cost_id = $row['id'];
                                                $userPhoto = $row['userPhoto'];
                                                $catName = $row['catName'];
                                                $departmentYear = $row['departmentYear'];
                                                $servicesInKind = $row['servicesInKind'];
                                                $servicesInCash = $row['servicesInCash'];
                                                $studentId = $row['studentId'];
                                                $studFullName = $row['studFullName'];
                                                $bookedQueue = $row['booked_queue'];
                                                $buttonClass = $bookedQueue ? 'btn btn-secondary' : 'btn btn-primary';
                                                $buttonText = $bookedQueue ? 'Queue Booked' : 'Book Queue';
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
                                                            <button type="submit" name="book_queue" class="<?php echo $buttonClass; ?>" <?php echo $bookedQueue ? 'disabled' : ''; ?>><?php echo $buttonText; ?></button>
                                                        </form>
                                                    </td>
                                                    <!-- "View" button column -->
                                                    <td>
                                                        <!-- Link to view_student.php with student ID as parameter -->
                                                        <a href="view_student_detail.php?id=<?php echo $row['user_id']; ?>" class="btn btn-info">View</a>                                                    </td>
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
                                                <!-- New column for the "View" button -->
                                                <th>View</th>
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
