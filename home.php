<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home.php</title>
</head>
<body>
    <?php 
        session_start();
        /* o session é instanciado antes de tudo e com ele é possivel acessar as variáveis
        de seção de outras páginas*/

        if(!isset($_SESSION['usuario'])){
        /*se o indice de SESSION de usuario não existe / nao tem valor,
         o usuário é direcionado a página principal*/
            header('location: index.php?erro=1');
        }
    ?>
</body>

    <a href="sair.php">Sair</a>

    usuário autenticado
    <br>
    <?php 
        /* com o session iniciado anteriormente na página, capturamos o nome de usuario e 
        o email passado pela variavel session da página de validação */
        echo $_SESSION['usuario'];

        echo  '</br>';
        
        echo $_SESSION['email'];
    ?>

</html>