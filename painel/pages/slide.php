<?php
    //verificarPermissaoPagina(2 AND 1);
?>


<div class="box-content">

<div><h2>Slides cadastrados <i style="margin-left:7px;position:relative;top:2px;" class="bi bi-card-image"></i></h2></div>


<?php 
    $mys = MySql::conectar()->prepare("SELECT * FROM `slide`");
    $mys->execute();
    $mys = $mys->fetchAll();

    foreach($mys as $value){
?>

   <div><div style="border:5px solid white;text-align:center;width:33.3%;float:left;margin-top:25px;">
            
            <?php if($value['imagem'] == ''){ ?>
                <div style="width:100%;background-color:rgba(128, 128, 128, 0.26);display:inline-block;"><i style="line-height:60px;font-size:25px;color:#ccc;" class="fa-solid fa-user"></i></div>
            <?php }else{ ?>
                <div style="width:100%;background-color:rgba(128, 128, 128, 0.26);display:inline-block;"><img style="width:100%;height:100%;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem']; ?>" /></div>
            <?php }?>

            <div style="margin-top:15px;">
                <p style="text-align:left;font-size:17px;font-weight:bold;"><?php  ?></p>
                    
                <!--<p style="margin-top:13px;"> <?php //echo $value['nome'] ?></p>-->
            </div>
        
            <div style="text-align:center;margin-top:35px;"><span class="daqi" imagem="<?php echo $value['imagem'] ?>" Id="<?php echo $value['id'] ?>" style="cursor:pointer;width:40px;background-color:red;padding:7px;color:white;border-radius:5px;">Excluir</span> </div>

    </div></div>

<?php } ?>

<div class="clear"></div>

</div>