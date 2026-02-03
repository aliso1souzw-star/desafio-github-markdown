<?php 


    //sleep(2);
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    require 'vendor/autoload.php'; /*faz parte do gerador de pdf usando composer*/

    /*função para carrecar as classes*/
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };
    spl_autoload_register($autoload);

    /*fazendo uploads de imagem do editar usuario*/
    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    /*incluindo url amigavel mais profisional*/
    define('INCLUDE_PATH','http://localhost/projeto_hondinha/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    $data['sucesso'] = true;

    if(Painel::logado() == false){
        die("Você não esta logado!");
    }

    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_hondinha');

    define('NOME_EMPRESA','Alyproject');

?>