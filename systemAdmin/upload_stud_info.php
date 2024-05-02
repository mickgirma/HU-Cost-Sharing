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
                            <h1 class="m-0 text-dark">Upload Graduated Student Information</h1>
                            <?php
              if (isset($_POST['sendGraduate'])) {
                echo "yes";
                $update = mysqli_query($conn, "UPDATE `studentcostfill` SET `send_graduate`='Yes' WHERE `graduated` = 'Yes'");
              }

              ?>
                            <form action="" method="post">
                                <button type="submit" name="sendGraduate" class="btn btn-primary">Send Graduate
                                    Student</button>
                            </form>
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



                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>

                                            <th>Username</th>
                                            <th>Department Name</th>

                                            <th>departmentYear</th>
                                            <th>servicesInKind</th>
                                            <th>servicesInCash</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!!------>
                                        <?php
                    $sql = mysqli_query($conn, "SELECT studentcostfill.id, subcategory.subcategoryName AS catName, `user_id`, studentcostfill.userPhoto, `parentFullName`, `parentRegion`, `parentZone`,`username`,`parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `studentStatus`, `servicesInKind`, `servicesInCash`, `withDrawDate`, `graduated`,`send_graduate` FROM `studentcostfill` INNER JOIN subcategory ON subcategory.id = studentcostfill.departmentName INNER JOIN user on user.id =`user_id` WHERE `graduated` = 'yes' && send_graduate = 'no' AND numRow ='yes'");
                    while ($row = mysqli_fetch_assoc($sql)) {
                      $user_id = $row['user_id'];
                      $userPhoto = $row['userPhoto'];
                      $username = $row['username'];


                      $parentFullName = $row['parentFullName'];
                      $parentRegion = $row['parentRegion'];
                      $parentZone = $row['parentZone'];
                      $parentCity = $row['parentCity'];
                      $parentWoreda = $row['parentWoreda'];
                      $parentHouseNumber = $row['parentHouseNumber'];
                      $parentPostalBox = $row['parentPostalBox'];
                      $schoolName = $row['schoolName'];
                      $schoolRegion = $row['schoolRegion'];
                      $schoolKebele = $row['schoolKebele'];
                      $schoolWoreda = $row['schoolWoreda'];
                      $schoolCity = $row['schoolCity'];
                      $schoolCompletedDate = $row['schoolCompletedDate'];
                      $departmentType = $row['departmentType'];
                      $departmentName = $row['departmentName'];
                      $departmentYear = $row['departmentYear'];
                      $collegeStartDate = $row['collegeStartDate'];
                      $studentStatus = $row['studentStatus'];
                      $servicesInKind = $row['servicesInKind'];
                      $servicesInCash = $row['servicesInCash'];
                      $withDrawDate = $row['withDrawDate'];
                      $catName  = $row['catName'];


                    ?>

                                        <tr>

                                            <td><?php echo htmlentities($user_id) ?></td>


                                            <td>
                                                <img src="../images/<?php echo htmlentities($userPhoto); ?>"
                                                    alt="Product 1" class="img-circle img-size-32 mr-2">
                                                <?php echo htmlentities($username) ?>
                                            </td>
                                            <td> <?php echo htmlentities($catName) ?></td>
                                            <td> <?php echo htmlentities($departmentYear) ?></td>

                                            <td><?php echo htmlspecialchars($servicesInKind) ?></td>
                                            <td><?php echo htmlspecialchars($servicesInCash) ?></td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="view_student_detail.php?id=<?php echo $user_id ?>"><i
                                                        class="fas fa-pencil-alt mr-2"></i> View</a>
                                            </td>
                                        </tr>

                                        <?php   }

                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>

                                            <th>Username</th>
                                            <th>Department Name</th>

                                            <th>departmentYear</th>
                                            <th>servicesInKind</th>
                                            <th>servicesInCash</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                    </div>

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

    <!- - REQUIRED SCRIPTS -->


        <?php include '../include/script.php' ?>
</body>

</html>