<?php
include 'database.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: index.php");
?>
