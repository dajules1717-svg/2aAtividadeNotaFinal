<?php
include 'database.php';
if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
    $descricao = $_POST['descricao'];
    $vencimento = $_POST['vencimento'];
    $stmt = $conn->prepare("INSERT INTO tarefas (descricao, vencimento, concluida) VALUES (?, ?, 0)");
    $stmt->execute([$descricao, $vencimento]);
}
header("Location: index.php");
?>
