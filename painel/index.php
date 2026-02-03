<?php
    ob_start();

    include('../config.php');  /*incluindo config no painel*/

    if(Painel::logado() == false){  /*criando classe Painel logado trabalhando com classes*/
        include('login.php');
    }else{
        include('main.php');
    }

    ob_end_flush();
?>