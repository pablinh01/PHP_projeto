<?php
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Listar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .user-list {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .user-list p {
            margin: 5px 0;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #007BFF;
            color: #007BFF;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #007BFF;
            color: white;
        }
        button {
            padding: 10px 15px;
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <h1>Listar Usuários</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo "<div style='color: red;'>" . $_SESSION['msg'] . "</div>";
        unset($_SESSION['msg']);
    }

    // Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    // Setar a quantidade de itens por página
    $qnt_result_pg = 2;

    // Calcular o início da visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    $select_user = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
    $selected_user = mysqli_query($conn, $select_user);

    // Paginação - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id) as num_result FROM usuarios";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    // Quantidade de página
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    echo "<div class='user-list'>";
    while ($row_user = mysqli_fetch_assoc($selected_user)) {
        echo "<p><strong>ID:</strong> " . $row_user['id'] . "<br>";
        echo "<strong>Nome:</strong> " . $row_user['nome'] . "<br>";
        echo "<strong>E-mail:</strong> " . $row_user['email'] . "</p>";
    }
    echo "</div>";

    // Limitar os links antes e depois
    $max_links = 2;
    echo "<div class='pagination'>";
    echo "<a href='listar.php?pagina=1'>Primeira</a>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a>";
        }
    }

    echo "<span>$pagina</span>";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if ($pag_dep <= $quantidade_pg) {
            echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a>";
        }
    }

    echo "<a href='listar.php?pagina=$quantidade_pg'>Última</a>";
    echo "</div>";
    ?>
    <a href="index.php"><button>Cadastro</button></a>
</body>

</html>
