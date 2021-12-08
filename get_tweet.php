<?php 

    session_start();
    /* o session é instanciado antes de tudo e com ele é possivel acessar as variáveis
    de seção de outras páginas*/

    /*caso o usuário não esteja homologado(sem valor), ele é direcionado automaticamente 
    para a página de início da aplicaçao para que ele faça o seu login*/
    if(!isset($_SESSION['usuario'])){
        header('location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->connecta_mysql();

    /*seleciona os tweets da tabela a partir do ordenamento da data_inclusao
    de forma decrescente(DESC), ou seja, da data mais nova para a mais antiga. E também 
    seleciona a partir do OR(OU) o id_usuario de outros usuarios a partir da tabela usuarios_seguidores*/

    /*o date_format altera a forma de impressao da data ficando a esquerda da variável a data que vai ser
    alterada e a direita fica a nova formatação. Após a alteraçao recebe um apelido para indicar
    o novo formato*/

    $sql = "SELECT  DATE_FORMAT(t.data_inclusao, '%d %b %y - %H:%i') as data_inclusao_format, t.tweet, u.usuario 
    FROM tweet as t JOIN usuarios as u ON(t.id_usuario = u.id) 
    WHERE id_usuario = $id_usuario 
    OR id_usuario IN (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario )
    ORDER BY data_inclusao DESC";
    //o id_usuario tem de ser igual ao id_usuario da SESSION para haver a busca

    //executa a query no bd e caso obtenha sucesso, retorna as informações(null or info) do bd para a variável
    $resultado_id = mysqli_query($link, $sql);

    //caso exista alguma informação : exerce o retorno delas para um array(null or info)
    //caso ocorra erro de sintaxe no SELECT : imprime a mensagem de erro
    if($resultado_id){

        //passa os resources como um array para a variável
        /*enquanto ainda existir info a serem passadas para o array, elas serão impressas
        uma de cada vez no echo */
        while($registro = mysqli_fetch_array($resultado_id)){
            echo '<div style="border-bottom: 1px solid rgb(47, 51, 54); margin: 4px 0;>';
                echo '<span style="color: rgb(217, 217, 217); font-weight: 600; font-size: 17px;">'.$registro['usuario'].'</span>';
                echo '<span style="color: rgb(110, 118, 125); font-weight: 400; font-size: 16px;"> · '.$registro['data_inclusao_format'].'</span>';
                echo '<span style="color: rgb(217, 217, 217); font-weight: 500; font-size: 17px;">
                <p style="margin-bottom: 3px;">'.$registro['tweet'].'</p></span>';
            echo '</div>';
        }

    }else{
        echo "erro na consulta de tweets no banco de dados";
    }

    

?>