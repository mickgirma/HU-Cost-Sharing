<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<?php 
include 'include/header.php';
include '../db/database.php';
require('../include/session.php');

// Define the timePosted function
function timePosted($datetime) {
    $timeAgo = strtotime($datetime);
    $currentTime = time();
    $timeDifference = $currentTime - $timeAgo;
    $seconds = $timeDifference;
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);

    if ($seconds <= 60) {
        return "Just now";
    } else if ($minutes <= 60) {
        return ($minutes == 1) ? "1 minute ago" : "$minutes minutes ago";
    } else if ($hours <= 24) {
        return ($hours == 1) ? "1 hour ago" : "$hours hours ago";
    } else if ($days <= 7) {
        return ($days == 1) ? "1 day ago" : "$days days ago";
    } else if ($weeks <= 4.3) {
        return ($weeks == 1) ? "1 week ago" : "$weeks weeks ago";
    } else if ($months <= 12) {
        return ($months == 1) ? "1 month ago" : "$months months ago";
    } else {
        return ($years == 1) ? "1 year ago" : "$years years ago";
    }
}
?>

<?php
$demo = "not working";

if (isset($_POST['login'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT `id`, `userName`, `college`, `password`, `role`, `status` FROM `user` WHERE userName = '$userName' AND password='$password' AND `status`= 'active'");

    if ($result) {
        $numrows = mysqli_num_rows($result);
        if ($numrows == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['userName'] = $row['userName'];
                $role = $row['role'];
                $_SESSION['college'] = $row['college'];
                $college = $row['college'];
            }
            if ($college == "Fresh Man") {
                header("location:../FreshManRegister/index.php");
            } else if ($role == "Data_Analyst" && $college !== 'Fresh Man') {
                header("location:../dataAnalyst/index.php");
            } else if ($role == "Revenue_Officer") {
                header("location:../inlandRevenue/index.php");
            } else if ($role == "Student") {
                header("location:../student/index.php");
            } else if ($role == "University_Registrar") {
                header("location:../universityRegister/index.php");
            } else if ($role == "System_Admin") {
                header("location:../systemAdmin/index.php");
            } else {
                // IF there's no result
?> 
<script type="text/javascript">
alert("Username or Password Not Correct/Registered! Contact Your administrator.");
window.location = "login.php";
</script>
<?php
            }
        } else {
?>
<script type="text/javascript">
alert("Username or Password Not Correct/Registered! Contact Your administrator.");
window.location = "login.php";
</script>
<?php
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<body>
    <header id="header" class="fixed-top" style="background-color: #ffffff;">
        <div class="container d-flex align-items-center">
            <a href="login.php" class="img-fluid"></a>
            <h3 class="text-dark"><b>HU Cost Sharing</b></h3>
            <nav class="nav-menu d-lg-block ml-auto">
                <ul>
                    <li style="color: #000000;"><a href="login.php"><b>Home</b></a></li>
                    <li><a href="about.php"><b>About</b></a></li>
                    <li><a href="contact.php" class="btn-get-started"><b>Contact US</b></a></li>
                </ul>
            </nav><!--nav-menu-->
        </div>
    </header><!-- End Header -->

    <section id="hero" class="d-flex justify-content-center align-items-center" style="background-image: url('../images/haw.jpg'); background-size: cover; background-repeat: no-repeat;">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-md-6 logi" style="margin: 0 auto; text-align: center;">
                <div class="card bg-transparent text-center card-form" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="background-color: rgba(4, 146, 194, 0.9); color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h2 class="mb-4">Welcome to the Login Page</h2>
                        <p class="mb-4">Please fill out the form below to log in.</p>
                        <form action="" method="post">
                            <fieldset style="width: 90%; margin: 0 auto;">
                                <legend style="color: #fff; font-size: 20px;"><b>Login</b></legend>
                                <div class="form-group">
                                    <input autofocus type="text" class="form-control" name="userName" placeholder="Username" autocomplete="on" style="background-color: rgba(255, 255, 255, 0.8);">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" style="background-color: rgba(255, 255, 255, 0.8);">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember" style="color: #fff;">Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-secondary btn-block" type="reset" name="reset">Clear</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div id="Haw" class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="1000">
                    <div style="border-radius: 50%; overflow: hidden;">
                        <img src="../images/HAWASSA_side.jpg" style="border-radius: 5px;" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h4><b>Online Cost Sharing Management System</b></h4>
                    <ul>
                        <li><i class="fa fa-check-circle"></i> Fill cost-sharing documents online</li>
                        <li><i class="fa fa-check-circle"></i> Get notified instantly about trending news on cost-sharing</li>
                        <li><i class="fa fa-check-circle"></i> Get notification message when your student copy is ready from anywhere</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <section id="news" class="news">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>News</h2>
            </div>
            <div class="row">
                <?php
                $query = "SELECT title, subtitle, date FROM news ORDER BY date DESC LIMIT 3";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                        echo '<p class="card-text">' . $row['subtitle'] . '</p>';
                        echo '<p class="card-text"><small class="text-muted">' . timePosted($row['date']) . '</small></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12">';
                    echo '<p>No news available at the moment.</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section><!-- End News Section -->

</body>
</html>
