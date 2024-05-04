<!DOCTYPE html>
<html lang="en">
<?php include '../include/header.php' ?>
<?php include '../include/session.php' ?>
<?php include '../db/database.php' ?>
<?php
//login confirmation
confirm_logged_in();
?>
<?php
$cost_status = "hello";
$postTest = "";
$user_id = $_SESSION['id'];
$check_user = mysqli_query($conn, "SELECT * FROM `studentcostfill` WHERE `user_id` = '$user_id'");
$num_row = mysqli_num_rows($check_user);
if ($num_row ==2) {
  $uID = '';
  while ($user_data = mysqli_fetch_assoc($check_user)) {
    $uID = $user_data['id'];
  }
  $update_nomRow1 = mysqli_query($conn, "UPDATE `studentcostfill` SET `numRow1`='yes' WHERE id = '$uID'");
}
if (isset($_POST['submit'])) {

  $parentFullName = $_POST['parentFullName'];
  $userPhoto  = $_FILES['userPhoto']['name'];
  $parentRegion  = $_POST['parentRegion'];
  $parentZone = $_POST['parentZone'];
  $parentWoreda = $_POST['parentWoreda'];
  $parentCity = $_POST['parentCity'];
  $parentHouseNumber = $_POST['parentHouseNumber'];
  $parentPostalBox = $_POST['parentPostalBox'];
  $schoolName = $_POST['schoolName'];
  $schoolRegion = $_POST['schoolRegion'];
  $schoolKebele = $_POST['schoolKebele'];
  $schoolWoreda = $_POST['schoolWoreda'];
  $schoolCity = $_POST['schoolCity'];
  $schoolCompletedDate = $_POST['schoolCompletedDate'];
  $departmentType = $_POST['departmentType'];
  $departmentName = $_POST['departmentName'];
  $nodata = true;
  if (isset($_POST['nodata']) == 'nodata') {
    $nodata = false;
  }

  if ($departmentType == '') {
    $departmentType = 5;
  }
  if ($departmentName == '') {
    $departmentName = 13;
  }
  $departmentYear = $_POST['departmentYear'];
  if ($departmentYear == 'First Year') {
    $year = 1;
  } else if ($departmentYear == 'Second Year') {
    $year = 2;
  } else if ($departmentYear == 'Third Year') {
    $year = 3;
  } else if ($departmentYear == 'Forth Year') {
    $year = 4;
  } else if ($departmentYear == 'Fifth Year') {
    $year = 5;
  }
  else if ($departmentYear == 'six Year') {
    $year = 6;
  }

  if (isset($_POST['numRow'])) {
    $numRow = $_POST['numRow'];
  } else {
    $numRow = "no";
  }
  $fileExt = explode('.', $userPhoto);
  $fileActExt = strtolower(end($fileExt));
  $allowImg = array('png', 'jpeg', 'jpg');
  $fileNew = rand() . "pic" . "." . $fileActExt;  // rand function create the rand number
  $coverImage = '../images/' . $fileNew;

  if (move_uploaded_file($_FILES['userPhoto']['tmp_name'], $coverImage)) {
    //    echo $msg1 = "Image uploaded successfully";
  } else {
    //   echo  $msg1 = "Failed to upload image"; validation
  }

  $collegeStartDate = $_POST['collegeStartDate'];
  // $studentStatus = $_POST['studentStatus'];
  $servicesInKind = $_POST['servicesInKind'];
  $servicesInKind = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $servicesInKind)));
  $servicesInCash = $_POST['servicesInCash'];
  $withDrawDate = $_POST['withDrawDate'];
  $year = date("Y");
  if ($nodata) {
    $sql = "INSERT INTO `studentcostfill`(`user_id`, `userPhoto`, `parentFullName`, `parentRegion`, `parentZone`, `parentWoreda`, `parentCity`, `parentHouseNumber`, `parentPostalBox`, `schoolName`, `schoolRegion`, `schoolKebele`, `schoolWoreda`, `schoolCity`, `schoolCompletedDate`, `departmentType`, `departmentName`, `departmentYear`, `collegeStartDate`, `servicesInKind`, `servicesInCash`, `withDrawDate`,`numRow`) VALUES ('$user_id','$coverImage','$parentFullName','$parentRegion','$parentZone','$parentWoreda','$parentCity','$parentHouseNumber','$parentPostalBox','$schoolName','$schoolRegion','$schoolKebele','$schoolWoreda','$schoolCity','$schoolCompletedDate','$departmentType','$departmentName','$departmentYear','$collegeStartDate','$servicesInKind','$servicesInCash','$withDrawDate','$numRow')";
    $insert_year = mysqli_query($conn, "INSERT INTO `stud_year`( `user_id`, `year`, `status`) VALUES ('$user_id','$year','on')");

    if (mysqli_query($conn, $sql)) {
      $last_id = mysqli_insert_id($conn);
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $update = mysqli_query($conn, "INSERT INTO `studentcostshareyear`( `user_id`, `year`,`yearName`) VALUES
  ('$last_id','$year','$departmentYear')");
    $update_year = mysqli_query($conn, "UPDATE `studentcostfill` SET `cost_dep_name`='$departmentName' WHERE user_id = '$user_id'");
  } else {
    echo '<script>alert("Please fill cost share")</script>';
  }
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
                            <h1 class="m-0 text-dark">Fill Your Cost-share Information</h1>
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
                        <?php
            $disabled = "";
            $parentFullName = "";
            $parentRegion  = "";
            $parentZone = "";
            $parentWoreda = "";
            $parentCity = "";
            $parentHouseNumber = "";
            $parentPostalBox = "";
            $schoolName = "";
            $schoolRegion = "";
            $schoolKebele = "";
            $schoolWoreda = "";
            $schoolCity = "";
            $collegeStartDate ="";
            $currentUserId = $_SESSION['id'];
            $year = date("Y");
            $checkuser = mysqli_query($conn, "SELECT * FROM `studentcostfill` WHERE `user_id` = '$currentUserId' AND `cost_stat` = 'on' AND 'departmentYear' = '$year' ");
            $current_user = mysqli_query($conn, "SELECT * FROM`studentcostfill` WHERE `user_id` = '$currentUserId'");
            $numrows = mysqli_num_rows($checkuser);
            $current_user_num = mysqli_num_rows($current_user);
            if ($current_user_num > 0) {
              $disabled = 'readonly';
              while ($data = mysqli_fetch_assoc($current_user)) {
                $parentFullName = $data['parentFullName'];
                $parentRegion  = $data['parentRegion'];
                $parentZone = $data['parentZone'];
                $parentWoreda = $data['parentWoreda'];
                $parentCity = $data['parentCity'];
                $parentHouseNumber = $data['parentHouseNumber'];
                $parentPostalBox = $data['parentPostalBox'];
                $schoolName = $data['schoolName'];
                $schoolRegion = $data['schoolRegion'];
                $schoolKebele = $data['schoolKebele'];
                $schoolWoreda = $data['schoolWoreda'];
                $schoolCity = $data['schoolCity'];
                $schoolCompletedDate = $data['schoolCompletedDate'];
                $collegeStartDate = $data['collegeStartDate'];
              }
            }
           $checkuserGraduate = mysqli_query($conn, "SELECT COUNT(*) AS totalRegisters FROM studentcostfill WHERE user_id = '$currentUserId'");
    $row = mysqli_fetch_assoc($checkuserGraduate);
$totalRegisters = $row['totalRegisters'];

if ($totalRegisters >= 4 && $totalRegisters <= 6) {
    echo $currentUserId;
    echo $postTest = "Graduated";
} else 
              // echo $parentFullName;

            ?>

                        <div class="col-md-12">
                            <?php echo $postTest; ?>
                            <form action="fill_cost_share.php" method="POST" enctype="multipart/form-data"
                                class="was-validated">


                                <?php echo $postTest; ?>

                                <div class="card-header"><h4><b>FEDRAL DEMOCRATIC REPUBLIC OF ETHIOPIA
                                    HIGHER EDUCATION COST SHARING REGULATION
                                    BENEFICIARIES AGREEMENT FORM
</b></h4></div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6 mt-3">

                                            <div class="card mt3">
                                                <div class="number">1
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title"></div>
                                                    <div class="row">
                                                        <?php
                              $select_student = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$user_id'");
                              $FreshStudent = "";
                              $msgClass = "";

                              while ($data = mysqli_fetch_assoc($select_student)) {
                                $FreshStudent = $data['FreshStudent'];
                              }
                              if ($FreshStudent == 'No') {
                              } else if ($FreshStudent == 'Yes') {

                                $msgClass = "d-none";

                                echo '<input type="text" name="numRow" value="yes" hidden>';
                              ?>

                                                        <div class="form-group col-md-6">
                                                            <label for="departmentType">Department Type</label>
                                                            <select class="form-control" name="departmentType"
                                                                id="category-dropdown">

                                                                <option value="5">Fresh Man</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="SUBCATEGORY">Sub Category</label>
                                                            <select class="form-control" name="departmentName">

                                                                <option value="13">Fresh Man</option>
                                                            </select>
                                                        </div>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Num</th>
                                                                    <th>College Name</th>
                                                                    <th>Tuition Fee</th>
                                                                    <th>Food Expense Fee</th>
                                                                    <th>Bedding Expense Fee</th>
                                                                    <th>Year</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                    $year = "";
                                    $total = "";


                                    $subMenu = mysqli_query($conn, "SELECT costshareform.id,subcategory.subcategoryName AS categoryName,`year`, `collegeName`, `tuitionFee`, `foodExpenseFee`, `beddingExpenseFee`, `userId`, `status`,`total` FROM `costshareform` INNER JOIN subcategory on subcategory.id = 13  WHERE collegeName = 13 && `status` = 'active'");
                                    $loop = true;
                                    while ($data = mysqli_fetch_assoc($subMenu)) {
                                      $total = $data['total'];
                                      if ($loop) {
                                        $loop  = false;




                                    ?>
                                                                <tr>
                                                                    <td><?php echo $data['id'] ?></td>
                                                                    <td><?php echo $data['categoryName'] ?></td>
                                                                    <td><?php echo $data['tuitionFee'] ?></td>
                                                                    <td><?php echo $data['foodExpenseFee'] ?></td>
                                                                    <td><?php echo $data['beddingExpenseFee'] ?></td>
                                                                    <td class="badge bg-info">
                                                                        <?php echo $data['year'] ?></td>
                                                                </tr>
                                                                <?php
                                      }


                                      ?>




                                                            </tbody>
                                                        </table>
                                                        <?php

                                    }
                                  }


                            ?>
                                                        <?php
                            if ($msgClass == 'd-none') {
                            } else {
                            ?>

                                                        <div class="form-group col-md-6">
                                                            <label for="departmentType">Department Type</label>
                                                            <select class="form-control" name="departmentType"
                                                                id="category-dropdown" required>
                                                                <option value="">Select Category</option>
                                                                <?php
                                  $result = mysqli_query($conn, "SELECT * FROM category where `categoryName` != 'freshman'");
                                  while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                                                <option value="<?php echo $row['id']; ?>">
                                                                    <?php echo $row["categoryName"]; ?></option>
                                                                <?php
                                  }
                                  ?>
                                                            </select>
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                            <label for="SUBCATEGORY">Sub Category</label>
                                                            <select class="form-control" name="departmentName"
                                                                id="sub-category-dropdown" required>
                                                                <option value="">Select Sub Category</option>
                                                            </select>
                                                        </div>
                                                        <?php
                            }

                            ?>

                                                    </div>
                                                    <div id="demo"></div>
                                                </div>
                                            </div>


                                            <?php echo $cost_status; ?>

                                            <div class="card mt3">
                                                <div class="number">2
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title"></div>
                                                    <div class="form-group">
                                                        <label for="costShareImage">Your Image</label>
                                                        <input type="file" name="userPhoto" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt3">
                                                <div class="number">3
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title"></div>
                                                    Mother Adobter's

                                                </div>

                                                <div class="row p-2">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label for="fullName">full name</label>



                                                            <input type="text" name="parentFullName"
                                                                class="form-control is-valid" id="fullName"
                                                                pattern=".([A-zÀ-ž\s]){6,40}" title="6 to 30 characters"
                                                                value="<?php echo empty($parentFullName) ? '' : $parentFullName ?>"
                                                                <?php echo $disabled ?> required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Mother Full name.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentRegion">Region</label>
                                                            <input type="text" name="parentRegion" id="parentRegion"
                                                                class="form-control is-valid"
                                                                pattern=".([A-zÀ-ž0-9\s]){2,20}"
                                                                title="2 to 15 characters"
                                                                value="<?php echo $parentRegion ?>"
                                                                <?php echo $disabled ?> required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentZone">Zone</label>
                                                            <input type="number/text" name="parentZone" id="parentZone"
                                                                class="form-control is-valid"
                                                                pattern=".([A-zÀ-ž0-9\s]){1,20}"
                                                                title="1 to 15 characters"
                                                                value="<?php echo $parentZone ?>"
                                                                <?php echo $disabled ?>>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentWoreda">Woreda</label>
                                                            <input type="text" name="parentWoreda" id="parentWoreda"
                                                                class="form-control is-valid"
                                                                 pattern=".([A-zÀ-ž0-9\s]){1,20}"
                                                                title="1 to 15 characters"
                                                                value="<?php echo $parentWoreda ?>"
                                                                <?php echo $disabled ?> required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentCity">city/town</label>
                                                            <input type="text" name="parentCity" id="parentCity"
                                                                class="form-control is-valid"
                                                                pattern=".([A-zÀ-ž\s]){2,20}" title="2 to 15 characters"
                                                                value="<?php echo $parentCity ?>"
                                                                <?php echo $disabled ?> required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row p-2">
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentHouseNumber">House
                                                                Number</label>
                                                            <input type="number" name="parentHouseNumber"
                                                                id="parentHouseNumber" class="form-control is-valid"
                                                                value="<?php echo $parentHouseNumber ?>"
                                                                <?php echo $disabled ?> required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"><label for="parentPostalBox">P.o
                                                                Box</label>
                                                            <input type="number" name="parentPostalBox"
                                                                id="parentPostalBox" class="form-control is-valid"
                                                                value="<?php echo $parentPostalBox ?>"
                                                                <?php echo $disabled ?>>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="row">
                                                <div class="card mt3">
                                                    <div class="number">4
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-title">School Name where you completed our
                                                            preparatory program
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label for="schoolName">School name</label>



                                                            <input type="text" name="schoolName"
                                                                class="form-control is-valid" id="schoolName"
                                                                pattern=".([A-zÀ-ž\s]){3,40}" title="4 to 30 characters"
                                                                value="<?php echo $schoolName ?>"
                                                                <?php echo $disabled ?> required>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please enter a School Name
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group"><label
                                                                        for="schoolRegion">Region</label>
                                                                    <input type="text" name="schoolRegion"
                                                                        id="schoolRegion" class="form-control is-valid"
                                                                        pattern=".([A-zÀ-ž0-9\s]){2,20}"
                                                                        title="2 to 15 characters"
                                                                        value="<?php echo $schoolRegion ?>"
                                                                        <?php echo $disabled ?> required>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group"><label
                                                                        for="schoolKebele">Kebel</label>
                                                                    <input type="number/text" name="schoolKebele"
                                                                        id="schoolKebele" class="form-control is-valid"
                                                                         pattern=".([A-zÀ-ž0-9\s]){1,20}"
                                                                         title="1 to 15 characters"
                                                                        value="<?php echo $schoolKebele ?>"
                                                                        <?php echo $disabled ?>>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group"><label
                                                                        for="schoolWoreda">Woreda</label>
                                                                    <input type="number/text" name="schoolWoreda"
                                                                        id="schoolWoreda" class="form-control is-valid"
                                                                         pattern=".([A-zÀ-ž0-9\s]){1,20}"
                                                                         title="1 to 15 characters"
                                                                        value="<?php echo $schoolWoreda ?>"
                                                                        <?php echo $disabled ?> required>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group"><label
                                                                        for="schoolCity">city/town</label>
                                                                    <input type="text" name="schoolCity" id="schoolCity"
                                                                        class="form-control is-valid"
                                                                        pattern=".([A-zÀ-ž\s]){1,40}"
                                                                        title="1 to 40 characters"
                                                                        value="<?php echo $schoolCity ?>"
                                                                        <?php echo $disabled ?> required>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group"><label
                                                                        for="schoolCompletedDate">Completed
                                                                        Date</label>
                                                                    <input type="date" name="schoolCompletedDate"
                                                                        id="schoolCompletedDate"
                                                                        class="form-control is-valid"
                                                                        value="<?php echo $schoolCompletedDate ?>"
                                                                        <?php echo $disabled ?> required>
                                                                </div>

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="number">5
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-title"></div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="departmentYear">Department Year</label>
                                                                    <select name="departmentYear" id="departmentYear"
                                                                        class="custom-select">
                                                                        <option value="First Year">First Year</option>
                                                                        <option value="Second Year">Second Year
                                                                        </option>
                                                                        <option value="Third Year">Third Year </option>
                                                                        <option value="Forth Year">Forth Year </option>
                                                                        <option value="Fifth Year">Fifth Year </option>
                                                                        <option value="Fifth Year">Six Year </option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group"><label
                                                                        for="collegeStartDate">College Start
                                                                        Date</label>
                                                                    <input type="date" name="collegeStartDate"
                                                                        id="collegeStartDate"
                                                                        class="form-control is-valid"
                                                                        value="<?php echo $collegeStartDate ?>"
                                                                        <?php echo $disabled ?> required>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="number">7
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">if you have withdraw from the university
                                                        indicate
                                                        date of with draw</h5>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="withDrawDate">withdraw date</label>

                                                            <input type="date" name="withDrawDate"
                                                                class="form-control is-valid" id="withDrawDate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="card">
                                                    <div class="number">8
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title"> what services would you
                                                                    demand</h5>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="servicesInKind">
                                                                    In Kind please select</label>
                                                                <select name="servicesInKind" id="servicesInKind"
                                                                    class="custom-select">
                                                                    <option value="Food">Food
                                                                        Only</option>
                                                                    <option value="Bedding">Bedding
                                                                        Only </option>
                                                                    <option value="Food and Bedding">Food
                                                                        and
                                                                        Bedding </option>
                                                                    <option value="none">None </option>


                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="departmentName">what services would you
                                                                    demand
                                                                    In Cash please select</label>
                                                                <select name="servicesInCash" id="departmentName"
                                                                    class="custom-select">
                                                                    <option value="Food">Food
                                                                        Only</option>
                                                                    <option value="Bedding">Bedding
                                                                        Only </option>
                                                                    <option value="Food and Bedding">Food
                                                                        and
                                                                        Bedding </option>
                                                                    <option value="none">None </option>


                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-block btn">Submit</button>
                                </div>

                            </form>
                        </div>
                        <?php
            
            ?>
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


  <h>T
itle</h
5>






  <p>Si
debar content</p>


     </div>
        </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include 'include/footer.php' ?>
    </div>
    <!-- ./wrapper -->




    <!-- REQUIRED SCRIPTS -->




    <?php include '../include/script.php'
  ?>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
    <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {

            var category_id = this.value;
            $.ajax({
                url: "get-subcat.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result) {
                    $("#sub-category-dropdown").html(result);
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $('#cost').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "get-subcat-demo.php",
                type: "POST",



             data: {
                    category_id: category_id
                },
                cache: false,



                success: function(result) {

                    $("#cost_share").html(result);
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $('#sub-category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "get-subcat-demo.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result) {
                    $("#demo").html(result);
                }
            });
        });
    });
    </script>
</body>


</html>