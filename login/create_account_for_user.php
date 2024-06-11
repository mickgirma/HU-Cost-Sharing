<?php
include '../db/database.php';
include '../include/function.php';
include '../include/session.php';

$msg = "";
$msgClass = "";
$userNameError = "";
if (isset($_POST['register'])) {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $userName = escape($_POST['userName']);
    $phoneNumber = escape($_POST['phoneNumber']);
    $password = escape($_POST['password']);
    $dateOfBirth = escape($_POST['dateOfBirth']);
    $email = escape($_POST['email']);
    $college = escape($_POST['collegeName']);
    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

    $studentId = isset($_POST['studentId']) ? $_POST['studentId'] : "no";
    $FreshStudent = isset($_POST['FreshStudent']) ? $_POST['FreshStudent'] : "";
    $Gender = escape($_POST['Gender']);
    $userPhoto = $_FILES['userPhoto']['name'];
    $role = escape($_POST['role']);

    $fileExt = explode('.', $userPhoto);
    $fileActExt = strtolower(end($fileExt));
    $allowedImg = ['png', 'jpeg', 'jpg'];
    $fileNew = rand() . "$userName" . "." . $fileActExt;
    $coverImage = '../images/' . $fileNew;

    $select_username = mysqli_query($conn, "SELECT `userName` FROM `user` WHERE userName= '$userName'");
    if (mysqli_num_rows($select_username) > 0) {
        $userNameError = "Sorry, username already taken. Try again with a unique username.";
    } else {
        if (move_uploaded_file($_FILES['userPhoto']['tmp_name'], $coverImage)) {
            // Image uploaded successfully
        }

        $sql = mysqli_query($conn, "INSERT INTO `user`(`fullName`, `userName`, `phoneNumber`, `Gender`, `password`, `userPhoto`, `role`, `studentId`, `FreshStudent`, `college`, `DOB`, `email`)
            VALUES ('$fullName', '$userName', '$phoneNumber', '$Gender', '$hashedPassword', '$coverImage', '$role', '$studentId', '$FreshStudent', '$college', '$dateOfBirth', '$email')");
        if ($sql) {
            $msg = "Account Created Successfully";
            $msgClass = "alert-success";
        } else {
            $msgClass = "alert-danger";
            $msg = "Can't create account";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../include/header.php'; ?>
    <style>
        .img-thumbnail {
            border-radius: 50%;
            height: auto;
            max-width: 50%;
        }
        .alert {
            margin-top: 20px;
        }
        .form-group img {
            margin-top: 10px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
     
    </style>
</head>

<body class="justify-content-center align-items-center">
    <?php include 'include/navbar.php'; ?>
    <div class="wrapper">

        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <?php if ($msg != '') : ?>
                        <div class="alert <?php echo $msgClass; ?> text-center">
                            <?php echo $msg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data" class="was-validated">
                        <div class="card text-dark bg-light shadow p-3 mt-5 mb-5 bg-white rounded">
                            <h4 class="card-header"><strong>Create Account</strong></h4>
                            <div class="card-body">
                                <?php if ($userNameError) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $userNameError; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="userPhoto">User Image</label>
                                            <input type="file" name="userPhoto" class="form-control-file" id="userPhoto" accept="image/*" onchange="preview_image(event)">
                                            <img id="output_image" class="img-thumbnail" />
                                        </div>
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" name="fullName" class="form-control is-valid" id="fullName" pattern=".([A-zÀ-ž\s]){2,40}" title="2 to 40 characters" required>
                                            <div class="invalid-feedback">Please enter a full name.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control is-valid" id="email" required>
                                            <div class="invalid-feedback">Please enter a valid email address.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phoneNumber">Phone Number</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+251</div>
                                                </div>
                                                <input type="text" name="phoneNumber" class="form-control is-valid" id="phoneNumber" pattern="\d{9}" title="Exactly 9 digits" required>
                                            </div>
                                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Gender">Gender</label>
                                            <select name="Gender" id="Gender" class="custom-select" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a gender.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="FreshStudent">Freshman</label>
                                            <select name="FreshStudent" id="FreshStudent" class="custom-select" required>
                                                <option value="">Select Yes or No</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="invalid-feedback">Please select an option.</div>
                                        </div>
                                        <div class="form-group">
    <label for="studentId">Student ID</label>
    <input type="text" name="studentId" class="form-control is-valid" id="studentId" pattern="[a-zA-Z0-9/]{12,}" title="At least 12 characters containing letters, numbers, and slashes" placeholder="Enter at least 12 characters" required>
    <div class="invalid-feedback">Please enter a valid student ID with at least 12 characters containing letters, numbers, and slashes.</div>
</div>

<div  class="form-group d-none">
                                          <label for="role">Role</label>
                                          <select name="role" id="role" class="custom-select">
                                            
                                           
                                            <option value="Student">Student </option>
                                            
                                          </select>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label for="collegeName">College</label>
                                            <select name="collegeName" id="collegeName" class="custom-select" required>
                                                <option value="">Select College</option>
                                                <?php
                                                $result = mysqli_query($conn, "SELECT * FROM subcategory WHERE 1");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='" . $row["subcategoryName"] . "'>" . $row["subcategoryName"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Please select a college.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userName">Username</label>
                                            <input type="text" name="userName" class="form-control is-valid" id="userName" pattern=".([A-zÀ-ž0-9]){3,10}" title="3 to 10 characters" placeholder="Enter 3 to 10 characters" required>
                                            <div class="invalid-feedback">Please enter a valid username.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dateOfBirth">Date of Birth</label>
                                            <input type="date" name="dateOfBirth" class="form-control" id="dateOfBirth" required>
                                            <div class="invalid-feedback">Please enter your date of birth.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control is-valid" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$" title="Must contain at least one uppercase letter, one lowercase letter, and one number. Minimum length: 6 characters." required>
                                            <div class="invalid-feedback">Please enter a valid password.</div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </div>

    <?php include '../include/script.php'; ?>

    <script>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
