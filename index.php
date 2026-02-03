<?php include('config.php') ?>
<?php Site::updateUsuarioOnline(); /*classe Site - usuario online so atualizado no banco de dados - usado antes de atualizar no painel usando a classe Site*/ ?>
<?php Site::contador(); /*Contador do cookie */?>

<!doctype html>
<html lang="pt-br">
<head>
	<title><?php  ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<meta name="author" content="Alysson Souza" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
	<meta charset="utf-8" />

</head>

<body>


    <?php 
        /*puxando dinamicamente do banco de dados*/
       // $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
       // $infoSite->execute();
       // $infoSite = $infoSite->fetch();
    ?>


	<?php 
	
		/*incluindo pagina home em index manipulando urls */
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			/* se a pagina não existir vai para a pagina de erro */

			if($url != 'depoimentos' && $url != 'servicos'){ /*essa verificação faz parte do click move para a seção-- antes disso so incluir a pagina de erro 404 */
				$pagina404 = true;
				include('pages/404.php');
			}else{
				include('pages/home.php');
			}
		}
	
	?>


	<!--<footer>
		
			<div class="log-fot">
				<img  src="https://www.honda.com.br/motos/sites/hda/themes/hondahda/assets/img/honda-horizontal.svg" />
				
				<h5>Siga nas redes sociais</h5>

				<div class="iconK">
					<a href=""><i class="bi bi-facebook"></i></a>
					<a href=""><i class="bi bi-instagram"></i></a>
					<a href=""><i class="bi bi-whatsapp"></i></a>
				</div>

				<p style="margin-top:18px;position:absolute;left:50%;transform:translateX(-50%);color:gray;">Todos os direitos reservados!</p>
				
			</div>
			<div style="position:absolute;left:50%;margin-top:60px;transform:translateX(-50%);"><a style="color:rgba(0, 0, 0, 0.616);text-decoration:none;" href=""><p>Alyproject</p></a></div>
		
	</footer>-->


<script src="<?php ?>js/jquery.js"></script>
<script src="<?php ?>js/maps.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php 
	//if($url == 'contato'){
?>

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
<script src="<?php ?>js/maps.js"></script>

<?php //} ?>


</body>
</html>