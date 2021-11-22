<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home.php</title>

    <!-- css externo -->
	<link rel="stylesheet" type= "text/css" href="home.css"/>

    <!-- font-family shippori -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto&family=Shippori+Antique&family=Shippori+Antique+B1&display=swap" rel="stylesheet">

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
    
    <div class="container">
        <div class="content-left">
            <!-- <a href="sair.php">Sair</a> -->

            usuário autenticado
            <br>
            <?php 
                /* com o session iniciado anteriormente na página, capturamos o nome de usuario e 
                o email passado pela variavel session da página de validação */
                echo  $_SESSION['usuario'];
            ?>
        </div>

        <div class="content-center">
            safsdf
        </div>
        <div class="content-right">
            sdagsd
        </div>

    </div>

</html>