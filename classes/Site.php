<?php 

    class Site{                                       
        public static function updateUsuarioOnline(){  /* <-- classe para ver usuario online -- pega horario atual e ip*/ 
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');  /* <-- essa função esta no config*/
                $check = Mysql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
                $check->execute(array($_SESSION['online']));

            if($check->rowCount() == 1){
                $sql = Mysql::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
                $sql->execute(array($horarioAtual,$token));
            }else{
                
                if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                }

                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = Mysql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
                $sql->execute(array($ip,$horarioAtual,$token));
            }

            }else{
                $_SESSION['online'] = uniqid();
                
                if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                }

                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = Mysql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
                $sql->execute(array($ip,$horarioAtual,$token));
            }
        }


        public static function contador(){ /*classe de cookie serve para ver quantas visitas teve no site*/
            if(!isset($_COOKIE['visita'])){
                setcookie('visita','true',time()+(60*60*24*7));  /*muda a quantidade de tempo do cookie de 7 dias para 30*/
                $sql = Mysql::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
            }
        }


    }

?>