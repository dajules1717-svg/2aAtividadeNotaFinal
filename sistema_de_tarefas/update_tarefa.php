<?php
include 'database.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: index.php");
?>
