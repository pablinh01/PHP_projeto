<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
        <h1>Editar Usuario</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form action="proc_edit_usuario.php" method="post">
           
                <label>Nome:</label>
                <input type="text" name="nome" placeholder="Coloque seu Nome">
           
            
                <label>Email:</label>
                <input type="email" name="email" placeholder="Coloque seu Email">
         
            
                <label>CPF:</label>
                <input type="number" name="cpf" placeholder="Coloque seu cpf">
            <br>
            
                
                    <input type="submit" value="Editar">
                
                
                    <a href="listar.php"><input type="button" value="Lista dos cadastrados"></a>
                
            
    </form>
    
</body>

</html>