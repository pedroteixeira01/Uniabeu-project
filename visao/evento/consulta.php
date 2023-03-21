<?php
require_once('controles/evento.php');
Processo('consulta');
?>
<form class="form-horizontal" id="form" name="form" method="post">

<br />
<br />

                                <div class="control-group">
                                  <label class="control-label">Pesquisa</label>
                                  <div class="controls">
                                      <input name="descricao" id="descricao" type="text" class="input-xlarge" id="descricao" placeholder="" title="O preechimento do Campo de pesquisa é obrigatório" />
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
                                      <th width="248" ><font color="#FDFDFD">Descrição</font></th>
                                      
                                      <th width="80" ><font color="#FDFDFD">Ação</font></th>
                                    </tr>
                                  </thead>
                                  <tbody>
				<?php for($i=0;$i<$linha;$i++){?>
                                    <tr class="table-flag-blue">
                                      <td><?php echo $rs[$i]['descricao']?></td>
                                      
                                      <td><a class="btn btn-small show-tooltip" title="Editar" href="default.php?pg=<?php echo base64_encode('visao/evento/editar.php')?>&form=Atualizar / Evento&id=<?php echo $rs[$i]['idevento']?>">Editar</a></td>
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