<!DOCTYPE html>
<?php
include '../db/database.php';
include '../include/function.php';
include '../include/session.php';
?>
<?php
// login confirmation
confirm_logged_in();
?>

<?php
$msg = "";
$msgClass = "";
$userNameError = "";
if (isset($_POST['register'])) {
  $encrypt = ['cost' => 12, 'memory_cost' => 1024, 'threads' => 2,];
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $userName  = escape($_POST['userName']);
  $phoneNumber  = escape($_POST['phoneNumber']);
  $password = password_hash($_POST['password'], PASSWORD_ARGON2I, $encrypt);
  $dateOfBirth  = escape($_POST['dateOfBirth']);
  $college  = escape($_POST['collegeName']);
  $hashedPassword = password_hash($password, PASSWORD_ARGON2I); 
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $studentId = "no";

  // Check if Student ID is provided
  if (isset($_POST['studentId']) && !empty($_POST['studentId'])) {
    $studentId = $_POST['studentId'];
  }

  // Check if college is provided
  if (isset($_POST['college']) && !empty($_POST['college'])) {
    $college = $_POST['college'];
  }

  // Check if Fresh Student status is provided
  if (isset($_POST['FreshStudent']) && !empty($_POST['FreshStudent'])) {
    $FreshStudent = $_POST['FreshStudent'];
  }

  $Gender  = escape($_POST['Gender']);
  $userPhoto  = $_FILES['userPhoto']['name'];
  $role  = escape($_POST['role']);
  $fileExt = explode('.', $userPhoto);
  $fileActExt = strtolower(end($fileExt));
  $allowImg = array('png', 'jpeg', 'jpg');
  $fileNew = rand() . "$userName" . "." . $fileActExt;  
  $coverImage = '../images/' . $fileNew;

  // Check if username already exists
  $select_username = "SELECT `userName` FROM `user` WHERE userName= '$userName'";
  $select_username = mysqli_query($conn, $select_username);
  if (mysqli_num_rows($select_username) > 0) {
    $userNameError = "Sorry username already taken. Try again with unique username.";
  } else {
    // Upload user photo
    $target = "../images/" . basename($userPhoto);
    if (move_uploaded_file($_FILES['userPhoto']['tmp_name'], $coverImage)) {
      // Image uploaded successfully
    }
    
    // Insert user data into database
    $sql = mysqli_query($conn, "INSERT INTO `user`(`fullName`, `userName`, `phoneNumber`, `Gender`, `password`, `userPhoto`, `role`, `studentId`, `FreshStudent`, `college`, `DOB`, `email`)
    VALUES ('$fullName', '$userName', '$phoneNumber', '$Gender', '$hashedPassword', '$coverImage', '$role', '$studentId', '$FreshStudent', '$college', '$dateOfBirth', '$email')");
    if ($sql) {
      $msg = "Account Created Successfully";
    } else {
      $msgClass = "alert-danger";
      $msg = "Can't Create account";
    }
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

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <?php if ($msg != '') : ?>
                    <div class="alert <?php echo $msgClass ?> text-center text-success h1">
                        <?php echo $msg ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                    <form action="" method="POST" enctype="multipart/form-data" class="was-validated">

                        <div class="card text-dark bg-light shadow p-3 mt-5 mb-5 bg-white rounded">
                            <h4 class="card-header"> <Strong>Create Account For Users </Strong></h4>
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <i class="fa fa-icon-alert"><span class="text-red"><?php echo  $userNameError; ?></span></i>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <form>
                                            <div class="form-group users-list">
                                                <label for="userPhoto">User Image</label>
                                                <input type="file" name="userPhoto" class="form-control-file"
                                                    id="userPhoto" accept="image/*" onchange="preview_image(event)">
                                                <img class="img-thumbnail" id="output_image" style="border-radius: 50%; height: auto; max-width: 50%;" />
                                            </div>
                                        </form>

                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" name="fullName" class="form-control is-valid"
                                                id="fullName" value="<?php if (isset($_POST['fullName'])) { echo $_POST['fullName']; } ?>"
                                                pattern=".([A-zÀ-ž\s]){2,40}" title="6 to 30 characters" required>
                                            <div class="invalid-feedback">
                                                Please enter a Full Name.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="phoneNumber">Phone Number</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+251</div>
                                                </div>
                                                <input type="text" name="phoneNumber" class="form-control is-valid"
                                                    id="phoneNumber"
                                                    value="<?php if (isset($_POST['phoneNumber'])) { echo $_POST['phoneNumber']; } ?>"
                                                    pattern=".([0-9]){9,9}" title="only 10 numbers" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter Phone Number 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Gender">Gender</label>
                                            <select name="Gender" id="Gender" class="custom-select">
                                                <option value="Male">Male </option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="custom-select">
                                                <option value="">Select</option>
                                                <option value="Data_Analyst">Data Analyst</option>
                                                <option value="Revenue_Offier">Revenue Officer</option>
                                                <option value="University_Registrar">University Registrar </option>
                                                <option value="admin">System Admin</option>
                                                <option value="Student">Student </option>
                                            </select>
                                        </div>
                                        <div id="demo"></div>

                                        <div class="form-group">
                                            <label for="costDepartement">College</label>
                                            <select name="collegeName" id="costDepartement" class="form-control custom-select">
                                                <option value="">Select Category</option>
                                                <?php
                                                  $result = mysqli_query($conn, "SELECT * FROM subcategory where 1");
                                                  while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?php echo $row["subcategoryName"]; ?>"><?php echo $row["subcategoryName"]; ?></option>
                                                <?php
                                                  }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="userName" class="form-control is-valid"
                                                id="fullName" pattern=".([A-zÀ-ž0-9]){3,10}" title="3 to 10 characters" placeholder="Enter 3 to 10 characters"
                                                required>
                                            <div class="invalid-feedback">
                                                Enter valid username
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="dateOfBirth">Date of Birth</label>
                                            <input type="date" name="dateOfBirth" class="form-control" id="dateOfBirth" required>
                                            <div class="invalid-feedback">
                                                Please enter your date of birth.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control is-valid" id="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" required>
                                            <div class="invalid-feedback">
                                                Please enter a valid email address.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control is-valid" name="password"
                                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$"
                                                title="Must contain at least one uppercase letter, one lowercase letter, and one number ,Minimum length: 6 characters"
                                                required>
                                            <div class="invalid-feedback">
                                                Enter valid Password
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="register" class="btn btn-primary btn-block btn">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- Main Footer -->
    <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <?php include '../include/script.php' ?>
    <script>
    $(document).ready(function() {
        $('#role').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "select_role.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result) {
                    $("#demo").html(result);
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#role').on('change', function() {
            var role = $(this).val();
            if (role === 'Student') {
                $('#collegeField').show();
            } else {
                $('#collegeField').hide();
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#role').on('change', function() {
            var role = $(this).val();
            if (role === 'Student') {
                $('#demo').show();
            } else {
                $('#demo').hide();
            }
        });
    });
    </script>

</body>

</html>
