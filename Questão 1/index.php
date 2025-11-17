<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livraria — Sistema de Gerenciamento</title>

    <style>
        body {
            margin: 0;
            padding: 40px;
            font-family: "Georgia", serif;
            background-color: #1c1b19;
            color: #f5f5f5;
        }

        h1 {
            text-align: center;
            font-size: 42px;
            margin-bottom: 20px;
            letter-spacing: 2px;
            color: #d7c49e;
        }

        h2 {
            margin-top: 40px;
            color: #e8d9b5;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #262522;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        table {
            width: 100%;
            margin-top: 10px;
            background: #2f2d2a;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            padding: 12px;
            background: #403e3b;
            color: #d7c49e;
            font-size: 18px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #3a3836;
        }

        tr:hover {
            background: #33312e;
        }

        .form-box {
            background: #2a2927;
            padding: 20px;
            border-left: 4px solid #d7c49e;
            margin-bottom: 30px;
            border-radius: 8px;
        }

        input {
            width: 98%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 6px;
            background: #3a3836;
            color: #f5f5f5;
        }

        button {
            margin-top: 15px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #d7c49e;
            color: #1c1b19;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #bfa776;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            opacity: 0.7;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>📚 Livraria — Sistema</h1>

    <h2>Livros cadastrados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM livros ORDER BY ano ASC");

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['autor']}</td>
                    <td>{$row['ano']}</td>
                </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <td colspan='4' style='text-align:center; color:#b3a89e;'>Nenhum livro cadastrado ainda.</td>
                </tr>
            ";
        }
        ?>
    </table>

    <h2>Adicionar livro</h2>
    <div class="form-box">
        <form action="add_book.php" method="POST">
            <input type="text" name="titulo" placeholder="Título do livro" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <input type="number" name="ano" placeholder="Ano de publicação" required>
            <button type="submit">Adicionar</button>
        </form>
    </div>

    <h2>Excluir livro</h2>
    <div class="form-box">
        <form action="delete_book.php" method="POST">
            <input type="number" name="id" placeholder="ID do livro a excluir" required>
            <button type="submit">Excluir</button>
        </form>
    </div>

</div>

<footer>
    Sistema criado para atividade acadêmica — Livraria ©
</footer>

</body>
</html>
