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

    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- javascript -->
		<script type="text/javascript" >  

        function btn_start(){

            let campo = document.getElementById('text').value;

            //caso o campo de tweet esteja cheia, entra na condição
            if(campo.length >= 1){
                
                //exerce a requisiçao para a outra página
                $.ajax({
                    url: "inclui_tweet.php",
                    method: 'post',
                    data: $('#form_tweet').serialize(), 
                    success: function(data){
                        
                    }
                })

            }   

            //caso o campo de tweet esteja vazia, entra na condição
            if(campo.length == 0){
                alert("esta vazio");
            }

        }
        
        </script>

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
             <a href="sair.php">Sair</a> 
            <h2 class="username">
                <?php 
                    /* com o session iniciado anteriormente na página, capturamos o nome de usuario e 
                    o email passado pela variavel session da página de validação */
                    echo  $_SESSION['usuario'];
                ?>
            </h2>

            <hr>
            <div class="flex-box">
                <div class="followers">
                    <h2>Seguidores</h2>
                    <span id="seguidores">1</span>
                </div>

                <div class="followers">
                    <h2>Tweets</h2>
                    <span id="tweets">1</span>
                </div>
            </div>
        </div>

        <div class="content-center">
            <h2 class="username">Página Inicial</h2>

            <hr>

    
                <form id="form_tweet" class="form_tweet">
                <!-- <textarea name="text" class="input_tweet" rows="5" cols="33" placeholder="O que está acontecendo ?" style="overflow:hidden;" resize:none; wrap="soft" maxlength="140"></textarea> -->
                <input type="text" name="texto_tweet" id="text" class="input_tweet" placeholder="O que está acontecendo ?" maxlength="140"> 
                <button type="submit" id="btn_button" class="form-bottom" onclick="btn_start()">Tweetar</button>
                </form>
     
        </div>
        <div class="content-right">
            <h2>Procurar por pessoas</h2>
        </div>

    </div>

</html>