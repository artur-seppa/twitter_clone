<?php 
    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    /*com a function md5 exercemos a criptografia da senha do usuário com 32 carateres alfanumericos */

    $objDb = new db();
    $link = $objDb->connecta_mysql();

    //efetua o insert no bd
    $sql = "insert into usuarios(usuario, email, senha)
    values ('$usuario', '$email', '$senha')";

    //executa a query no bd
    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário';
    }
?>