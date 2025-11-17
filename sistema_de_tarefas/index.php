<?php
include 'database.php';

if(isset($_POST['adicionar'])){
    $descricao = $_POST['descricao'];
    $vencimento = $_POST['vencimento'];
    if(!empty($descricao)){
        $stmt = $conn->prepare("INSERT INTO tarefas (descricao, vencimento, concluida) VALUES (?, ?, 0)");
        $stmt->execute([$descricao, $vencimento]);
    }
}

if(isset($_GET['concluir'])){
    $id = $_GET['concluir'];
    $stmt = $conn->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
    $stmt->execute([$id]);
}

if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ?");
    $stmt->execute([$id]);
}

$tarefas = $conn->query("SELECT * FROM tarefas")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema de Tarefas</title>
<style>
body{font-family:Arial;margin:20px;}
.tarefa{margin:5px 0;}
.concluida{text-decoration:line-through;color:gray;}
</style>
</head>
<body>
<h2>Adicionar Tarefa</h2>
<form method="post">
<input type="text" name="descricao" placeholder="Descrição da tarefa">
<input type="date" name="vencimento">
<button type="submit" name="adicionar">Adicionar</button>
</form>

<h2>Tarefas Não Concluídas</h2>
<?php foreach($tarefas as $t){ if(!$t['concluida']){ ?>
<div class="tarefa">
<?php echo $t['descricao']; ?> - <?php echo $t['vencimento']; ?>
<a href="?concluir=<?php echo $t['id']; ?>">Concluir</a>
<a href="?excluir=<?php echo $t['id']; ?>">Excluir</a>
</div>
<?php }} ?>

<h2>Tarefas Concluídas</h2>
<?php foreach($tarefas as $t){ if($t['concluida']){ ?>
<div class="tarefa concluida">
<?php echo $t['descricao']; ?> - <?php echo $t['vencimento']; ?>
<a href="?excluir=<?php echo $t['id']; ?>">Excluir</a>
</div>
<?php }} ?>
</body>
</html>
