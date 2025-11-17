<?php
include 'database.php';

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM livros WHERE id = $id";
    $conn->query($sql);
}

header("Location: index.php");
exit;
?>
