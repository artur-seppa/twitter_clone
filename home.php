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
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- javascript -->
		<script type="text/javascript" >  
        
        //btn tweetar
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
                        document.getElementById('text').innerHTML = "";
                        atualizaTweet();
                    }
                })

            }   

            //caso o campo de tweet esteja vazia, entra na condição
            if(campo.length == 0){
                alert('ta vazio');
            }

            }

            //carrega os tweets do bd quando a página é atualizada
            function atualizaTweet(){

            $.ajax({
                url: 'get_tweet.php',
                success: function(data){
                    //passa para a div com id=tweets o responseText da pag get_tweet.php
                    $('#tweets').html(data);
                }
            });

            }

            //btn procurar usuarios encontrado na pag get_pessoas
            function btn_search(){
            let search = document.getElementById('nome_pessoa').value;

            if(search.length >= 1){
                //exerce a requisiçao para a outra página
                $.ajax({
                    url: "get_pessoas.php",
                    method: 'post',
                    data: $('#form_procurar').serialize(), 
                    success: function(data){
                        //passa para a div com id=pessoas o responseText da pag get_pessoas.php
                        $('#pessoas').html(data);

                    }
                });

            }

            if(search.length == 0){
                
            }
        }
            /*btn procurar usuarios encontrado na pag get_pessoas no qual pega o valor id_usuario
            a ser seguido e passa como parâmetro para a function*/
            function btn_seguir(id_usuario){
                alert(id_usuario);
            }

        </script>

</head>

<body onload="atualizaTweet()">
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
            <h2 class="username" style="border-bottom: 2px solid rgb(47, 51, 54);">
                <?php 
                    /* com o session iniciado anteriormente na página, capturamos o nome de usuario e 
                    o email passado pela variavel session da página de validação */
                    echo  $_SESSION['usuario'];
                ?>
            </h2>

            <div class="flex-box">
                <div class="followers">
                    <h2>Seguidores</h2>
                    <span id="seguidores">1</span>
                </div>

                <div class="followers">
                    <h2>Tweets</h2>
                    <span id="publicaçoes">1</span>
                </div>
            </div>
        </div>

        <div class="content-center">
            <h2 class="username" style="border-bottom: 2px solid rgb(47, 51, 54);">Página Inicial</h2>

    
            <form id="form_tweet" class="form_tweet">
            <!-- <textarea name="text" class="input_tweet" rows="5" cols="33" placeholder="O que está acontecendo ?" style="overflow:hidden;" resize:none; wrap="soft" maxlength="140"></textarea> -->
            <input type="text" name="texto_tweet" id="text" class="input_tweet" placeholder="O que está acontecendo ?" maxlength="140"> 
            <button type="submit" id="btn_button" class="form-bottom" onclick="btn_start()">Tweetar</button>
            </form>

            <!-- carrega os tweets para dentro da div -->
            <div id="tweets"></div>
     
        </div>

        <div class="content-right">
            <h2 class="username" style="border-bottom: 2px solid rgb(47, 51, 54);">
            Procurar por pessoas
            </h2>

            <form id="form_procurar" class="form_tweet">
            <!-- <textarea name="text" class="input_tweet" rows="5" cols="33" placeholder="O que está acontecendo ?" style="overflow:hidden;" resize:none; wrap="soft" maxlength="140"></textarea> -->
            <input type="text" name="nome_pessoa" id="nome_pessoa" onkeydown="btn_search()" class="input-search" placeholder="Buscar no Twitter" maxlength="140">
            </form>

            <!-- carrega os usuário para dentro da div -->
            <div id="pessoas"></div>
        </div>

    </div>

</html>