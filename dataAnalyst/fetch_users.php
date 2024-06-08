<?php
include '../db/database.php';

if (isset($_GET['role'])) {
    $role = $_GET['role'];

    $stmt = $conn->prepare("SELECT id, fullName FROM user WHERE role = ?");
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    echo json_encode($users);
}
?>
