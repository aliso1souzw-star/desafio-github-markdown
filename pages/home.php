
    <header class="hed">
        
        <a class="logo" href=""><div>
            
        </div></a>
        
        
        <div class="meni">

			<nav class="NaVe">

				<ul>
					<li><a href="<?php echo INCLUDE_PATH ?>home">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>motos">Motos</a></li>
					<li><a href="<?php INCLUDE_PATH ?>promocoes">Promoções</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
				</ul>

			</nav>
			
    	</div>
		
		<div class="meni1">
				<div class="ButTun">
					<i class="bi bi-justify"></i>
				</div>
			<nav class="NaVe1">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH ?>home">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>motos">Motos</a></li>
					<li><a href="<?php INCLUDE_PATH ?>promocoes">Promoções</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
				</ul>
			</nav>
    	</div>

			


	<div class="clear"></div></header>
	

    <div class="slLidEr">
	<div  class="slid">
			<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			
		
			<?php
			
				$wes = Mysql::conectar()->prepare("SELECT * FROM `slide`");
				$wes->execute();
				$Was = $wes->fetchAll();

				foreach($Was as $value){
			?>

			<div class="carousel-item active" data-bs-interval="10000">
			<img style="height:100%;max-height:675px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem'] ?>" class="d-block w-100" alt="...">
			</div>

			<?php } ?>

			<!--<div class="carousel-item" data-bs-interval="2000">
			<img style="height:100%;max-height:675px;" src="imagens/honda-cg-160-fan-diferencial-novas-cores.webp" class="d-block w-100" alt="...">
			</div>

			<div class="carousel-item">
			<img style="height:100%;max-height:675px;" src="imagens/honda-cg-160-cargo-homem-ao-lado-da-cg-cargo.webp" class="d-block w-100" alt="...">
			</div>

			<div class="carousel-item ">
			<img style="height:100%;max-height:675px;" src="imagens/homem-e-mulher-pilotando-a-cg-160-titan.webp" class="d-block w-100" alt="...">
			</div>

			<div class="carousel-item ">
			<img style="height:100%;max-height:675px;" src="imagens/mulher-encostada-na-pop-110i-es.webp" class="d-block w-100" alt="...">
			</div>
			
			<div class="carousel-item ">
			<img style="height:100%;max-height:675px;" src="imagens/Honda_Biz_5DR5-381-Edit.webp" class="d-block w-100" alt="...">
			</div>-->


		</div>
		<!--<button style="background-color: rgba(209, 36, 36, 0.837);border-radius:10px;height:50px;width:50px;position:absolute;top:50%;left:10px;transform:translateY(-50%);" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button style="background-color: rgba(209, 36, 36, 0.837);border-radius:10px;height:50px;width:50px;position:absolute;top:50%;right:10px;transform:translateY(-50%);" class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>-->
		</div>
	</div>
</div>


	<div class="box1">
		<h1>Motos em destaque</h1>

		<div class="kiH">
		
		
			<?php
			
				$esa = Mysql::conectar()->prepare("SELECT * FROM `motos_destaq`");
				$esa->execute();
				$Wask = $esa->fetchAll();

				foreach($Wask as $value){
			
			?>


			<a href=""><div class="caV">
					<img style=" border-radius:3px; width:100%;height:100%;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem'] ?>">

					<div class="legen">
						<h3><?php echo $value['nome'] ?></h3>
						<p>R$ <?php echo $value['preco'] ?></p>
					</div>
			</div></a>

			<?php } ?>



		<div class="ver-mais">
				<a href="<?php echo INCLUDE_PATH ?>motos">Ver mais</a>
		</div>

		</div>
	</div>
	

	<div><div class="box2">
		<div class="twin">
			<img  src="imagens/Banner_Africa Twin Adventure Sports x2_1.jpg" />
		</div>

		<div class="thiu">
			
				<h1 class="Pist">Experencie a Realidade Aumentada</h1>
				<p style="color:#595959;font-size: 18px;">Explore a função de realidade aumentada e visualize de perto detalhes e diferenciais, além de personalizar e experimentar sua Honda dos sonhos como nunca antes.</p>

				<a href="https://platform.simplustec.com.br/dam-embeeded-file/7971ceaaa08e44748db828767d5bfa28?locale=pt&_gl=1*10moi4n*_gcl_aw*R0NMLjE3NDIzOTIwNDYuRUFJYUlRb2JDaE1JeU1hVGxLU1dqQU1WWFVWSUFCMkVLd1l1RUFBWUFTQUFFZ0tSZV9EX0J3RQ..*_gcl_au*MTAzMzcyMjUyOC4xNzQyMzkyMDQ0*_ga*MTQyMDEzMjg0MS4xNzQyMzkyMDQ1*_ga_JWXEK0XZPH*MTc0MjM5MjA0NC4xLjEuMTc0MjM5NTQ2NC42MC4wLjA.">Ver realidade aumentada</a>
			
		</div>

		<div class="clear"></div>
	</div></div>

	<section class="Papay">
	
	<div><div><div class="papa2">
			<img style="width:100%; height:100%;" src="imagens/Nova_Honda_Biz.webp" />
		</div></div></div>

		<div><div  class="papa">
				
				<h1 class="Pist">Nova Honda Biz</h1>
				<p style="color:#595959;font-size: 18px;">A sensação de ir e vir sempre na melhor companhia.</p>
				<a href="">Saiba mais</a>
			
		</div></div>

		

		<div class="clear"></div>
	</section>

	<div><div style="margin-top:0;border-top:0;" class="box2">
		<div class="twin">
			<img  src="imagens/Banner-img_PopAWQ.webp" />
		</div>

		<div class="thiu">
			
				<h1 class="Pist">Experiencie a Pop 110i ES</h1>
				<p style="color:#595959;font-size: 18px;">Explore a função de realidade aumentada e visualize de perto detalhes e diferenciais, além de personalizar e experimentar sua Honda dos sonhos como nunca antes.</p>

				<a href="https://platform.simplustec.com.br/dam-embeeded-file/b26ae41c5cad4a4eb956fd94235231a5?locale=pt&_gl=1*heh03y*_gcl_ag*Mi4xLmswQUFBQUFETTZTQ0JUZGE5NWw4Yjhqckx1RjBfZUlhdnZGJGkxNzUzMDMyODQx*_gcl_au*ODMyMzYwNTI2LjE3NTMwMzI4MDI.*_ga*MjEwMzkzNTMxMy4xNzUzMDMyODAy*_ga_JWXEK0XZPH*czE3NTMwMzI4MDIkbzEkZzEkdDE3NTMwMzM2NjEkajYwJGwwJGgw">Ver realidade aumentada</a>
			
		</div>

		<div class="clear"></div>
	</div></div>

	<footer style="margin-top:600px;" class="toP">
		
			<div class="log-fot">
				<img  src="https://www.honda.com.br/motos/sites/hda/themes/hondahda/assets/img/honda-horizontal.svg" />
				
				<h5>Siga nas redes sociais</h5>

				<div class="iconK">
					<a href=""><i class="bi bi-facebook"></i></a>
					<a href=""><i class="bi bi-instagram"></i></a>
					<a href=""><i class="bi bi-whatsapp"></i></a>
				</div>

				<p  style="margin-top:18px;position:absolute;left:50%;transform:translateX(-50%);color:gray;">Todos os direitos reservados!</p>
				
			</div>
			<div class="alyproject" ><a href=""><p>Alyproject</p></a></div>
		
	</footer>