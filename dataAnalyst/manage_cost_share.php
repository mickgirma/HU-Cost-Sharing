<?php
session_start();

function logged_in() {
    return isset($_SESSION['id']);
}

function confirm_logged_in() {
    if (!logged_in()) {
        ?>
        <script type="text/javascript">
            window.location = "../login/login.php";
        </script>
        <?php
        exit;
    }
}

confirm_logged_in();

include '../include/header.php';
include '../db/database.php';
include '../include/function.php';

if (!isset($_SESSION['id'])) {
    die("Session ID is not set. Please log in again.");
} else {
    $currentUserId = $_SESSION['id'];
    // Removed debug output
    // echo "Session ID: " . htmlspecialchars($_SESSION['id']) . "<br>";
    // echo "Current User ID: " . htmlspecialchars($currentUserId) . "<br>";
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkUserQuery = "SELECT * FROM user WHERE id = '$currentUserId'";
$checkUserResult = mysqli_query($conn, $checkUserQuery);

if (mysqli_num_rows($checkUserResult) == 0) {
    die("User with ID $currentUserId does not exist in the user table.");
}

$sql = "SELECT
    costshareform.id,
    subcategory.subcategoryName AS categoryName,
    costshareform.tuitionFee,
    costshareform.foodExpenseFee,
    costshareform.beddingExpenseFee,
    costshareform.status,
    costshareform.action,
    costshareform.year
FROM
    costshareform
    INNER JOIN subcategory ON costshareform.collegeName = subcategory.id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Removed debug output
// echo "Number of rows returned: " . mysqli_num_rows($result) . "<br>";

// Removed debug output
// if (mysqli_num_rows($result) == 0) {
//     echo "No data found.";
// } else {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "Fetched Row: " . print_r($row, true) . "<br>";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content here -->
</head>
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

                                    if (mysqli_num_rows($result) == 0) {
                                        echo "<tr><td colspan='9'>No data found.</td></tr>";
                                    } else {
                                        mysqli_data_seek($result, 0);
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
</body>
</html>
