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
                            <h1 class="m-0 text-dark"> View Student Information</h1>
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
                                        

                                        <tr>

                                            <td></td>


                                            <td>
                                               
                                                
                                            </td>
                                            <td> </td>
                                            <td> </td>

                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="view_student_detail.php?id="><i
                                                        class="fas fa-pencil-alt mr-2"></i> View</a>
                                            </td>
                                        </tr>

                                    
                                    </tbody>
                                    
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