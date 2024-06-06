<!DOCTYPE html>
<html lang="en">
<?php 
    include '../include/header.php';
    include '../db/database.php';
    include '../include/session.php';
    include '../include/function.php';

    //login confirmation
    confirm_logged_in();

    // Inserting data into the news table if the form is submitted
    if (isset($_POST['send'])) {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $message = $_POST['message'];
        $user_id = $_SESSION['id'];
        $date = $_POST['date'];

        $sql = "INSERT INTO news (user_id, send_to, title, subtitle, message, date) VALUES ('$user_id', '$subtitle', '$title', '$subtitle', '$message', '$date')";
        if(mysqli_query($conn, $sql)){
             
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    // Deleting news if requested
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($conn, "DELETE FROM news WHERE id = '$id'");
        $_SESSION['delmsg'] = "News Deleted !!";
        header("location:post_news.php");
    }
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
                            <h1 class="m-0 text-dark">Post news</h1>
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
                            <form action="post_news.php" method="post" class="was-validated">
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control is-valid" id="title" value="<?php if (isset($_POST['title'])) { echo $_POST['title']; } ?>" pattern=".([A-zÀ-ž\s]){2,100}" title="2 to 100 characters" required>
                                    <div class="invalid-feedback">Please enter title...</div>
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" name="subtitle" class="form-control is-valid" id="subtitle" value="<?php if (isset($_POST['subtitle'])) { echo $_POST['subtitle']; } ?>" pattern=".([A-zÀ-ž\s]){2,100}" title="2 to 100 characters" required>
                                    <div class="invalid-feedback">Please enter subtitle...</div>
                                </div>
                                <div class="form-group">
                                    <label>News Message</label>
                                    <textarea name="message" class="form-control is-valid" rows="3" placeholder="Enter message" pattern=".([A-zÀ-ž\s]){2,100}" title="2 to 100 characters" required spellcheck="false"></textarea>
                                    <div class="invalid-feedback">Please enter message...</div>
                                </div>
                                <button type="submit" name="send" class="btn btn-block btn-primary">Post</button>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <!-- The time line -->
                            <div class="timeline">
    <?php
        $sql = mysqli_query($conn, "SELECT * FROM news ORDER BY `date` DESC");
        while ($row = mysqli_fetch_assoc($sql)) {
            $id = $row['id'];
            $date = $row['date'];
            $title = $row['title'];
            $subtitle = $row['subtitle'];
            $message = $row['message'];
            $user_id = $row['user_id'];
            $date1 = new DateTime($date);
            $result = $date1->format('Y-m-d H:i:s');
    ?>
        <!-- timeline time label -->
        <div class="time-label">
            <span class="text-center bg-success"><?php echo htmlentities($result) ?></span>
        </div>
        <!-- /.timeline-label -->
        <!-- timeline item -->
        <div style='border:1px grey solid; border-radius:5px; background-color:white; ' class="p-2 timeline-item">
            <span class="time">
                <i class="fas fa-clock"></i> <?php echo timePosted($date); ?>
            </span>
            <span class="timeline-header">
                <h4 class="text-center pb-3" style="border-bottom:1px grey solid;"><?php echo htmlentities($title) ?></h4>
                <h5 class="text-center"><?php echo htmlentities($subtitle)?></h5>
            </span>
            <div class="timeline-body">
                <p  class="text-center"><?php echo htmlentities($message) ?></p>
            </div>
            <div class="timeline-footer">
                <form action="post_news.php" method="GET" onsubmit="return confirm('Are you sure you want to delete?')">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>

                                <!-- END timeline item -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include 'include/footer.php' ?>
    </div><!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include '../include/script.php' ?>
</body>
</html>
