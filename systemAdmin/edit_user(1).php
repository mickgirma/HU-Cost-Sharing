<!DOCTYPE html>
<?php
include '../db/database.php';
include '../include/function.php';
include '../include/session.php'
?>
<?php
//login confirmation
confirm_logged_in();

?>
<?php
$uid = intval($_GET['id']);

?>

<?php
if (isset($_POST['update'])) {

  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $userName  = escape($_POST['userName']);
  $phoneNumber  = escape($_POST['phoneNumber']);
  $password  = escape($_POST['password']);
  $role  = escape($_POST['role']);

  // Get the current date
  $date = date("Y-m-d");

  // Handle file upload
  $userPhoto = ''; // Initialize userPhoto variable
  if (!empty($_FILES['userPhoto']['name'])) {
    // File uploaded, process it
    $userPhoto = mysqli_real_escape_string($conn, $_FILES['userPhoto']['name']);
    move_uploaded_file($_FILES['userPhoto']['tmp_name'], "../path/to/upload/directory/" . $userPhoto);
  }

  // Prepare and execute SQL update statement
  $sql = "UPDATE `user` SET `fullName`='$fullName',`userName`='$userName',`phoneNumber`='$phoneNumber',
      `password`='$password',`userPhoto`='$userPhoto',`role`='$role',`date`='$date' WHERE `id`='$uid'";
  if (mysqli_query($conn, $sql)) {
    // Update successful
    // Redirect or display success message
    $msg = "User updated successfully";
    $msgClass = "alert-success";
  } else {
    // Update failed
    // Handle error (e.g., display error message)
    $msg = "Error updating user: " . mysqli_error($conn);
    $msgClass = "alert-danger";
  }
}
?>

<html lang="en">
<?php include '../include/header.php' ?>


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

      <!-- /.content-header -->
      <div class="content">
        <div class="container-fluid">
          <?php if (!empty($msg)) { ?>
            <div class="alert <?php echo $msgClass ?> text-center h1">
              <?php echo $msg; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <form action="" method="POST" enctype="multipart/form-data" class="was-validated">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE  `id`= '$uid'");
            while ($row = mysqli_fetch_assoc($sql)) {
              $fullName = $row['fullName'];
              $userName  = $row['userName'];
              $phoneNumber  = $row['phoneNumber'];
              $userPhoto  = $row['userPhoto'];
              $password  = $row['password'];
              $role = $row['role'];
            ?>

              <div class="card text-dark bg-light shadow p-3 mt-5 mb-5 bg-white rounded">
                <div class="card-header"><Strong>Edit User</Strong></div>
                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <!--<?php echo  $userNameError; ?>-->
                  <div class="row">
                    <div class="col-md-6 mt-3">
                      <form>
                        <div class="form-group users-list">
                          <label for="userPhoto">User Image</label>
                          <input type="file" name="userPhoto" class="form-control-file" id="userPhoto" accept="image/*" onchange="preview_image(event)">
                          <img class="img-thumbnail" id="output_image" style="border-radius: 50%; height: auto; max-width: 50%;" />
                        </div>
                      </form>

                      <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" class="form-control is-valid" id="fullName" value="<?php echo htmlspecialchars($fullName) ?>" pattern=".([A-zÀ-ž\s]){2,40}" required="">
                        <div class="invalid-feedback">
                          Please enter a Full Name.
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control is-valid" id="phoneNumber" value="<?php echo htmlspecialchars($phoneNumber) ?>" pattern="[0-9]+" required="">
                        <div class="invalid-feedback">
                          Please enter a valid Phone Number
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="custom-select">
                          <option value="<?php echo htmlspecialchars($role) ?>"><?php echo htmlspecialchars($role) ?></option>
                          <option value="College_Register">College Register </option>
                          <option value="Inland_Revenue">Revenue Officer</option>
                          <option value="Student">Student </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="userName" class="form-control is-valid" id="fullName" required="" value="<?php echo htmlspecialchars($userName) ?>">
                        <div class="invalid-feedback">
                          Enter username
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control is-valid" value="<?php echo htmlspecialchars($password) ?>" name="password" required>
                        <div class="invalid-feedback">
                          Enter Password
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary btn-block btn">Finish</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </form>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
