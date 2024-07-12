<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <?php
    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="processa.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome completo"> <br><br>
        <label>email:</label>
        <input type="email" name="email" placeholder="Digite o seu e-mail"> <br><br>

        <input type="submit" value="Cadastrar">
        <a href="listar.php"><input type="button" value="Listar"></a>
    </form>
</body>
</html>