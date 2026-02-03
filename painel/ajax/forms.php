<?php 

    /*Formulario com ajax*/
   
    include('../../includeConstants.php');
    $data['sucesso'] = true;
    $data['mensagem'] = "";

    if(Painel::logado() == false){
        die('Você não esta logado');
    }

    /*Codigo de validação começa aqui*/
    /*if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'del-servic'){
    

        $id = $_POST['Id'];

        $mysq = MySql::conectar()->prepare("DELETE FROM `opcaodecorte` WHERE id = ?");
        $mysq->execute(array($id));

    }else*/ if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar-barb'){


        // $nome = $_POST['nome'];
        $imagem = @$_FILES['imagem'];
        
            if(Painel::imagemValida($imagem) == false){
                $data['sucesso'] = false;
                $data['mensagem'] = " O formato da imagem especificada não esta correto";
            }else{
                $imagem = Painel::uploadFile($imagem);
                $ruh = MySql::conectar()->prepare("INSERT INTO `slide` VALUES (null,?)");
                $ruh->execute(array($imagem));

                $data['mensagem'] = " O cadastro foi feito com sucesso!";
            }
    }else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'del-barbeiro'){

        $id = $_POST['Id'];
        $imagem = $_POST['Imagem'];

        @unlink(BASE_DIR_PAINEL.'/uploads/'.$imagem);
        $mysq = MySql::conectar()->prepare("DELETE FROM `slide` WHERE id = ?");
        $mysq->execute(array($id));

    }else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'Cadastr_moto'){
        
        
        $imagem = @$_FILES['imagem'];
        $nome = $_POST['nome'];
        $valor = $_POST['preco'];

        if(Painel::imagemValida($imagem) == false){
            $data['sucesso'] = false;
            $data['mensagem'] = " O formato da imagem especificada não esta correto";
        }else{
            $imagem = Painel::uploadFile($imagem);
            $ruh = MySql::conectar()->prepare("INSERT INTO `motos_destaq` VALUES (null,?,?,?)");
            $ruh->execute(array($imagem,$nome,$valor));

            $data['mensagem'] = " O cadastro foi feito com sucesso!";
        }
    }

    die(json_encode($data));
?>