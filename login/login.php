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
      }
      if ($role == "College_Register" && $college !== 'Fresh Man') {
        // $_SESSION['college']  = $row['college'];
        header("location:../dataAnalyst/index.php");
      } else if ($role == "Inland_Revenue") {
        header("location:../inlandRevenue/index.php");
      } else if ($role == "Student") {
        header("location:../student/index.php");
      } else if ($role == "admin") {
        header("location:../universityRegister/index.php");
      }
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

?>
<body>
    <header id="header" class="fixed-top" style="background-color: #ffffff;">
        <div class="container d-flex align-items-center" >

            <a href="login.php" class="img-fluid"></a>

            <h3 class="text-dark"><h3><b></b></h3>
            <nav class="nav-menu d-none d-lg-block ml-auto">

                <ul>
                    <li style="color: #000000;"><a href="login.php"><b>Home</b></a></li>
                    <li><a href="about.php"><b>About</b></a></li>
                    <li><a href="contact.php" class="btn-get-started"><b>Contact US</b></a></li>
                </ul>
            </nav><!--nav-menu-->

        </div>
        

    </header><!-- End Header -->
    <section id="hero" class="d-flex justify-content-center align-items-center" style="background-image: url('../images/haw.jpg'); background-size: fit; background-repeat: no-repeat;">

        <div class="container position-relative"data-aos="zoom-in" data-aos-delay="100">
            <div class="col-md-6 logi" style="margin: 0 auto; text-align: center;">
                <div class="card bg-green text-center card-form">
                    <div class="card-body" style = "background-color: #00b3b3">
                        <div style="text-align: center;">
                       <!-- <h3>Well Come TO Login Page!!</h3>
                        <p>Please fill out this form to login</p>-->
                        <!-- <div class="card text-dark bg-dark shadow p-3 mt-5 mb-5 bg-white rounded">-->

                        <form action="" method="post">
                            <fieldset style="width:95%; height:60%; background-image: url('hh.jpg');  margin-top:0px">
                                <!-- <legend><img src="user.jpg"style="width:20%; background-image: hh.jpg "> -->
                          <font color=black><b>Login</b></font></legend>


                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="userName" placeholder="username"
                                    autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12">
                     <div class="row">
                    <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div></div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="login">LogIn</button>
                                 <button class="btn btn-primary" type="  reset   " name="reset">Clear</button>
                            </div>
            
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div id = "Haw" class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="1000">
                    <img src="../images/HAWASSA_side.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h4><b>Online Cost Sharing Management System</b></h4>
                    <ul>
                        <li><i class="fa fa-check-circle"></i> Fill cost-sharing documents online </li>
                             <li>
                                <i class="fa fa-check-circle"></i> Get notified instantly about trending news on cost-sharing</li>
                        <li><i class="fa fa-check-circle"></i> Get notifcation message when your student copy is ready from anywhere </li>
                    </ul>
                    <p>

                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!---<div class="login-box">
        <div id="content" style="margin-top: 50px;">

               <div style="margin: 10px;float: left;border:1px Solid #dadcdc;
                     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
                    <table cellspacing="0">
                        
                        <tr><td colspan="2"><center><img src="a.png" height=100 width=120></center></td></tr>
                        <tr><td style="font-weight: bold;">Full Name:</td><td>Muluye Fentie</td></tr>
                        <tr><td style="font-weight: bold;">ID:</td><td>TER/4682/07</td></tr>
                        <tr><td style="font-weight: bold;">Department:</td><td>Information Technology</td></tr>
                        <tr><td style="font-weight: bold;">University:</td><td>Debre Markos </td></tr>
                        <tr><td style="font-weight: bold;">Email:</td><td>m_click2010@gmail.com</td></tr>
                        
                    </table>
</div>

<div style="margin: 10px;float: left;border:1px Solid #dadcdc;
                     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
                    <table cellspacing="0">
                        
                        <tr><td colspan="2"><center><img src="a3.png" height=100 width=120></center></td></tr>
                        <tr><td style="font-weight: bold;">Full Name:</td><td>Nardos Enawgaw</td></tr>
                        <tr><td style="font-weight: bold;">ID:</td><td>TER/1495/08</td></tr>
                        <tr><td style="font-weight: bold;">Department:</td><td>Information Technology</td></tr>
                        <tr><td style="font-weight: bold;">University:</td><td>Debre Markos </td></tr>
                        <tr><td style="font-weight: bold;">Email:</td><td>nardi_click2010@gmail.com</td></tr>  
                         </table>
                          </div>
<br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/>

<div style="margin: 10px;float: left;border:1px Solid #dadcdc;
                     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
                    <table cellspacing="0">
                        
                        <tr><td colspan="2"><center><img src="editor/userphoto/ma.jpg" height=100 width=120 alt="insert image"></center></td></tr>
                        <tr><td style="font-weight: bold;">Full Name:</td><td>Memar Alemayehu</td></tr>
                        <tr><td style="font-weight: bold;">ID:</td><td>TER/4677/07</td></tr>
                        <tr><td style="font-weight: bold;">Department:</td><td>Information Technology</td></tr>
                        <tr><td style="font-weight: bold;">University:</td><td>Debre Markos </td></tr>
                        <tr><td style="font-weight: bold;">Email:</td><td>memar_click2010@gmail.com</td></tr>
                        
                    </table>
</div>
<div style="margin: 10px;float: left;border:1px Solid #dadcdc;
                     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
                    <table cellspacing="0">
                        
                        <tr><td colspan="2"><center><img src="hg.JPG" height=100 width=120 alt="insert image"></center></td></tr>
                        <tr><td style="font-weight: bold;">Full Name:</td><td>Yitayal Mengigiste</td></tr>
                        <tr><td style="font-weight: bold;">ID:</td><td>TER/4700/07</td></tr>
                        <tr><td style="font-weight: bold;">Department:</td><td>Information Technology</td></tr>
                        <tr><td style="font-weight: bold;">University:</td><td>Debre Markos </td></tr>
                        <tr><td style="font-weight: bold;">Email:</td><td>yitu_click2010@gmail.com</td></tr>
                    </table>
</div>
</div>  --->

    <?php include '../include/footer.php' ?>
</body>

</html>