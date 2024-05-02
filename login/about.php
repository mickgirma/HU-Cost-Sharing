<!DOCTYPE html>

<html lang="en">
<?php include 'include/header.php';
include '../db/database.php';
require('../include/session.php');

?>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="index.php" class="img-fluid"></a>

            <h3 class="text-dark"> <b> WELLCOME  </h3> </b>
            <nav class="nav-menu d-none d-lg-block ml-auto">

                <ul>
                    <li><a href="login.php"><b>Home</b></a></li>
                      <li class="active"><a href="about.php"><b>About</b></a></li>
                    <li><a href="login.php" class="btn-get-started"><b>Login</b></a></li>
                    <li><a href="contact.php" class="btn-get-started"><b>Contact US</b></a></li>
                </ul>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->
    <section id="hero" class="d-flex justify-content-center align-items-center"
        style=" background: url('../photo1.jpg') top center;">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
           <!-- End Header  <marquee width="60%" direction="right" height="100px"><h1>HAWASSA Cost Sharing System.</h1><br/></marquee>-->
            <h1>HAWASSA University  Cost-Sharing System.</h1><br/>
        </div>
    </section>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>About Us</h2>
            <p>HAWASSA University, which is the home of technology It is one of the recently established
                public University working towards the implementation of the government’s strategy of
                expanding quality of higher education in the country.
                HAWASSA university campus provides services like student’s registration, library
                servicing, student cafeteria, store system, management servicing and cost sharing
                system etc, but our project done cost sharing management system. <br>
                Cost sharing is considered as a government loan program for higher education students
                to cover partial cost of services like health care, food, education and dormitory. Any
                student who has either graduated or under graduated from higher education of the public
                institution is required to share the cost sharing of his/her education, training and other
                Services based on cost sharing principle. </p>
        </div>
    </div><!-- End Breadcrumbs -->
    <?php include '../include/footer.php' ?>

</body>






































































</html>