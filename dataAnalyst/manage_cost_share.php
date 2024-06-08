<!DOCTYPE html>
<html lang="en">
<?php 
include '../include/header.php'; 
include '../db/database.php'; 
include '../include/session.php'; 
include '../include/function.php'; 

// Debug: Check if session ID is set
if (!isset($_SESSION['id'])) {
    die("Session ID is not set. Please log in again.");
} else {
    $currentUserId = $_SESSION['id'];
    // Debug: Print current user ID
    echo "Current User ID: " . htmlspecialchars($currentUserId) . "<br>";
}

// Debug: Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//login confirmation
confirm_logged_in();

if (isset($_GET['status'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "UPDATE `costshareform` SET `status`= 'active' WHERE `id`= '$id'");
    $_SESSION['delmsg'] = "User Suspend !!";
    header("location:manage_cost_share.php");
}
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'include/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Estimated cost in the current academic year</h1>
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
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="example3" class="table table-bordered table-striped">
                                <h3>Department Name</h3>
                                <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Name</th>
                                        <th>tuitionFee (Birr)</th>
                                        <th>foodExpenseFee (Birr)</th>
                                        <th>beddingExpenseFee (Birr)</th>
                                        <th>Total</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 0;
                                    $sql = "SELECT costshareform.id, subcategory.subcategoryName AS categoryName, tuitionFee, foodExpenseFee, beddingExpenseFee, userId, total, status, action, year 
                                            FROM costshareform 
                                            INNER JOIN subcategory ON collegeName = subcategory.id 
                                            WHERE userId = '$currentUserId'";

                                    $result = mysqli_query($conn, $sql);

                                    // Debug: Check SQL query
                                    if (!$result) {
                                        die("Error executing query: " . mysqli_error($conn));
                                    }

                                    // Debug: Check if rows are returned
                                    if (mysqli_num_rows($result) == 0) {
                                        echo "<tr><td colspan='9'>No data found.</td></tr>";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $collegeName = $row['categoryName'];
                                            $tuitionFee = $row['tuitionFee'];
                                            $foodExpenseFee = $row['foodExpenseFee'];
                                            $beddingExpenseFee = $row['beddingExpenseFee'];
                                            $status = $row['status'];
                                            $action = $row['action'];
                                            $year = $row['year'];

                                            $total = $tuitionFee + $foodExpenseFee + $beddingExpenseFee;
                                            $num++;
                                            $btnColor = ($status == 'active') ? 'btn btn-primary btn-xs btn-disable' : 'btn btn-danger btn-xs btn-disable';
                                            $edit = ($status == 'active') ? 'd-none' : '';
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($num); ?></td>
                                            <td><?php echo htmlspecialchars($collegeName); ?></td>
                                            <td><?php echo htmlspecialchars($tuitionFee); ?></td>
                                            <td><?php echo htmlspecialchars($foodExpenseFee); ?></td>
                                            <td><?php echo htmlspecialchars($beddingExpenseFee); ?></td>
                                            <td><?php echo htmlspecialchars($total); ?></td>
                                            <td><?php echo htmlspecialchars($year); ?></td>
                                            <td><button class="<?php echo htmlentities($btnColor); ?>"><?php echo htmlentities($status); ?></button></td>
                                            <td><a href="edit_cost_share.php?id=<?php echo $id; ?>" class="<?php echo $edit; ?>">Edit</a></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Num</th>
                                        <th>Name</th>
                                        <th>tuitionFee (Birr)</th>
                                        <th>foodExpenseFee (Birr)</th>
                                        <th>beddingExpenseFee (Birr)</th>
                                        <th>Total</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
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

        <!-- Main Footer -->
        <?php include 'include/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include '../include/script.php'; ?>
</body>
</html>
