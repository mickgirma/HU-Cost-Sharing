<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../db/database.php' ?>
<?php include '../include/session.php' ?>
<?php include '../include/function.php' ?>
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
                            <h1 class="m-0 text-dark">Manage Notice</h1>
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
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <form action="managenotice.php" method="post" class="was-validated">
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <div class="form-group">
                                    <label for="title">Title</label>

                                    <input type="text" name="title" class="form-control is-valid" id="title" value=""
                                        pattern=".([A-zÀ-ž\s]){3,20}" title="4 to 20 characters" required>
                                    <div class="invalid-feedback">
                                        Please enter title.
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="send_to">Notice from</label>
                                    <select name="send_to" id="send_to" class="custom-select">
                                        <option value="sendToUniversity"> University Registrar</option>
                                        <option value="Inland_Revenue"> Revenue Officer</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Notice Message </label>
                                    <textarea name="message" class="form-control" rows="3" placeholder="Enter message"
                                        spellcheck="false" required></textarea>
                                </div>
                                <button type="submit" name="send" class="btn btn-block btn-primary">Send</button>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <!-- The time line -->
                            <div class="timeline">
                                

                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red"></span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            </span>

                                        <h3 class="timeline-header"><a href="#"></a>
                                            </h3>



                                        <div class="timeline-body">
                                           
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-danger btn-sm"
                                                href="managenotice.php?id=&action=delete"
                                                onClick="return confirm('Are you sure you want to Delete?')"><i
                                                    class="far fa-trash-alt"></i> delete</a>

                                        </div>
                                    </div>
                                </div>

                                



                                <!-- END timeline item -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
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