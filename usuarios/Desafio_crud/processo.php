<?php
session_start(); 
include_once ("conexao.php");


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

// para email usamos:
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//para cpf usamos:
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

if(empty($nome) || empty($email) || empty($cpf)) {
    $_SESSION['msg'] = "<p style='color=gray; border: solid 1px black; background-color:red'>Usuario não foi cadastrado com sucesso</p>";
    header("Location: index.php");
    exit();
};

//essa parte foi um teste para saber se o condigo estava funcionando.
// echo "Nome: $nome <br>";
// echo "Email: $email";\


// Criamos uma variável que vai receber o código para inserir dados dentro do banco dedados, o famoso insert into. E logo após criamos uma nova variável que vai executar
$create_user = "INSERT INTO usuarios(nome, email, cpf ) VALUES ('$nome', '$email', '$cpf')";
$created_user = mysqli_query($conn, $create_user);

// Agora vamos criar uma mensagem de verificação que vai ser quando o usuário foi cadastrado e não foi cadastrado com sucesso, ele vai continuar na página de cadastro, e vamos fazer isso dentro do arquivo processa.php

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color=gray; border: solid 1px black; background-color:green'>Usuario foi cadastrado com sucesso</p>";
    header("Location: index.php");
}