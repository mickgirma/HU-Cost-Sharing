<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php'; ?>
<?php include '../db/database.php'; ?>
<?php include '../include/session.php'; ?>
<?php include '../include/function.php'; ?>

<?php
// Login confirmation
confirm_logged_in();

$user_id = $_SESSION['id'];

if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $send_to = $_POST['send_to'];
    $specific_user = $_POST['specific_user'];
    $user_id = $_SESSION['id'];
    $date = $_POST['date'];

    if ($send_to !== 'Student' && $send_to !== 'University_Registerar' && !empty($specific_user)) {
        $send_to = $specific_user; // Override the send_to with the specific user's ID
    }

    $sql = "INSERT INTO `notice` (`user_id`, `send_to`, `title`, `message`, `date`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issss', $user_id, $send_to, $title, $message, $date);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Success handling
        $_SESSION['success'] = "Notice sent successfully!";
        header("Location: managenotice.php");
        exit();
    } else {
        // Error handling
        $_SESSION['error'] = "Failed to send notice.";
        header("Location: managenotice.php");
        exit();
    }
}

if (isset($_GET['action'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM `notice` WHERE id = '$id'");
    $_SESSION['delmsg'] = "Notice Deleted !!";
    header("location:managenotice.php");
}
?>

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
                            <h1 class="m-0 text-dark">Manage Notice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
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
                                    <input type="text" name="title" class="form-control is-valid" id="title" value="<?php if (isset($_POST['title'])) { echo $_POST['title']; } ?>" pattern=".([A-zÀ-ž\s]){2,40}" title="2 to 40 characters" required>
                                    <div class="invalid-feedback">
                                        Please enter title.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="send_to">Notice For</label>
                                    <select name="send_to" id="send_to" class="custom-select" onchange="updateUsersByRole()">
                                        <option value="University_Registerar">University Registrar</option>
                                        <option value="Revenue_Officer">Revenue Officer</option>
                                        <option value="Student">Student</option>
                                    </select>
                                </div>

                                <div class="form-group" id="specific_user_group">
                                    <label for="specific_user">Select Specific User</label>
                                    <select name="specific_user" id="specific_user" class="custom-select">
                                        <option value="">Select User</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Notice Message</label>
                                    <textarea name="message" class="form-control is-valid" rows="3" placeholder="Enter message" pattern=".([A-zÀ-ž\s]){2,40}" title="2 to 40 characters" required spellcheck="false"></textarea>
                                    <div class="invalid-feedback">
                                        Please enter message.
                                    </div>
                                </div>
                                <button type="submit" name="send" class="btn btn-block btn-primary">Send</button>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <!-- The time line -->
                            <div class="timeline">
                                <?php
                                $sql = mysqli_query($conn, "SELECT notice.id AS id, notice.date AS date, notice.user_id AS user_id, notice.title AS title, notice.send_to AS send_to, notice.message AS message, user.fullName AS full_name 
                                                            FROM notice 
                                                            INNER JOIN user ON notice.user_id = user.id 
                                                            WHERE (user_id = '$user_id' OR notice.send_to = 'Data_Analyst') AND notice.last_sent IS NULL 
                                                            ORDER BY `date` DESC");

                                while ($row = mysqli_fetch_assoc($sql)) {
                                    $id = $row['id'];
                                    $date = $row['date'];
                                    $title = $row['title'];
                                    $full_name = $row['full_name'];
                                    $send_to = $row['send_to'];
                                    $message = $row['message'];
                                    $user_id = $row['user_id'];
                                    $date1 = new DateTime($date);
                                    $result = $date1->format('Y-m-d H:i:s');
                                ?>

                                <!-- timeline time label -->
                                <div class="time-label my-2">
                                    <span class="bg-red"><?php echo htmlentities($result); ?></span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> <?php echo timePosted($date); ?></span>
                                        <h3 class="timeline-header"><a href="#"><?php echo htmlentities($title); ?></a><br>
                                        <span class="text-success"> From </span><?php echo htmlentities($full_name); ?>
                                        <span class="text-success"> to </span><?php echo htmlentities($send_to); ?> </h3>
                                        <div class="timeline-body">
                                            <?php echo htmlentities($message); ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-danger btn-sm" href="managenotice.php?id=<?php echo $id; ?>&action=delete" onClick="return confirm('Are you sure you want to Delete?')"><i class="far fa-trash-alt"></i> delete</a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                } ?>

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
        <?php include 'include/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include '../include/script.php'; ?>

    <script>
        function updateUsersByRole() {
            var role = document.getElementById('send_to').value;
            var userSelectGroup = document.getElementById('specific_user_group');
            var userSelect = document.getElementById('specific_user');

            // Clear existing options
            userSelect.innerHTML = '<option value="">Select User</option>';

            if (role === 'Student' || role === 'University_Registerar') {
                userSelectGroup.style.display = 'none';
                return;
            } else {
                userSelectGroup.style.display = 'block';
            }

            // Fetch users by role using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_users.php?role=' + role, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var users = JSON.parse(xhr.responseText);
                    users.forEach(function(user) {
                        var option = document.createElement('option');
                        option.value = user.id;
                        option.textContent = user.fullName;
                        userSelect.appendChild(option);
                    });
                }
            };
            xhr.send();
        }

        // Initial call to set the correct state of the specific user field on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateUsersByRole();
        });
    </script>
</body>
</html>
