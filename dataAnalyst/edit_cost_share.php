<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../db/database.php' ?>
<?php include '../include/session.php' ?>
<?php
//login confirmation
confirm_logged_in();

// Initialize message variables
$msg = "";
$msgClass = "";

// Fetch the user ID from the session or query parameter
$userId = $_SESSION['id'];
// $userId = isset($_GET['id']) ? $_GET['id'] : null;

// Fetch current data to pre-fill the form
$query = "SELECT * FROM costshareform WHERE id = $userId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $collegeName = $_POST['collegeName'];
    $tuitionFee = $_POST['tuitionFee'];
    $year = $_POST['year'];
    $foodExpenseFee = $_POST['foodExpenseFee'];
    $beddingExpenseFee = $_POST['beddingExpenseFee'];
    $total = $tuitionFee + $foodExpenseFee + $beddingExpenseFee;

    // Update the database
    $id = $_GET['id'];
    $updateQuery = "UPDATE costshareform SET collegeName='$collegeName',
     tuitionFee='$tuitionFee', foodExpenseFee='$foodExpenseFee', beddingExpenseFee='$beddingExpenseFee', total='$total', year='$year'  WHERE 
     `id`= '$id'";
    if (mysqli_query($conn, $updateQuery)) {
        $msg = "Costshare information updated successfully";
        $msgClass = "alert-success";
    } else {
        $msg = "Error updating record: " . mysqli_error($conn);
        $msgClass = "alert-danger";
    }
}
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'include/navbar.php' ?>
        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Costshare Information</h1>
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
                                <span class="text-white"><?php echo $msg ?> </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                            <form action="" method="post">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Cost Share Form</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: block;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="year">Select Cost Share Year</label>
                                                <select name="year" id="year" class="form-control">
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="costDepartement">College</label>
                                                <select name="collegeName" id="costDepartement"
                                                    class="form-control custom-select">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM subcategory WHERE 1");
                                                    while ($subcategory = mysqli_fetch_array($result)) {
                                                        $selected = ($subcategory['id'] == $row['collegeName']) ? 'selected' : '';
                                                        echo "<option value='{$subcategory['id']}' $selected>{$subcategory['subcategoryName']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tuitionFee">Tuition Fee/ የትምርት ውጪ ብር</label>
                                                <input type="number" name="tuitionFee" id="tuitionFee" class="form-control" value="<?php echo $row['tuitionFee']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="foodExpenseFee">Food Expense Fee/ የምግብ ውጪ ብር</label>
                                                <input type="number" name="foodExpenseFee" id="foodExpenseFee" class="form-control" value="<?php echo $row['foodExpenseFee']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beddingExpenseFee">Bedding Expense Fee/ የመኝታ ውጪ ብር</label>
                                                <input type="number" name="beddingExpenseFee" id="beddingExpenseFee" class="form-control" value="<?php echo $row['beddingExpenseFee']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
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
