<!DOCTYPE html>

<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../include/session.php' ?>
<?php include '../db/database.php' ?>
<?php
//login confirmation
confirm_logged_in();

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
                            <h1 class="m-0 text-dark">Register</h1>
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
                            <form action="studregister.php" method="POST" enctype="multipart/form-data"
                                class="was-validated">


                                <h4 class="card-header">Fedral Democratic Republic Of Ethiopia
                                    Higher Education Cost Sharing Regulation
                                    Beneficiaries Agrement Form</h4>
                                <div class="card-body">


                                    <div class="row">



                                        <div class="col-md-6 mt-3">


                                            <div class="form-group">
                                                <label for="costShareImage">Your Image</label>
                                                <input type="file" name="userPhoto" class="form-control-file"
                                                    id="exampleFormControlFile1">
                                            </div>

                                            <h2>Mother | Adobter's
                                            </h2>

                                            <div class="form-group">
                                                <label for="fullName">full name</label>



                                                <input type="text" name="parentFullName" class="form-control is-valid"
                                                    id="fullName" required>
                                                <div class="invalid-feedback">
                                                    Please enter a Mother Full name.
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentRegion">Region</label>
                                                            <input type="text" name="parentRegion" id="parentRegion"
                                                                class="form-control is-valid" required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentZone">Zone</label>
                                                            <input type="text" name="parentZone" id="parentZone"
                                                                class="form-control is-valid" required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentWoreda">Woreda</label>
                                                            <input type="text" name="parentWoreda" id="parentWoreda"
                                                                class="form-control is-valid" required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentCity">city</label>
                                                            <input type="text" name="parentCity" id="parentCity"
                                                                class="form-control is-valid" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentHouseNumber">House
                                                                Number</label>
                                                            <input type="number" name="parentHouseNumber"
                                                                id="parentHouseNumber" class="form-control is-valid"
                                                                required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentPostalBox">P.o
                                                                Box</label>
                                                            <input type="text" name="parentPostalBox"
                                                                id="parentPostalBox" class="form-control is-valid"
                                                                required>
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>
                                            <h2>School Name where you completd our preparatory program
                                            </h2>

                                            <div class="form-group">
                                                <label for="schoolName">School name</label>



                                                <input type="text" name="schoolName" class="form-control is-valid"
                                                    id="schoolName" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a School Name
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group"><label for="schoolRegion">Region</label>
                                                        <input type="text" name="schoolRegion" id="schoolRegion"
                                                            class="form-control is-valid" required>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label for="schoolKebele">Kebel</label>
                                                        <input type="text" name="schoolKebele" id="schoolKebele"
                                                            class="form-control is-valid" required>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label for="schoolWoreda">Woreda</label>
                                                        <input type="text" name="schoolWoreda" id="schoolWoreda"
                                                            class="form-control is-valid" required>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label for="schoolCity">city</label>
                                                        <input type="text" name="schoolCity" id="schoolCity"
                                                            class="form-control is-valid" required>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="schoolCompletedDate">Completed
                                                            Date</label>
                                                        <input type="date" name="schoolCompletedDate"
                                                            id="schoolCompletedDate" class="form-control is-valid"
                                                            required>
                                                    </div>

                                                </div>
                                            </div>






                                        </div>
                                        <div class="col-md-6 mb-3">

                                            <h2>HU-CSMS


                                            </h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="departmentType">Department Type</label>
                                                        <select class="form-control" name="departmentType"
                                                            id="category-dropdown">
                                                            <option value="">Select Category</option>
                                                            <?php
                                $result = mysqli_query($conn, "SELECT * FROM category where `categoryName` !='freshman'");
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                                            <option value="<?php echo $row['id']; ?>">
                                                                <?php echo $row["categoryName"]; ?></option>
                                                            <?php
                                }
                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="SUBCATEGORY">Sub Category</label>
                                                        <select class="form-control" name="departmentName"
                                                            id="sub-category-dropdown">
                                                            <option value="">Select Sub Category</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="departmentYear">Department Year</label>
                                                        <select name="departmentYear" id="departmentYear"
                                                            class="custom-select">
                                                            <option value="First Year">First Year</option>
                                                            <option value="Second Year">Second Year </option>
                                                            <option value="Third Year">Third Year </option>
                                                            <option value="Forth Year">Forth Year </option>
                                                            <option value="Fifth Year">Fifth Year </option>
                                                             <option value="Fifth Year">six Year </option>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="collegeStartDate">College Start
                                                            Date</label>
                                                        <input type="date" name="collegeStartDate" id="collegeStartDate"
                                                            class="form-control is-valid" required>
                                                    </div>

                                                </div>

                                            </div>
                                            <h2>If you have withdraw from the university indicate
                                                date of with draw

                                            </h2>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="withDrawDate">withdraw withdraw</label>



                                                    <input type="date" name="withDrawDate" class="form-control is-valid"
                                                        id="withDrawDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="servicesInKind">what services would you demand
                                                        In Kind</label>
                                                    <select name="servicesInKind" id="servicesInKind"
                                                        class="custom-select">
                                                        <option value="Food">Food
                                                            Only</option>
                                                        <option value="Bedding">Bedding
                                                            Only </option>
                                                        <option value="Food and Bedding">Food
                                                            and
                                                            Bedding </option>
                                                        <option value="none">None </option>


                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="departmentName">what services would you demand
                                                        In Cash</label>
                                                    <select name="servicesInCash" id="departmentName"
                                                        class="custom-select">
                                                        <option value="Food">Food
                                                            Only</option>
                                                        <option value="Bedding">Bedding
                                                            Only </option>
                                                        <option value="Food and Bedding">Food
                                                            and
                                                            Bedding </option>
                                                        <option value="none">None </option>


                                                    </select>
                                                </div>

                                            </div>







                                        </div>

                                    </div>

                                </div>



                                <div class="form-group">
                                    <button type="submit" name="submit"
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


  <h>T
itle</h
5>






  <p>Si
debar content</p>






















































































































     </div>
        </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->




    <!-- REQUIRED SCRIPTS -->

























    <?php //include '../include/script.php'
  ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "get-subcat.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result) {
                    $("#sub-category-dropdown").html(result);
                }
            });
        });
    });
    </script>
</body>

</html>