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

    /*a variavel deixar_seguir_id_usuario do home.php que recebeu o valor de id do usuario 
    é passado para a variavel deixar_seguir_id_usuario por meio do method POST nessa pag*/
    $deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];
    $id_usuario = $_SESSION['id_usuario'];

    /*se o deixar_seguir_id_usuario OU id_usuario estiverem vazios, entra na condiçao*/
    if($deixar_seguir_id_usuario == "" || $id_usuario == ""){
        //a function die quebra a aplicaçao ao ser chamada
        die();
        
    }

        $objDb = new db();
        $link = $objDb->connecta_mysql();

        /*deleta da tabela usuarios_seguidores, onde estiver o id_usuario da sessao "E"
        o id_usuario (seguindo_id_usuario) da pessoa a deixar de ser seguida*/
        $sql = " DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario 
        AND seguindo_id_usuario = $deixar_seguir_id_usuario";
        
        mysqli_query($link, $sql);

?>