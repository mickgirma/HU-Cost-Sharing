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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1 class="m-0 text-dark">Create Account</h1>
                            
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

                    
                    
                    
                    <form action="" method="POST" enctype="multipart/form-data" class="was-validated">

                        <div class="card text-dark bg-light shadow p-3 mt-5 mb-5 bg-white rounded">
                            <div class="card-header">Create Account For Employee </div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                               
                                <div class="row">



                                    <div class="col-md-6 mt-3">
                                        <form>


                                            <div class="form-group users-list">
                                                <label for="userPhoto">User Image</label>
                                                <input type="file" name="userPhoto" class="form-control-file"
                                                    id="userPhoto" accept="image/*" onchange="preview_image(event)">
                                                <img class="img-thumbnail" id="output_image" style="border-radius: 50%;
        height: auto;
        max-width: 50%;" />
                                            </div>
                                        </form>



                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>

                                            <input type="text" name="fullName" class="form-control is-valid"
                                                id="fullName" value=""
                                                pattern=".([A-zÀ-ž\s]){5,40}" title="6 to 30 characters" required>
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
                                                    value=""
                                                    pattern=".([0-9]){9,9}" title="only 10 numbers" required>
                                            </div>


                                            <div class="invalid-feedback">
                                                Please enter Phone Number </div>

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
                                                <option value="College_Register">Data Analyst </option>
                                                <option value="Inland_Revenue">Revenue Officer </option>

                                                <option value="Student">Student </option>

                                            </select>

                                        </div>
                                        <div id="demo"></div>


                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            
                                            <!--<input type="text" name="userName" class="form-control is-valid"

                                                id="fullName" pattern=".([A-zÀ-ž0-9]){4,10}" title="5 to 10 characters"
                                                required>-->
                                                <input type="text" name="userName" class="form-control is-valid"
                                              id="fullName" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,10}$"
                                                title="Must contain at least one uppercase letter, one lowercase letter, and one number. Length: 5 to 10 characters."
                                              required>
                                        

                                            <div class="invalid-feedback">
                                                Enter valid username
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <!--<input type="password" class="form-control is-valid" name="password"
                                                pattern=".([A-zÀ-ž0-9]){4,10}" title="8 to 15 characters & numbers"
                                                required>-->
                                                <input type="password" class="form-control is-valid" name="password"
                                                 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$"
                                                  title="Must contain at least one uppercase letter, one lowercase letter, and one number ,Minimum length: 6 characters"
                                                     required>

                                            <div class="invalid-feedback">
                                                Enter valid Password
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <button type="submit" name="register"
                                                class="btn btn-primary btn-block btn">Register</button>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <!-- johoiho -->
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
</body>

</html>