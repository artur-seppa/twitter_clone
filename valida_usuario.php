<?php 

session_start();
/*a partir do session é possível passar informações de usuário de maneira segura,
diferentemente do method post e get. 

Uma vez instânciada as informaçoes elas passam a existir no escopo completo da aplicaçao

Por questões de boa pratica é interessante o session_start ficar antes de qualquer comando 
para haver o correto funcionamento */

require_once('db.class.php');

$email = $_POST['email'];
$senha = md5($_POST['senha']);
/*devido a variável ser criptografada, ela deve receber a string criptografada correspondente
do banco de dados */

$objDb = new db();
$link = $objDb->connecta_mysql();

//efetua o select no bd
$sql = " SELECT usuario, email FROM usuarios WHERE email = '$email' AND senha = '$senha' ";

//executa a query no bd e caso obtenha sucesso, retorna as informações(null or info) do bd para a variável
$resultado_id = mysqli_query($link, $sql);

//caso exista alguma informação : exerce o retorno delas para um array(null or info)
//caso ocorra erro de sintaxe no SELECT : imprime a mensagem de erro
if ($resultado_id){

    //passa os resources como um array para a variável
    $dados_usuarios = mysqli_fetch_array($resultado_id);

    //caso o email do usuário esteja cadastrado no banco de dados imprime a mensagem
    if(isset($dados_usuarios['email']) && !empty($dados_usuarios['email'])){
        
        /*as informações de usuário e email são passadas as variáveis SESSION
        de mesmo nome, no qual passaram agora a existir em todo escopo da aplicação */
        $_SESSION['usuario'] = $dados_usuarios['usuario'];
        $_SESSION['email'] = $dados_usuarios['email'];

        header('location: home.php');

    } else{
        //caso o usuário n exista(null) ele é direcionado a página principal 
        //e detém pelo método GET : erro=1 
        header('location: index.php?erro=1');
    }
}else{
    echo "Erro ao executar a consulta, por favor entrar em contato com o admin";
}

?>