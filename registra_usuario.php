<?php 
    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    /*com a function md5 exercemos a criptografia da senha do usuário com 32 carateres alfanumericos */

    $objDb = new db();
    $link = $objDb->connecta_mysql();

    //verifica se o usuário já existe

    $usuario_existe = false;

    $sql = "select * from usuarios where usuario = '$usuario'";

    /*executa a query no bd e caso obtenha sucesso, retorna as informações(null or info) 
    do bd para a variável*/
    //se a variavel for true (obtiver informaçao do nome de usuario) entra na condição
    //caso ocorra erro de sintaxe no SELECT : imprime a mensagem de erro
    if($resultado_id = mysqli_query($link, $sql)){

        //passa a informaçao como um array para a variável
        $dados_usuario = mysqli_fetch_array($resultado_id);

        //se o usuario for iniciado e diferente de vazio entra na condiçao 
        if(isset($dados_usuario['usuario']) && !empty($dados_usuario['usuario'])){
            $usuario_existe = true;
        }

    } else{
        echo "erro ao tentar localizar o usuario";
    }

    //verifica se o email já existe

    $email_existe = false;

    $sql = "select * from usuarios where email = '$email'";

    if($resultado_id = mysqli_query($link, $sql)){

        //passa a informaçao como um array para a variável
        $dados_usuario = mysqli_fetch_array($resultado_id);

        //se o email for iniciado e diferente de vazio entra na condiçao 
        if(isset($dados_usuario['email']) && !empty($dados_usuario['email'])){
            $email_existe = true;
        }

    } else{
        echo "erro ao tentar localizar o email";
    }

    //caso o usuario OU email ja exista, entra na condição
    if($usuario_existe || $email_existe){
        
        $retorno_get = '';

        /*caso o usuario ja exista o retorno_get obtém o seu valor vazio
        concatenado com a mensagem de erro*/
        if($usuario_existe){
            $retorno_get = $retorno_get."erro_usuario=1&";
        }

        /*caso o email ja exista o retorno_get obtém o seu valor vazio
        concatenado com a mensagem de erro*/
        if($email_existe){
            $retorno_get = $retorno_get."erro_email=1&";
        }

        /*a interrogaçao separa o que o method GET deve buscar no navegador
        e cada 'e' comercial separa as variaveis GET a serem capturadas  */
        header('location: inscreva-se.php?'.$retorno_get);
        die();
        //interrompe a página ao entrar na funçao
    }

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