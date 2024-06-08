<?php
include '../include/header.php';
include '../include/session.php';
include '../include/function.php';
include '../db/database.php';

// Login confirmation
confirm_logged_in();

// Define time threshold (e.g., 1 hour)
$time_threshold = 3600; // 1 hour in seconds

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if student has sent a query to a data analyst within the time threshold
    $user_id = $_SESSION['id']; // Assuming user_id is stored in session
    $send_to = isset($_POST['send_to']) ? mysqli_real_escape_string($conn, $_POST['send_to']) : 'Data_Analyst';

    // Query to check the last_sent time
    $last_sent_query = "SELECT MAX(date) AS last_sent FROM notice WHERE user_id = $user_id AND send_to = 'Data_Analyst'";
    $last_sent_result = mysqli_query($conn, $last_sent_query);
    $last_sent_row = mysqli_fetch_assoc($last_sent_result);
    $last_sent_timestamp = strtotime($last_sent_row['last_sent']);

    // Get current timestamp
    $current_timestamp = time();

    // Calculate the difference between current and last sent timestamp
    $time_diff = $current_timestamp - $last_sent_timestamp;

    if ($time_diff < $time_threshold) {
        // Prevent submission if within time threshold
        $error_message = "You can only send one application per hour. Please wait before submitting another one.";
    } else {
        // Proceed with form submission
        $analyst_id = mysqli_real_escape_string($conn, $_POST['analyst_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $date = date('Y-m-d H:i:s');

        // Update the last_sent column with the current timestamp
        $query = "INSERT INTO notice (user_id, send_to, title, message, date, last_sent) VALUES ('$user_id', '$send_to', '$title', '$message', '$date', NOW())";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $success_message = "Your query has been sent successfully.";
        } else {
            $error_message = "Failed to send your query. Please try again.";
        }
    }
}

// Fetch data analysts from the database
$analysts_query = "SELECT id, fullName FROM user WHERE role = 'Data_Analyst'";
$analysts_result = mysqli_query($conn, $analysts_query);
?>

<html lang="en">
<?php include '../include/header.php'; ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'include/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'include/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Send Application</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Send Application</li>
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
                            <?php if (!empty($success_message)): ?>
                                <div class="alert alert-success"><?php echo $success_message; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($error_message)): ?>
                                <div class="alert alert-danger"><?php echo $error_message; ?></div>
                            <?php endif; ?>

                            <div class="card">
                               
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <input type="hidden" name="send_to" value="Data_Analyst">
                                        <div class="form-group">
                                            <label for="analyst_id">Select Data Analyst:</label>
                                            <select class="form-control" id="analyst_id" name="analyst_id" required>
                                                <option value="">Select Analyst</option>
                                                <?php while ($row = mysqli_fetch_assoc($analysts_result)): ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['fullName']; ?></option>
<?php endwhile; ?>
</select>
</div>
<div class="form-group">
<label for="title">Subject:</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="message">Message:</label>
<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
</div>
<button type="submit" class="btn btn-primary">Send</button>
</form>
</div>
</div>
</div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div><!-- /.content -->
</div><!-- /.content-wrapper -->

php
Copy code
    <!-- Main Footer -->
    <?php include 'include/footer.php'; ?>
</div><!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include '../include/script.php'; ?>
</body>
</html>
