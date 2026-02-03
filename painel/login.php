<?php 
    if(isset($_COOKIE['lembrar'])){  /*função para lembrar usuario e senha*/
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario=? AND senha=?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['id_user'] = $info['id'];
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            Painel::redirect(INCLUDE_PATH_PAINEL);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" />
</head>
<body>
    <div class="box-login">


    <?php 
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario=? AND senha=?");
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
                $info = $sql->fetch(); /*função para pegar seções sem post*/
                //logamos com sucesso
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['id_user'] = $info['id'];
                $_SESSION['cargo'] = $info['cargo'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['img'] = $info['img'];

                if(isset($_POST['lembrar'])){ /*função para lembrar usuario e senha*/
                    setcookie('lembrar','true',time()+(60*60*24),'/');
                    setcookie('user',$user,time()+(60*60*24),'/');
                    setcookie('password',$password,time()+(60*60*24),'/');
                }

                Painel::redirect(INCLUDE_PATH_PAINEL);
            }else{
                //login falhou
                echo '<h3 style="color:white;background-color:red;padding:15px 0;border-radius:10px;">Usuario ou Senha invalidos!</h3>';
            }
        }
    ?>

    <h2>Efetue o login:</h2>
		<form method="post">
			<input type="text" name="user" placeholder="Login..." required>
			<input type="password" name="password" placeholder="Senha..." required>
			<div class="form-group-login">
				<input type="submit" name="acao" value="Logar!">
			</div>
            
            <!--<div class="form-group-login ">
				<label>Lembrar-me</label> 
                <span>
                    <input type="checkbox" name="lembrar" />
                </span>
			</div>-->
    
			<div class="clear"></div>
		</form>
    </div>
</body>
</html>