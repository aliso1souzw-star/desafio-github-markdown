<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
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

    /*constantes para o painel de controle*/
    define('NOME_EMPRESA','Alyproject');

    /*conectar com banco de dados */
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_hondinha');


    /*função para pegar o cargo do adiministrador*/
    function pegacargo($indice){
        return Painel::$cargos[$indice];
    }


    function selecionadoMenu($par){ /*função para deixar menu selecionado*/
        $url = explode('/', ''.@$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu-active"';
        }
    }


    function selecionadoMenu_perf($par){ /*função para deixar menu selecionado do perfil*/
        $pagina = explode('/', ''.@$_GET['a'])[0];
        if($pagina == $par){
            echo 'class="sulk"';
        }
    }


    function verificarPermissaoMenu($permissao){ /*função para dar algumas permissões aos usuarios no painel*/
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            echo 'style="display:none;"';
        }
    }

    function verificarPermissaoPagina($permissao){ /*função para dar algumas permissões aos usuarios no painel*/
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('painel/pages/permissao_negada.php');
            die();
        }
    }



    


?>