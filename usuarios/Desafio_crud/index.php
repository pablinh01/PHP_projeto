<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pginicial.css">

    <title>Document</title>
</head>

<body>
    <div id="cadastrar">
        <h1>Cadastrar</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <!-- Caixa para cadastrar e listar  -->
        <form action="processo.php" method="post">
            <div id="nome">
                <label>Nome:</label>
                <input type="text" name="nome" placeholder="Coloque seu Nome">
            </div>
            <div id="email">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Coloque seu Email">
            </div>
            <div id="cpf">
                <label>CPF:</label>
                <input type="number" name="cpf" placeholder="Coloque seu cpf">
            </div><br>
            <div id="botao">
                <div>
                    <input type="submit" value="Cadastrar">
                </div>
                <div>
                    <a href="listar.php"><input type="button" value="Lista dos cadastrados"></a>
                </div>
            </div>

    </div>
    </form>
    
</body>

</html>