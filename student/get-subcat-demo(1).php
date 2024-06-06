<?php
include "../db/database.php";

$category_id = $_POST["category_id"];
$sql = mysqli_query($conn, "SELECT * FROM `costshareform` WHERE `collegename` = '$category_id'");
?>

<table class="table table-striped">

    <?php
  $year = "";
  $total = "";
  $status = true;

  $subMenu = mysqli_query($conn, "SELECT costshareform.id,subcategory.subcategoryName AS categoryName,`year`, `collegeName`, `tuitionFee`, `foodExpenseFee`, `beddingExpenseFee`, `userId`, `status`,`total` FROM `costshareform` INNER JOIN subcategory on subcategory.id = '$category_id'  WHERE collegeName = '$category_id' && `status` = 'active'");
  $num_row = mysqli_num_rows($subMenu);
  if ($num_row > 0) {

    while ($data = mysqli_fetch_assoc($subMenu)) {
      $total = $data['total'];

      if ($status) {
  ?>
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
        <tr>
            <td><?php echo $data['id'] ?></td>
            <td><?php echo $data['categoryName'] ?></td>
            <td><?php echo $data['tuitionFee'] ?></td>
            <td><?php echo $data['foodExpenseFee'] ?></td>
            <td><?php echo $data['beddingExpenseFee'] ?></td>
            <td class="badge bg-info"><?php echo $data['year'] ?></td>
        </tr>
        <?php
        $status = false;
      }
    }
  } else {

    echo "no data";
      ?>
        <input type="text" name="nodata" value="nodata" placeholder=" noo data" readonly required>
        <?php

    echo '';
  }

    ?>

    </tbody>
</table>

<?php

?>
