
<?php
    //verificarPermissaoPagina(2 AND 1);
?>

<?php 
    $usuariosOnline = Painel::listarUsuariosOnline(); /*listando numero se usuario online e mostrando no painel*/

    $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
    $pegarVisitasTotais->execute();
    $pegarVisitasTotais = $pegarVisitasTotais->rowCount();

    $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
    $pegarVisitasHoje->execute(array(date('Y-m-d')));
    $pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>

    <div class="box-content left w100">
        <h2 style="margin-left: 16px;"><i class="fa fa-home"></i> Painel de Controle </h2>
       <div class="box-metricas">
            <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                    <h2>Usuário Online</h2>
                    <p><?php echo count($usuariosOnline); ?></p>
                </div>
            </div>
            <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                    <h2>Total de Visitas</h2>
                    <p><?php echo $pegarVisitasTotais ?></p>
                </div>
            </div>
            <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                    <h2>Visitas Hoje</h2>
                    <p><?php echo $pegarVisitasHoje ?></p>
                </div>
            </div>
       </div>
    </div>
    <!--
    <div class="box-content left w100"></div>
    <div class="box-content left w50"></div> 
    <div class="box-content right w50"></div>
    -->
    <div class="box-content left w100">
        <h2><i class="fa fa-rocket" aria-hidden="true"></i> Usuários Online no Site</h2>

        <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div>
            <div class="col">
                <span>Última Ação</span>
            </div>
            <div class="clear"></div>
        </div>

        <?php
            foreach($usuariosOnline as $key => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['ip'] ?></span>
            </div>
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
    </div>
    
    </div><!--box-content-->


    <div class="box-content left w100">
        <h2><i class="fa fa-rocket" aria-hidden="true"></i> Usuários do Painel</h2>

        <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>Nome</span>
            </div>
            <div class="col">
                <span>Cargo</span>
            </div>
            <div class="clear"></div>
        </div>

        <?php
            $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
            $usuariosPainel->execute();
            $usuariosPainel = $usuariosPainel->fetchAll();
            foreach($usuariosPainel as $key => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['usuario'] ?></span>
            </div>
            <div class="col">
                <span><?php echo pegacargo($value['cargo']) ?></span>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
    </div>
    
    </div><!--box-content-->

    
