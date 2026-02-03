<?php 

    class MySql{    /* classe criada para conectar com o banco de dados... configuração de login*/

        private static $pdo;
        public static function conectar(){
            if(self::$pdo == null){
                try{
                    self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    }catch(Exception $e){
                        echo '<h2 style="background-color: red;padding:15px 0;color: white;font-style:italic;">Erro ao conectar com banco de dados:</h2>';
                    }
            }
            return self::$pdo;
        }
    }


?>