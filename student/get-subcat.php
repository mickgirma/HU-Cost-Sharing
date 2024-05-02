<?php
include "../db/database.php";
$category_id = $_POST["category_id"];
$result = mysqli_query($conn, "SELECT * FROM subcategory where categoryId = $category_id");
?>
<option value="">Select One Category</option>
<?php
while ($row = mysqli_fetch_array($result)) {
?>
  <option value="<?php echo $row["id"]; ?>"><?php echo $row["subcategoryName"]; ?></option>
<?php
}
?>