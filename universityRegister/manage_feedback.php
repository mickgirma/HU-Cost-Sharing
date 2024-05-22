<!DOCTYPE html>
<html lang="en">
<?php 
include '../include/header.php';
include '../db/database.php';
include '../include/session.php';
include '../include/function.php';

// login confirmation
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
                            <h1 class="m-0 text-dark">Manage Feedback</h1>
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
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- The timeline -->
                            <div class="timeline">
                                <?php
                                $feedback_data = [];

                                // SQL query to fetch feedback along with the sender's name
                                $sql = "SELECT feedback.id AS id, feedback.date AS date, feedback.user_id AS user_id, feedback.title AS title, feedback.message AS message, user.fullName AS sender_name 
                                        FROM feedback 
                                        INNER JOIN user ON feedback.user_id = user.id 
                                        ORDER BY feedback.date DESC";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                                // Check if any records were found
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $feedback_data[] = $row;
                                    }
                                } else {
                                    echo "<p>No feedback records found.</p>";
                                }

                                // Loop through the feedback data
                                foreach ($feedback_data as $feedback) {
                                    $id = $feedback['id'];
                                    $date = $feedback['date'];
                                    $title = $feedback['title'];
                                    $message = $feedback['message'];
                                    $sender_name = $feedback['sender_name'];
                                    $date1 = new DateTime($date);
                                    $formatted_date = $date1->format('Y-m-d H:i:s');
                                    ?>

                                    <!-- timeline time label -->
                                    <div class="time-label my-2">
                                        <span class="bg-navy"><?php echo htmlentities($formatted_date) ?></span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> <?php echo timePosted($date); ?></span>
                                            <h3 class="timeline-header">
                                                <a href="#" class="sender-name"><?php echo htmlentities($sender_name) ?></a>
                                                <br>
                                                <span class="feedback-title"><?php echo htmlentities($title) ?></span>
                                            </h3>
                                            <div class="timeline-body">
                                                <?php echo htmlentities($message) ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

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

        <!-- Main Footer -->
        <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include '../include/script.php' ?>
</body>
</html>

<style>
    .bg-navy {
        background-color: #001f3f !important;
        color: #fff;
    }
    .timeline-item {
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }
    .sender-name {
        font-weight: bold;
        font-size: 1.2em;
        color: #007bff;
    }
    .feedback-title {
        font-weight: normal;
        font-size: 1em;
        color: #343a40;
    }
</style>
