<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $stmt = $conn->prepare("UPDATE activities SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $desc, $id);
    $stmt->execute();

    echo "Activity updated!";
}
?>