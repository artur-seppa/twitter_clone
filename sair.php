<?php 

    /* o session é instanciado antes de tudo e com ele é possivel acessar as variáveis
        de seção de outras páginas*/
    session_start();
    

    //exerce a eliminação dos valores('usuario' e 'senha') passados no SESSION
    //e assim impõe o logOut da conta
         
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);

    //o unset elimina os valores passados em todo escopo do usuario e email

    header('location: index.php');

?>