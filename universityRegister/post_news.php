<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../db/database.php' ?>
<?php include '../include/session.php' ?>
<?php include '../include/function.php' ?>

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
                            <h1 class="m-0 text-dark">Post News</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <form action="manage_notice.php" method="post" class="was-validated">
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control is-valid" id="title" value="<?php if (isset($_POST['fullName'])) {
                                                                                                    echo $_POST['title'];
                                                                                                  } ?>" pattern=".([A-zÀ-ž\s]){3,20}" title="4 to 20 characters" required>
                                    <div class="invalid-feedback">
                                        Please enter title.
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>News Details</label>
                                    <textarea name="message" class="form-control is-valid" rows="3" placeholder="Enter message" pattern=".([A-zÀ-ž\s]){3,20}" title="4 to 20 characters" required spellcheck="false"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter news.
                                    </div>
                                </div>
                                <button type="submit" name="send" class="btn btn-block btn-primary">Post</button>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- PHP loop starts here -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <div class="timeline-body">
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to Delete?')"><i class="far fa-trash-alt"></i> delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                                <!-- PHP loop ends here -->
                            </div><!-- /.timeline -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content -->
        </div><!-- /.content-wrapper -->

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
    </div><!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- <?php include '../include/script.php' ?> -->
</body>
</html>
