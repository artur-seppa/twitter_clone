<?php 

    session_start();
    /* o session é instanciado antes de tudo e com ele é possivel acessar as variáveis
    de seção de outras páginas*/

?>

<!-- css externo -->
<link rel="stylesheet" type= "text/css" href="home.css"/>

<?php 

    /*caso o usuário não esteja homologado(sem valor), ele é direcionado automaticamente 
    para a página de início da aplicaçao para que ele faça o seu login*/
    if(!isset($_SESSION['usuario'])){
        header('location: index.php?erro=1');
    }

    require_once('db.class.php');

    //o nome da pessoa informada no form é passada pelo method POST a variável
    $nome_pessoa = $_POST['nome_pessoa'];
    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->connecta_mysql();

    /*procura o nome de usuário onde for igual a variável nome_pessoa passada no form 
    E não procura o mesmo nome de usuário da seção por meio do seu id*/
    //<> sinal de diferente no sql
    /*o like exerce uma pesquisa de apenas uma cadeia de caracteres no banco de dados,
    considerando a "%" como uma indicaçao de que ainda há uma coleção caracteres adicionais 
    a esquerda e a direita para se formar a palavra por completo*/

    /*as tabelas sao juntadas a partir do id usuario da pessoa logada e das pessoas que ela segue*/
    $sql = "SELECT u.*, us.* ";
    $sql.= "FROM usuarios AS u LEFT JOIN usuarios_seguidores AS us ";
    $sql.= "ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario) ";
    $sql.= "WHERE u.usuario like '%$nome_pessoa%' AND u.id <> $id_usuario ";

    //executa a query no bd e caso obtenha sucesso, retorna as informações(null or info) do bd para a variável
    $resultado_id = mysqli_query($link, $sql);

    //caso exista alguma informação : exerce o retorno delas para um array(null or info)
    //caso ocorra erro de sintaxe no SELECT : imprime a mensagem de erro
    if($resultado_id){

        //passa os resources como um array para a variável
        /*enquanto ainda existir info a serem passadas para o array, elas serão impressas
        uma de cada vez no echo */
        while($registro = mysqli_fetch_array($resultado_id)){
            echo '<div style="display: flex; 
            flex-direction: row; 
            justify-content: space-between;
            ">';

            /*a variavel criada recebe S caso o id_usuario_seguidor do BD esteja iniciado e nao vazio, e caso contrario
            recebe N quando nao iniciado e vazio */
            $esta_seguindo_usuario_sn = isset($registro['id_usuario_seguidor']) && !empty($registro['id_usuario_seguidor']) 
            ? 'S' : 'N';

            $btn_seguir_display = 'block';
            $btn_deixar_seguir_display = 'block';

            /*caso o id_usuario_seguidor nao esteja iniciado e tenha valor nulo
            ele recebe como valor == N e entra na condiçao, caso nao entra na outra */
            if($esta_seguindo_usuario_sn == 'N'){

                //passa para o display do buttom o valor de none e assim some 
                $btn_deixar_seguir_display = 'none';
            } else{

                //passa para o display do buttom o valor de none e assim some 
                $btn_seguir_display = 'none';
            }

            echo '<div style="margin-bottom: 13px; padding: 13px 0px 0px 14px; ">';
            echo '<span style="color: rgb(217, 217, 217); font-weight: 500; font-size: 17px;"> @'.$registro['usuario'].'</span>';
            echo '</br>';
            echo '<span style="color: rgb(217, 217, 217); font-weight: 500; font-size: 17px;">'.$registro['email'].'</span>';
            echo '</div>';

            echo '<span style="margin-bottom: 13px; padding: 13px 14px 0px 0px; ">';
            echo '<button type="button" id="btn_seguir'.$registro['id'].'" style="display:'.$btn_seguir_display.'" onclick="btn_seguir('.$registro['id'].')" class="form-bottom-search" >
            Seguir
            </button>';
            /*no proprio function btn_seguir se é passado como parâmetro o valor de id equivalente do 
            usuario a ser seguido*/
            //para cada button se é passado um id com valor proprio pro usuario

            echo '<button type="button" id="btn_deixar_seguir'.$registro['id'].'" style="display:'.$btn_deixar_seguir_display.'" onclick="btn_deixar_seguir('.$registro['id'].')" class="form-bottom-delete" >
            Deixar de seguir
            </button>';
            /*no proprio function btn_deixar_seguir se é passado como parâmetro o valor de id equivalente do 
            usuario a ser deixado de seguir*/
            //para cada button se é passado um id com valor proprio pro usuario

            echo '<span>';

            echo '</div>';
        }

    }else{
        echo "erro na consulta de usuário no banco de dados";
    }

    

?>