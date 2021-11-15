<?php 
    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objDb = new db();
    $link = $objDb->connecta_mysql();

    //efetua o insert no bd
    $sql = "insert into usuarios(usuario, email, senha)
    values ('$usuario', '$email', '$senha')";

    //executa a query np bd
    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário';
    }
?>