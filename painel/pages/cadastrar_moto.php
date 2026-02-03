

<div class="box-content">

<div><h2>Cadastrar motos  <i style="margin-left:7px;position:relative;top:2px;" class="fa fa-id-card"></i></h2></div>


<form class="ajax" method="post" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms.php"  enctype="multipart/form-data">


<!--<div>
<p>Nome:</p>
<input required type="text" name="nome">
</div><br>-->

<div>
<p>Imagem:</p>
<input required type="file" name="imagem">
</div>

<div style="margin-top:20px;">
<p>Nome:</p>
<input required type="text" name="nome">
</div>

<div style="margin-top:20px;">
<p>Valor:</p>
<input required type="text" name="preco">
</div>

<br>


<input type="hidden" name="tipo_acao" value="Cadastr_moto" />
<input type="submit" value="cadastrar!" name="acao">
</form>


</div>