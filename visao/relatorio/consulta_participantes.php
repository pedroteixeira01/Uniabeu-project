<?php
require_once('controles/relatorios.php');
Processo('ConsultaParticipante'); 
?>
<style type="text/css">
.obrigatoriedade {
	color: #F00;
}
</style>

	
<br />	<br />								



<h2 class="panel-title">Consulta de participantes</h2>
<br  />

</header>

<div class="panel-body">

    <form name="form" id="form" class="form-horizontal form-bordered" action="#" method="post">

       





      <div class="form-group">

            <label class="col-md-3 control-label">Colégio <span class="obrigatoriedade">*</span></label>

            <div class="col-md-6 control-label">

                <div class="input-group">

                    <span class="input-group-addon">

                        <i class="fa fa-tag"></i>

                    </span>

                    <select name="idcolegio" id="idcolegio" class="form-control populate" title="O campo colégio é obrigatório">
<option value="Todos">Todos</option>			

                        <?php for ($i = 0; $i < $linha; $i++) { ?>

                            <option value="<?php echo $rs[$i]['idcolegio']; ?>"><?php echo $rs[$i]['descricaocol'] . " - " . $rs[$i]['descpais']; ?></option>										

                        <?php } ?>				

                    </select>
                                       

                </div>
                

            </div>

           <input type="hidden" name="ok" id="ok">

           <button class="btn btn-primary" onClick="validar(document.form);" type="button">Pesquisar</button>

      </div>
        <br>



       
<?php if($linha2>0){?>
            <div class="row" align="center">
            <br />
            <?php if($_POST['idcolegio']=='Todos'){
				?>
				<p align="right"><a href="visao/relatorio/ListaParticipante.php" target="_blank">
<img src="img/pdf.png"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<?php } ?>
              <table width="100%" class="table table-advance" id="table1">
                <thead>
                  <tr bgcolor="#0088cc">
                    <th width="89" ><font color="#FDFDFD">Nome</font></th>
                    <th width="95" ><font color="#FDFDFD">E-mail</font></th>
                    <th width="166" ><font color="#FDFDFD">Colégio</font></th>
                    <th width="110" ><font color="#FDFDFD">País</font></th>
                    <th width="53" ><font color="#FDFDFD">Ação</font></th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=0;$i<$linha2;$i++){?>
                  <tr class="table-flag-blue">
                    <td><?php echo $rs2[$i]['nome']?></td>
                    <td><?php echo $rs2[$i]['email']?></td>
                    <td><?php echo $rs2[$i]['col']?></td>
                    <td><?php echo $rs2[$i]['pais']?></td>
                    <td><a class="btn btn-small show-tooltip" target="_blank" title="Editar" href="visao/usuario/ficha.php?id=<?php echo $rs2[$i]['idusuario']?>">Ficha</a></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>

            </div>
<?php }else{ ?>
       
   <font color="#FF0000"><b>Não há registros</b></font>
<?php }?>

    </form>

</div>

</section>

</div>

</div>

<script> document.form.idcolegio.value='<?php echo $_POST['idcolegio'];?>';</script>


