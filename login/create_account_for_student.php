<!DOCTYPE html>

<html lang="en">
<?php include '../include/header.php'?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'include/navbar.php'?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'?>

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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data" class="was-validated">

                                <div class="">
                                    <div class="card-header">User Registration Form </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Charity Management System</h5>


                                        <div class="row">



                                            <div class="col-md-6 mt-3">
                                                <div class="custom-file mb-5 w-50">
                                                    <label class="custom-file-label" for="customFile">Member Of
                                                        Photo</label>
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="customFile">

                                                </div>

                                                <div class="form-group">
                                                    <label for="ID">Id</label>



                                                    <input type="text" name="ID" class="form-control is-valid" id="ID"
                                                        value="">

                                                    <div class="valid-feedback">
                                                        Please enter a Id.
                                                    </div>


                                                </div>


                                                <div class="form-group">
                                                    <label for="FirstName">First Name</label>



                                                    <input type="text" name="FirstName" class="form-control is-valid"
                                                        id="FirstName" value="">
                                                    <div class="valid-feedback">
                                                        Please enter a First Name.
                                                    </div>



                                                </div>

                                                <div class="form-group">
                                                    <label for="MiddelName">Middle Name</label>

                                                    <input type="text" name="middlename" class="form-control is-valid"
                                                        id="LastName" value="">
                                                    <div class="valid-feedback">
                                                        Please enter a middle Name
                                                    </div>



                                                </div>
                                                <div class="form-group">
                                                    <label for="LastName">last Name</label>


                                                    <input type="text" name="lastname" class="form-control is-valid"
                                                        id="GrandFatherName" value="">
                                                    <div class="valid-feedback">
                                                        Please enter a Last Name.
                                                    </div>



                                                </div>


                                                <div class="form-group">

                                                    <div>
                                                        <label for="email">Email address</label>

                                                        <input type="email" class="form-control" name="email" id="email"
                                                            aria-describedby="emailHelp" placeholder="you@example.com"
                                                            value="">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="University">University</label>

                                                        <input type="text" name="University"
                                                            class="form-control is-valid" id="LastName" value="">
                                                        <div class="valid-feedback">
                                                            Please enter University
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="College">College <span
                                                                    class="text-muted"></span></label>

                                                            <input type="text" name="College"
                                                                class="form-control is-valid" id="College" value="">
                                                            <div class="valid-feedback">
                                                                Please Enter College.
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="Department">Department <span
                                                                    class="text-muted"></span></label>

                                                            <input type="text" name="Department" class="form-control"
                                                                id="Department" value="">
                                                            <div class="valid-feedback">
                                                                Please
                                                                Enter
                                                                Department.
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Section">Section <span
                                                                    class="text-muted"></span></label>

                                                            <input type="text" name="section" class="form-control"
                                                                id="section" value="">
                                                            <div class="invalid-feedback">Please
                                                                Enter
                                                                section.

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Year">Year</label>
                                                            <select class="form-control custom-select" name="Year"
                                                                id="Year" value="">
                                                                <option> 1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>


                                                            </select>
                                                            <div class="invalid-feedback">Please
                                                                choose
                                                                one
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">

                                                            <label for="Gender">Gender</label>*

                                                            <select class="custom-select" name="gender" id="Gender">
                                                                <option value="">
                                                                    Select
                                                                    Gender
                                                                </option>
                                                                <option value="male">
                                                                    Male
                                                                </option>
                                                                <option value="female">
                                                                    Female
                                                                </option>

                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please Select
                                                                a menu</div>

                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="col-md-12 mb-3">

                                                    <!-- test -->
                                                    <!-- block ... -->
                                                    <div class="row">



                                                        <div class="col-md-6 mb-3">

                                                            <div class="form-group">
                                                                <label for="BlockNumber">Block
                                                                    Number</label>

                                                                <input type="text" name="Blocknumber"
                                                                    class="form-control is-valid" id="LastName"
                                                                    value="">
                                                                <div class="valid-feedback">
                                                                    Please enter a Block Number
                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div class="col-md-6 mb-3">

                                                            <div class="form-group">
                                                                <label for="DormNumber">Dorm
                                                                    Number</label>

                                                                <input type="text" name="Dormnumber"
                                                                    class="form-control is-valid" id="Dormnumber"
                                                                    value="">
                                                                <div class="valid-feedback">
                                                                    Please enter a Dorm Number
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">


                                                            <div class="form-group">
                                                                <label for="age">age</label>

                                                                <input type="text" name="age"
                                                                    class="form-control is-valid" id="age" value="">
                                                                <div class="valid-feedback">
                                                                    Please enter age

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="Nationality">Nationality</label>
                                                                <input type="text" name="Nationality"
                                                                    class="form-control is-valid" id="Nationality"
                                                                    value="">
                                                                <div class="valid-feedback">
                                                                    Please enter
                                                                    a Nationality.
                                                                </div>



                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Worda"> Worda</label>


                                                                    <input type="text" name="worda"
                                                                        class="form-control is-valid" id="Worda"
                                                                        value="">
                                                                    <div class="valid-feedback">
                                                                        Please enter a Worda.
                                                                    </div>


                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Keble">Keble</label>


                                                                    <input type="text" name="kebele"
                                                                        class="form-control is-valid" id="Keble"
                                                                        value="">
                                                                    <div class="valid-feedback">
                                                                        Please enter a kebele.
                                                                    </div>


                                                                </div>


                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="zone"> zone</label>


                                                                    <input type="text" name="zone"
                                                                        class="form-control is-valid" id="zone"
                                                                        value="">
                                                                    <div class="valid-feedback">
                                                                        Please enter a Worda.
                                                                    </div>


                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="address">address</label>


                                                                    <input type="text" name="address"
                                                                        class="form-control is-valid" id="address"
                                                                        value="">
                                                                    <div class="valid-feedback">
                                                                        please enter address
                                                                    </div>


                                                                </div>


                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="PhoneNumber">Phone
                                                                    Number </label>

                                                                <input type="text" name="PhoneNumber"
                                                                    class="form-control is-valid" id="PhoneNumber"
                                                                    value="">
                                                                <div class="valid-feedback">
                                                                    please enter phone number
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="region">region</label>


                                                                <input type="text" name="region"
                                                                    class="form-control is-valid" id="region" value="">
                                                                <div class="valid-feedback">
                                                                    Please enter a kebele.
                                                                </div>


                                                            </div>


                                                        </div>
                                                    </div>


                                                </div>

                                                <!-- test end -->

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">

                                                            <div>
                                                                <label for="userName">user
                                                                    Name</label>

                                                                <input type="text" name="userName"
                                                                    class="form-control is-valid" id="GrandFatherName"
                                                                    value="">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="password">password
                                                            </label>

                                                            <input type="password" name="password"
                                                                class="form-control is-invalid" id="password" value=" ">

                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="register_"
                                        class="btn btn-primary btn-block btn">Submit</button>
                                </div>
                            </form>
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
        <?php include 'include/footer.php'?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php include '../include/script.php' ?>
</body>

</html>
