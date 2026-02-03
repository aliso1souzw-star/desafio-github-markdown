<?php 


    class Painel /* classe criada do painel*/
    {

        

        public static $cargos = [ /*função para definir cargo em adicionar cargo e na foto do perfil*/
            '0' => 'Normal',
            '1'=>'Adiministrador',
            '2'=>'Subadiministrador'];

        
        

           


            public static function getTotalItensCarrinho(){
                if(isset($_SESSION['carrinho'])){
                $amount = 0;
                foreach($_SESSION['carrinho'] as $key => $value){
                    $amount+=$value;
                }
                }else{
                    return 0;
                }
                return $amount;
            }


            public static function convertMoney($valor){
                return number_format($valor, 2, ',', '.');
            }
    
            public static function formatarMoedaBd($valor){
                $valor = str_replace('.', '', $valor);
                $valor = str_replace(',', '.', $valor);
                return $valor;
            }


        public static function logado(){ // <-- do painel
            return isset($_SESSION['login']) ? true : false;
        }



        public static function loggout(){ /*função para loggout*/
            setcookie('lembrar','true',time()-1,'/');/*função para lembrar usuario e senha */
            
            session_destroy();
            //header('Location'.INCLUDE_PATH_PAINEL);
        }


        public static function loggout_site(){
            setcookie('lembrar','true',time()-1,'/');/*função para lembrar usuario e senha */
            
            session_destroy();
            header('Location'.INCLUDE_PATH);
        }


        public static function carregarPagina(){ /*função para carregar o content do painel em home*/
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    /*quando a pagina não existe aqui pode personalizar como pagina de erro */
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            }else{
                include('pages/home.php');
            }
        }

        
        public static function listarUsuariosOnline(){ /*função para aparecer numero de usuario online no painel usado depois de criar a classe Site*/
            self::limparUsuariosOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function limparUsuariosOnline(){ /*função para aparecer numero de usuario online no painel*/
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
        }



        public static function alert($tipo,$mensagem){ /*função para atualizar usuario do painel mensagem de sucesso e erro*/
            if($tipo == 'sucesso'){
                echo '<div class="sucesso"> <i class="fa fa-check"></i>'.$mensagem.'</div>';
            }else if($tipo == 'erro'){
                echo '<div class="erro"> <i class="fa fa-times"> </i>'.$mensagem.'</div>';
            }
            else if($tipo == 'atencao'){ //faz parte da função  do aviso de falta de produto do estoque
                echo  '<div class="box-alert atencao"><i class="fa fa-warning"></i> '.$mensagem.'</div>';
            }
        }


        public static function imagemValida($imagem){ /*validação de imagem do editar usuario*/
            if($imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'image/jpg' ||
                $imagem['type'] == 'image/png' ||
                $imagem['type'] == 'image/webp'
                ){
                
                $tamanho = intval($imagem['size']/1024);
                if($tamanho < 900)
                    return true;
                    else
                    return false;
                return true;
            }else{
                return false;
            }
        }

        public static function uploadFile($file){ /*validação de imagem do editar usuario*/
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
                return $imagemNome;
            else
                return false;

        }

        public static function deleteFile($file){  /*Deletando a imagem do usuario apos selecionar outra do editar usuario*/
            @unlink('uploads/'.$file);
        }



        public static function insert($arr){ /*função para cadastrar depoimentos */
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach($arr as $key => $value){
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela')
                    continue;
                if($value == ''){
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }

            $query.=")";
            if($certo == true){
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
                $lastId = MySql::conectar()->lastInsertId();
                $sql = MySql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastId");
                $sql->execute(array($lastId));
             }
            return $certo;
        }

                                                                            
        public static function selectAll($tabela, $start = null, $end = null){ /*função para listar dados do depoimentos cadastrados e mostrar no listar-depoimentos*/
            if($start == null && $end == null){                             /*tambem e usada para a paginação -- sem o $start e $end  e sem a verificação if com o else so fuciona o listar dados depoimentos*/
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC"); /* O  -ORDER BY order_id ASC- esta sendo usado para mudar a ordem dos depoimentos na função de ordemItem pode ser tirado*/
            }else
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");
            
            $sql->execute();

            return $sql->fetchAll();
        }


        public static function deletar($tabela,$id=false){ /*função para deletar os depoimento de listar-depoimentos*/
            if($id == false){
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
        }


        public static function redirect($url){ /*função para redirecionar pagina */
            echo '<script>location.href="'.$url.'"</script>';
            die();
        }


        public static function select($table,$query = '',$arr = ''){   /*função especifica para selecionar apenas 1 registro ---- $query = '',$arr = '' e uma adaptação do editar site se tirar o = '' funciona normal deve tirar tambem a verificação abaixo , lembrando que tem que excluir o esditar-site.php se não for usar */
            if($query != false){/*essa verificação far parte da adaptação do editar site também tem que ser retirada so o if($query != false) e o else inteiro*/
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
                $sql->execute($arr);
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table`");
                $sql->execute();
            }

            return $sql->fetch();
        }

        public static function update($arr,$single = false){ /*função para cadastrar depoimentos --- $single = false e uma adaptação do editar site se tirar o = false funciona normal deve tirar tambem a verificação abaixo  , lembrando que tem que excluir o esditar-site.php se não for usar */
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";
            foreach($arr as $key => $value){
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
                    continue;
                if($value == ''){
                    $certo = false;
                    break;
                }

                if($first == false){
                    $first = true;
                    $query.="$nome=?";
                }else{
                    $query.=",$nome=?";
                }
                
                $parametros[] = $value;
            }

            if($certo == true){
                if($single == false){ /*essa verificação far parte da adaptação do editar site também tem que ser retirada so o if($single == false) e o else inteiro*/
                    $parametros[] = $arr['id'];
                    $sql = MySql::conectar()->prepare($query.'WHERE id=?');
                    $sql->execute($parametros);
                }else{
                    $sql = MySql::conectar()->prepare($query);
                    $sql->execute($parametros);
                }
            }
            return $certo;
        }


        public static function orderItem($tabela,$orderType,$idItem){
            if($orderType == 'up'){
                $infoItemAtual = Painel::select($tabela, 'id=?', array($idItem));
                $order_id = $infoItemAtual['order_id'];
                $itemBefore = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1");
                $itemBefore->execute();
                if($itemBefore->rowCount() == 0)
                    return;
                $itemBefore = $itemBefore->fetch();
                Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
                Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
            }else if($orderType == 'down'){
                $infoItemAtual = Painel::select($tabela, 'id=?', array($idItem));
                $order_id = $infoItemAtual['order_id'];
                $itemBefore = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
                $itemBefore->execute();
                if($itemBefore->rowCount() == 0)
                    return;
                $itemBefore = $itemBefore->fetch();
                Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
                Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
            }
        }


    }

?>