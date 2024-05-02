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
                            <h1 class="m-0 text-dark">View Student Information</h1>
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

                        

                        <div class="col-md-8">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>

                                                <!-- <small class="float-right">Date: 4/26/2024</small> -->
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Student Information</h4>
                                            <address>
                                                <strong></strong><br>


                                                Phone: <br>

                                                Gender: <br>
                                                Department Type: <br>
                                                Department Name: <br>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Parent Details</h4>
                                            <address>
                                                Full Name:<strong></strong><br>
                                                Address :<br>
                                                Region : <br>
                                                Wereda : <br>
                                                Zone :  <br>
                                                House Number :
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Shool Details</h4>
                                            <address>
                                                School Name:<strong></strong><br>
                                                Adress : <br>
                                                Region : <br>
                                                Wereda : <br>
                                                Kebel : <br>
                                                School Completed Date:
                                            </address>
                                        </div>
                                        <div class="col-sm-8 invoice-col">
                                            <h4>Department Detail</h4>
                                            <address>

                                                Department Name :<br>
                                                Department Year : <br>
                                                College Start Date : <br>
                                                Kebele :  <br>
                                                School Completed Date:
                                            </address>
                                        </div>
                                        <div class="col-sm-4 invoice-col">
                                            <h4>Cost Share Form Detail</h4>
                                            <address>
                                                Service In Kind :<strong></strong><br>
                                                Service In Cash :<strong> <br>

                                            </address>

                                            <!-- <a href="view_student_detail.php?id=&updateyear="
                                                onClick="return confirm('Are you sure you want to update the year?')"><i
                                                    class="far fa-check-circle"></i> Update Cost Share Year</a> -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->


                                    <div class="row">

                                        <!-- /.col -->
                                        <div class="col-6">
                                            <!-- <p class="lead">Amount Due 4/26/2024</p> -->

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>


                                                        <tr>
                                                            <th>Total:</th>

                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->


                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                     

                    </div>
                    <div class="container pb-5">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning" >  <!--<i class="fas fa-eth-sign"></i><i class="fas fa-dollar-sign">--><p> Birr</p></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Cost</span>
                                    <span class="info-box-number"></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
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

    <!-- REQUIRED SCRIPTS -->


    <?php include '../include/script.php' ?>
</body>















































</html>
