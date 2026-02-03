

<div class="box-content">

    <div><h2>Cadastrar slide  <i style="margin-left:7px;position:relative;top:2px;" class="fa fa-id-card"></i></h2></div>

    
    <form class="ajax" method="post" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php"  enctype="multipart/form-data">


    <!--<div>
    <p>Nome:</p>
    <input required type="text" name="nome">
    </div><br>-->

    <div>
    <p>Imagem:</p>
    <input required type="file" name="imagem">
    </div><br>

    
    <input type="hidden" name="tipo_acao" value="cadastrar-barb" />
    <input type="submit" value="cadastrar!" name="acao">
    </form>


</div>