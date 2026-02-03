<?php 

    if(isset($_GET['loggout'])){
        Painel::loggout();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/bootstrap/zebra_datepicker.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" />
</head>
<body>

<base base="<?php echo INCLUDE_PATH_PAINEL /*usando para excluir ou editar com js*/ ?>">

<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		
            <?php 
                if($_SESSION['img'] == ''){ /* adicionando imagem do usuario direto do */
            ?>
			<div class="avatar-usuario">
                <i class="fa fa-user"></i>
			</div>
		
            <?php }else{ ?>

            <div class="imagem-usuario">
                <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
            </div>

            <?php } ?>

		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome']; ?></p>
			
		</div>
	</div>
	<div class="items-menu">
		<h2>Slides</h2>
		<a <?php selecionadoMenu('cadastrar-slide'); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slide">Cadastrar slide</a>
		<a <?php selecionadoMenu('slide'); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>slide">Editar slide</a>
		<h2>Motos</h2>
		<a <?php selecionadoMenu('cadastrar_moto'); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar_moto">Cadastrar motos em destaque</a>
	</div><!--items-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->


<header>
	<div class="center">
		<div class="menu-btn">
			<i class="fa fa-bars"></i>
		</div><!--menu-btn-->

		<div class="loggout">
			<!--<a <?php //if(@$_GET['url'] == 'chat'){ ?> style="background: #60727a;padding: 15px;" <?php //} ?> href="<?php //echo INCLUDE_PATH_PAINEL ?>chat"><i class="fa-brands fa-rocketchat"></i> <span>Chat Online</span></a>-->
            <a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding:15px;"<?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i>  <span>Página inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
		</div><!--loggout-->

		<div class="clear"></div>
	</div>
</header>

<div class="content">
    <?php Painel::carregarPagina(); ?>
</div>

<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.maskMoney.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.form.js"></script>
<script src="<?php echo INCLUDE_PATH /*usando para excluir ou editar com js*/ ?>js/constants.js"></script>



<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/helperMask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/ajax.js"></script>
<?php //Painel::loadJS(array('ajax.js'),'gerenciar-clientes'); ?>
<?php //Painel::loadJS(array('ajax.js'),'cadastrar-clientes'); ?>
<?php //Painel::loadJS(array('ajax.js'),'editar-cliente'); ?>
<?php //Painel::loadJS(array('controleFinanceiro.js'),'editar-cliente'); ?>
<?php //Painel::loadJS(array('chat.js'),'chat'); ?>