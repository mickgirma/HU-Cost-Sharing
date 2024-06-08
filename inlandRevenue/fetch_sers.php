<?php
include '../db/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['role'])) {
    $role = $_POST['role'];
    $stmt = $conn->prepare("SELECT id, fullName FROM user WHERE role = ?");
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $stmt->close();
    echo json_encode($users);
}
?>
