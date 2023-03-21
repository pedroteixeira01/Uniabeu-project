<?php
require_once('controles/programacao.php');
Processo('consulta');
?>
<form class="form-horizontal" id="form" name="form" method="post">

<br />
<br />

                                <div class="control-group">
                                  <label class="control-label">Programação</label>
                                  <div class="controls">
                                    <input name="descricao" type="text" class="input-xlarge" id="descricao" placeholder="" title="O curso é obrigatório" />
                                    <input name="ok" type="hidden" id="ok"/>
									
									<button type="button" class="btn btn-primary" onClick="validar(document.form);">
                              </i> BUSCAR</button>
                                  </div>
                                </div>
                                <br /><br />
								<?php if($linha>0){?>
                                <table width="100%" class="table table-advance" id="table1">
                                  <thead>
                                    <tr bgcolor="#0088cc">
                                      <th width="89" ><font color="#FDFDFD">Data</font></th>
                                      <th width="95" ><font color="#FDFDFD">Horário</font></th>
                                      <th width="166" ><font color="#FDFDFD">Tema</font></th>
                                      <th width="110" ><font color="#FDFDFD">Colégio</font></th>
                                      <th width="53" ><font color="#FDFDFD">Ação</font></th>
                                    </tr>
                                  </thead>
                                  <tbody>
				<?php for($i=0;$i<$linha;$i++){?>
                                    <tr class="table-flag-blue">
                                      <td><?php echo $rs[$i]['dataP']?></td>
                                      <td><?php echo $rs[$i]['horario']?></td>
                                      <td><?php echo $rs[$i]['tema']?></td>
                                      <td><?php echo $rs[$i]['descricaocol']?></td>
                                      <td><a class="btn btn-small show-tooltip" title="Editar" href="default.php?pg=<?php echo base64_encode('visao/programacao/editar.php')?>&form=Atualizar / Programação&id=<?php echo $rs[$i]['idprogramacao']?>">Editar</a></td>
                                    </tr>
				<?php }?>
                                  </tbody>
                                </table>
                                <?php }?>
								<br />
								<br />
  <center>
  </center>
</form>