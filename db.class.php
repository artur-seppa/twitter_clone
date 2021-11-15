<?php 

    class db{

        //host
        private $host = 'localhost';
        
        //usuario
        private $usuario = 'root';

        //senha
        private $senha = '';

        //banco de dados
        private $database = 'twitter_clone';

        public function connecta_mysql(){
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

            mysqli_set_charset($con, 'utf8');

            if(mysqli_connect_errno()){
                echo "Erro ao tentar se conectar com o BD MySQL: ".mysqli_connect_error();
            }

            return $con;
        }
    }

?>