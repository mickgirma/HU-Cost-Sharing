<!DOCTYPE html>

<html lang="en">
<?php include 'include/header.php';
include '../db/database.php';
require('../include/session.php');

?>
<?php
$demo = "not working";

if (isset($_POST['login'])) {
  echo  $userName = $_POST['userName'];
  echo $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT `id`, `userName`,`college`,  `password`,`userPhoto`,  `role`, `status` FROM `user` WHERE userName = '$userName' AND password='$password' AND `status`= 'active'");

  // $result = mysqli_query($conn, $sql);

  if ($result) {
    $numrows = mysqli_num_rows($result);
    if ($numrows == 1) {
      //store the result to a array and passed to variable found_user
      while ($row = mysqli_fetch_assoc($result)) {
        // $found_user  = mysqli_fetch_array($result);

        //fill the result to session variable
        $_SESSION['id']  = $row['id'];
        $_SESSION['userName'] = $row['userName'];
        $_SESSION['userPhoto'] = $row['userPhoto'];
        $role  =  $row['role'];
        $_SESSION['college']  = $row['college'];
        $college =  $row['college'];
        // $_SESSION['status'] =
      }
      if ($college == "Fresh Man") {
        header("location:../FreshManRegister/index.php");
    } else if ($role == "College_Register" && $college !== 'Fresh Man') {
        header("location:../dataAnalyst/index.php");
    } else if ($role == "Inland_Revenue") {
        header("location:../inlandRevenue/index.php");
    } else if ($role == "Student") {
        header("location:../student/index.php");
    } else if ($role == "University_Registerar") {
        header("location:../universityRegister/index.php");
    } else if ($role == "admin") {
        header("location:../systemAdmin/index.php");
    } else {
      //IF theres no result
?> <script type="text/javascript">
alert("Username or Password Not Correct/Registered! Contact Your administrator.");
window.location = "login.php";
</script>
<?php

    }
  }
}
}
?>
<body>
    <header id="header" class="fixed-top" style="background-color: #ffffff;">
        <div class="container d-flex align-items-center" >

            <a href="login.php" class="img-fluid"></a>

            <h3 class="text-dark"><h3><b></b></h3>
            <nav class="nav-menu  d-lg-block ml-auto">

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
                                <input autoFocus type="text" class="form-control" name="userName" placeholder="Username" autocomplete="on" style="background-color: rgba(255, 255, 255, 0.8);">
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
                        <li><i class="fa fa-check-circle"></i> Fill cost-sharing documents online </li>
                             <li>
                                <i class="fa fa-check-circle"></i> Get notified instantly about trending news on cost-sharing</li>
                        <li><i class="fa fa-check-circle"></i> Get notifcation message when your student copy is ready from anywhere </li>
                    </ul>
                   

                </div>
            </div>

        </div>
    </section><!-- End About Section2 -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <!-- Latest Posts section -->
                <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h2 style="text-decoration:underline;" class="py-1 text-center"><b>Latest Posts</b></h2>
                    <!-- News items grid -->
                    <div id="newsGrid" class="row justify-content-center">
                        <?php
                            // Fetching news from the database
                            $sql = mysqli_query($conn, "SELECT * FROM news ORDER BY `date` DESC");
                            $counter = 0; // Counter to keep track of news items
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $id = $row['id'];
                                $date = $row['date'];
                                $title = $row['title'];
                                $subtitle = $row['subtitle'];
                                $message = $row['message'];
                                $user_id = $row['user_id'];
                                $date1 = new DateTime($date);
                                $result = $date1->format('Y-m-d H:i:s');
                                
                                // Display news items vertically after 500px height
                                if ($counter == 3) {
                                    echo '</div><div id="additionalNews" class="row justify-content-center d-none">';
                                }
                        ?>
                                <!-- News item -->
                                <div class="p-2 m-2 col-lg-3" style="border:1px solid; border-radius: 5px;">
                                    <div class="timeline-item">
                                        <p class="time" style="font-size:0.8rem; "> <?php echo $result; ?>  <span style=" text-color:#e6b400; font-size:0.8rem; margin-left:2rem;" class="time">
                <i class="fas fa-clock"></i> <?php echo timePosted($date); ?>
            </span>  </p>
                                        
                                        <span class="timeline-header pt-2">
                                        <h4 class="text-center pb-3" style="border-bottom:1px grey solid;"><?php echo htmlentities($title) ?></h4>
                <h5 class="text-center"><?php echo htmlentities($subtitle)?></h5>
                                        </span>
                                        <div class="timeline-body">
                                            <p class="text-center"><?php echo htmlentities($message) ?></p>
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                        <?php
                                $counter++;
                            } 
                        ?>
                    </div><!-- End News items grid -->
                    <?php
                        // If there are more than three news items, show "See More" button
                        if ($counter > 3) {
                            echo '<div class="col-12 text-center my-3"><button id="seeMoreBtn" class="btn btn-primary">See More</button></div>';
                        }
                    ?>
                </div><!-- End Latest Posts section -->
            </div><!-- End row -->
        </div><!-- End container -->
    </section><!-- End About Section -->
    <?php include '../include/footer.php' ?>
    <script>
        // Function to toggle visibility of additional news items and change button text
        document.getElementById("seeMoreBtn").addEventListener("click", function() {
            document.getElementById("additionalNews").classList.toggle("d-none");
            var btnText = document.getElementById("seeMoreBtn").textContent;
            document.getElementById("seeMoreBtn").textContent = btnText === "See More" ? "See Less" : "See More";
            // Scroll to the "See More" button after toggling visibility
            document.getElementById("seeMoreBtn").scrollIntoView();
        });
    </script>
 


</body>
</html>