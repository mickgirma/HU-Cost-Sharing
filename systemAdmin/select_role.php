<?php
include "../db/database.php";
$form_data = "";
$count = 0;
$category_id = $_POST["category_id"];
$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` = '$category_id'");
while ($data = mysqli_fetch_assoc($sql)) {
  $user_role = $data['role'];

  if ($user_role == 'Student') {

    $form_data = '<div class="form-group">
<label for="studentId">Student ID</label>

<input type="text" name="studentId" class="form-control is-valid" id="studentId">


</div>
<div class="form-group">
  <label for="FreshStudent">FreshStudent</label>
  <select name="FreshStudent" id="FreshStudent" class="from-control custom-select">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>
';
  } else if ($user_role == 'Data_Analyst') {
    $college = mysqli_query($conn, "SELECT * FROM `subcategory` ORDER BY `id` ASC");
    if ($count < 1) {
      $count = 5;
?>

<div class="form-group ">
    <label for="departmentType">College Type</label>
    <select name="college" id="college" class="form-control custom-select">

        <?php
          while ($category = mysqli_fetch_assoc($college)) {
          ?>
        <option value="<?php echo $category['subcategoryName'] ?>"><?php echo $category['subcategoryName'] ?></option>

        <?php
          }
          ?>
    </select>
</div>
<?php
    }
  }
}
?>
<?php echo $form_data ?>

<?php
?>
