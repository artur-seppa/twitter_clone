<?php 

    /* o session é instanciado antes de tudo e com ele é possivel acessar as variáveis
    de seção de outras páginas*/
    session_start();

     /*caso o usuário não esteja homologado(sem valor), ele é direcionado automaticamente 
    para a página de início da aplicaçao para que ele faça o seu login*/
    if(!isset($_SESSION['usuario'])){
        header('location: index.php?erro=1');
    }

    require_once('db.class.php');

    /*a variavel seguir_id_usuario do home.php que recebeu o valor de id do usuario 
    é passado para a variavel seguir_id_usuario por meio do method POST nessa pag*/
    $seguir_id_usuario = $_POST['seguir_id_usuario'];
    $id_usuario = $_SESSION['id_usuario'];

    /*se o seguir_id_usuario OU id_usuario estiverem vazios, entra na condiçao*/
    if($seguir_id_usuario == "" || $id_usuario == ""){
        //a function die quebra a aplicaçao ao ser chamada
        die();
        
    }

        $objDb = new db();
        $link = $objDb->connecta_mysql();

        //passa o valor de id do usuário de sessão e o id do outro usuário para a tabela
        $sql = " INSERT INTO usuarios_seguidores (id_usuario, seguindo_id_usuario) values($id_usuario, $seguir_id_usuario)";
        
        mysqli_query($link, $sql);

?>