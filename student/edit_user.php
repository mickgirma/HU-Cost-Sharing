<!DOCTYPE html>
<?php
include '../db/database.php';
include '../include/function.php';
include '../include/session.php';

// login confirmation
confirm_logged_in();

$uid = intval($_GET['id']);

if (isset($_POST['update'])) {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $userName  = escape($_POST['userName']);
    $phoneNumber  = escape($_POST['phoneNumber']);
    $userPhoto  = $_FILES['userPhoto']['name'];
    
    // Directory where the image will be saved
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["userPhoto"]["name"]);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["userPhoto"]["tmp_name"]);
    if($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["userPhoto"]["tmp_name"], $target_file)) {
            // File is uploaded successfully
            $sql = mysqli_query($conn, "UPDATE user SET fullName='$fullName',userName='$userName',phoneNumber='$phoneNumber', userPhoto='$userPhoto',date=NOW() WHERE id='$uid'");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<html lang="en">
<?php include '../include/header.php'; ?>

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
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <?php if (!empty($msg)) { ?>
                        <div class="alert <?php echo $msgClass; ?> text-center h1">
                            <?php echo $msg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                    <form action="" method="POST" enctype="multipart/form-data" class="was-validated">
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM user WHERE id= '$uid'");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $fullName = $row['fullName'];
                            $userName  = $row['userName'];
                            $phoneNumber  = $row['phoneNumber'];
                            $userPhoto  = $row['userPhoto'];
                        ?>
                        <div class="card text-dark bg-light shadow p-3 mt-5 mb-5 bg-white rounded">
                            <div class="card-header">Edit User</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group users-list">
                                            <label for="userPhoto">User Image</label>
                                            <input type="file" name="userPhoto" class="form-control-file" id="userPhoto" accept="image/*" onchange="preview_image(event)">
                                            <img class="img-thumbnail" id="output_image" style="border-radius: 50%; height: auto; max-width: 50%;" />
                                        </div>
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" name="fullName" class="form-control is-valid" id="fullName" value="<?php echo htmlspecialchars($fullName); ?>" required>
                                            <div class="invalid-feedback">Please enter a Full Name.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="text" name="phoneNumber" class="form-control is-valid" id="phoneNumber" value="<?php echo htmlspecialchars($phoneNumber); ?>" required>
                                            <div class="invalid-feedback">Please enter Phone Number.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="userName" class="form-control is-valid" id="fullName" value="<?php echo htmlspecialchars($userName); ?>" required>
                                            <div class="invalid-feedback">Enter username.</div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-primary btn-block">Finish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <!-- Control sidebar content goes here -->
    <!-- Main Footer -->
    <?php include 'include/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include '../include/script.php'; ?>
</body>
</html>